<?php

namespace App\app\controller;

use App\app\Model\Admin;
use App\app\model\Department;
use App\Core\View;
use App\app\Model\Doctor;
use App\app\Model\DoctorPatient;
use App\app\Model\DoctorDepartment;
use App\Model\DoctorSection;
use App\Model\Section;

class dashboardController extends View
{
    public function index()
    {
        $this->layout = 'dashboard';
        $role = $_SESSION['role'];

        $userdata = $this->{$_SESSION['role'] . 'Data'}();
        echo "<pre>";
        var_dump($userdata);
        echo "</pre>";
        exit;
        $this->show('dashboard/' . $role . 'Main', compact('userdata'));
    }

    public function doctorData()
    {
        $is_confirm = (new Doctor)->get('id', $_SESSION['id'])->confirm;

        if (is_null($is_confirm)) {
            $this->addMessage('info', 'Please wait for confirm from admins');
            return [];
        }

        $date = date('Y-m-d');
        $nextWeek = date('Y-m-d', strtotime($date . ' + 7 days'));

        $weekAppointments = (new Doctorpatient)->findAppointments(
            ['doctor_patient.*', 'patient.FirstName as patientFirstName', 'patient.LastName as patientLastName', 'doctor.FirstName as doctorFirstName', 'doctor.lastName as doctorLastName', 'doctor.education as doctorEducation'],
            [
                ['doctor', 'doctor_patient.doctor_id', 'doctor.id'],
                ['patient', 'doctor_patient.patient_id', 'patient.id'],
            ],
            ['doctor_patient.doctor_id', $_SESSION['id']],
            null, null,
            ['col' => 'date', 'from' => $date, 'to' => $nextWeek]
        );

        $countAllAppointments = count((new Doctorpatient)->findAppointments(
            ['doctor_patient.*'],
            [
                ['doctor', 'doctor_patient.doctor_id', 'doctor.id'],
                ['patient', 'doctor_patient.patient_id', 'patient.id'],
            ],
            ['doctor_patient.doctor_id', $_SESSION['id']],
            [['date', $date, '>']]
        ));

        $countWeekAppointments = count($weekAppointments);

        return [
            'weekAppointments' => $weekAppointments,
            'countWeekAppointments' => $countWeekAppointments,
            'countAllAppointments' => $countAllAppointments
        ];
    }

    public function adminData()
    {
        $is_confirm = (new Admin)->get('id', $_SESSION['id'])->confirm;

        if (is_null($is_confirm)) {
            $this->addMessage('info', 'Please wait for confirm from admins');
            return [];
        }

        $doctor = new \App\app\Model\Doctor();
        $doctorsCount = $doctor->find(
            ['count(*) AS count'],
            [
                ['confirm', 'NULL', 'IS NOT']
            ],
        )[0];

        $sections = new DoctorDepartment;
        $sections = $sections->find(
            ['department.*', 'COUNT(*) As sectionDoctorsCount', 'doctor.id'],
            null,
            null,
            [
                ['department', '`department`.`id`', '`doctor_department`.`department_id`', 'RIGHT'],
                ['doctor', '`doctor`.`id`', '`doctor_department`.`doctor_id`', 'LEFT'],
            ],
            null,
            'department.name'
        );

        $sectionsCount = count($sections);

        $appointments = new \App\app\Model\DoctorPatient;
        $appointmentsCount = $appointments->find(['count(*) AS count'])[0];

//        array_map(fn(&$section) => is_null($section->id) ? $section->sectionDoctorsCount = 0 : null, $sections);

        return [
            'doctorsCount' => $doctorsCount,
            'sections' => $sections,
            'sectionsCount' => $sectionsCount,
            'appointmentsCount' => $appointmentsCount,
        ];

    }

    public function patientData()
    {
        $date = date("Y-m-d");


        $comingAppointments = (new \App\app\Model\DoctorPatient)->findAppointments(
            ['doctor_patient.*', 'doctor.FirstName as doctorFirstName', 'doctor.lastName as doctorLastName', 'doctor.education as doctorEducation'],
            [
                ['doctor', 'doctor_patient.doctor_id', 'doctor.id'],
            ],
            ['id', $_SESSION['id']],
            [
                ['date', $date, '>']
            ],
            [
                ['date', 'ASC']
            ]
        );

        $appointments = (new DoctorPatient)->findAppointments(
            ['doctor_patient.*'],
            [
                ['doctor', 'doctor_patient.doctor_id', 'doctor.id'],
            ],
            ['id', $_SESSION['id']]
        );

        $appointmentsFullCount = count($comingAppointments);
        $reserveAppointments = count($appointments);

        return [
            'appointmentsFullCount' => $appointmentsFullCount,
            'reserveAppointments' => $reserveAppointments,
            'appointments' => $comingAppointments
        ];
    }

    public function showRequest()
    {
//        $this->auth();
        $itemPerPage = 10;
        $currentPage = $_GET['page'] ?? 1;

        $unCheckDoctors = (new \App\app\Model\Doctor)->find(['id', 'username'], [['confirm', 'NULL', 'IS']]);
        $unCheckAdmins = (new \App\app\Model\Admin)->find(['id', 'username'], [['confirm', 'NULL', 'IS']]);

        array_map(fn(&$unCheckDoctors) => $unCheckDoctors->role = 'doctor', $unCheckDoctors);
        array_map(fn(&$unCheckAdmins) => $unCheckAdmins->role = 'admin', $unCheckAdmins);
        $unChecks = array_merge($unCheckDoctors, $unCheckAdmins);

        $pagination = $this->pagination((array)$unCheckDoctors, $itemPerPage);
        $unChecks = array_slice((array)$unChecks, $itemPerPage * ($currentPage - 1), $itemPerPage);

        $this->layout = 'dashboard';
        $this->show('dashboard/requests', compact('unChecks', 'pagination'));
    }

    public function requests()
    {
//        $this->auth();
        unset($_POST['_method']);

        $model = "App\app\Model\\" . ucfirst($_POST['role']);
        $this->model = new $model;

        if ($_POST['confirm'] == 'accept' && !$this->model->updateRow($_POST['ID'], ['confirm' => $_SESSION['id']])) {
            $this->addMessage('error', 'something went wrong');
        } elseif ($_POST['confirm'] == 'denied' && $this->model->updateRow($_POST['ID'], ['confirm' => 'denied'])) {
            $this->addMessage('warning', "$_POST[role]'s request is denied");
        } else {
            $this->addMessage('success', "$_POST[role]'s request is accepted");
        }

        $this->showRequest();
    }

    public function addDepartment()
    {
//        $this->auth();
        $section = new Department;

        if (empty($_POST['sectionName'])) {
            $this->addMessage('error', 'Please enter a section Name');
            $this->index();
            exit;
        }

        $exists = $section->exist('name', $_POST['sectionName']);
        if ($exists) {
            $this->addMessage('error', 'Name already exists');
            $this->index();
            exit;
        }

        if (!$section->save(['name' => $_POST['sectionName']])) {
            $this->addMessage('error', 'something went wrong');
        }

        $this->addMessage('success', 'section add successfully');
        $this->index();
    }

    public function deleteDepartment()
    {
//        $this->auth();
        $section = new Department;
        $doctorsSections = new DoctorDepartment;

        if (empty($_POST['sectionName'])) {
            $this->addMessage('error', 'Please enter a section Name');
            $this->index();
            exit;
        }

        $exists = $section->get('name', $_POST['sectionName']);
        if (empty($exists)) {
            $this->addMessage('error', 'Please enter correct section Name');
            $this->index();
            exit;
        }

        if (!$doctorsSections->delete([['department_id', $exists->id, '=']])) {
            $this->addMessage('error', 'something went wrong');
        } else {
            if (!$section->delete([['id', $exists->id, '=']])) {
                $this->addMessage('error', 'something went wrong');
            } else {
                $this->addMessage('success', 'section deleted successfully');
            }
        }

        $this->index();
    }

    public function updateDepartment()
    {
//        $this->auth();
        $section = new Department;

        if (empty($_POST['sectionName'])) {
            $this->addMessage('error', 'Please enter a section Name');
            $this->index();
            exit;
        }

        $exists = $section->exist('name', $_POST['sectionName']);
        if ($exists) {
            $this->addMessage('error', 'name already exists');
            $this->index();
            exit;
        }

        if (!$section->updateRow($_POST['sectionID'], ['name' => $_POST['sectionName']])) {
            $this->addMessage('error', 'something went wrong');
        } else {
            $this->addMessage('success', 'section name edited successfully');
        }
        $this->index();
    }

    public function sectionDetails()
    {
        $this->auth();
        $this->layout = 'dashboard';

        $doctorSection = new DoctorSection;
        $section = $doctorSection->select(
            ['sections.*', 'doctors.doctor_id', 'doctors.firstName', 'doctors.lastName', 'doctors.education'],
            [
                ['sections.section_id', array_keys($_GET)[0], '=']
            ],
            null,
            [
                ['sections', '`sections`.`section_id`', '`doctors_sections`.`section_id`', 'INNER'],
                ['doctors', '`doctors`.`doctor_id`', '`doctors_sections`.`doctor_id`', 'INNER'],
            ]
        );

        $available = $doctorSection->select(
            ['doctors.doctor_id', 'doctors.firstName', 'doctors.lastName', 'doctors.education'],
            [
                ['doctors_sections.doctor_id', 'NULL', 'IS']
            ],
            null,
            [
                ['doctors', '`doctors`.`doctor_id`', '`doctors_sections`.`doctor_id`', 'RIGHT'],
            ]
        );

        $this->show('dashboard/sectionDetails', compact('section', 'available'));
    }
}