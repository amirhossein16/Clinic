<?php

namespace App\app\controller;

use App\app\model\Doctor;
use App\Core\View;

class DoctorController extends view
{
    public function doctorList()
    {
        $doctor = new Doctor();
        $itemPerPage = 20;
        $currentPage = $_GET['page'] ?? 1;
        $filter = $_GET['filter'] ?? null;
        $sort = [];
        $where = [
            ['confirm', 'NULL', 'IS NOT'],
            ['confirm', 'denied', '!=', 'AND']
        ];
        if (isset($_GET['search'])) {
            $where[] = ["`firstName`", "%$_GET[search]%", 'LIKE', 'AND'];
            $where[] = ["`lastName`", "%$_GET[search]%", 'LIKE', 'OR'];
        }
        if (isset($filter['department']) && !empty($filter['department'])) {
            $where[] = ['department.name', $filter['department'], '='];
        }
        if (isset($filter['education']) && !empty($filter['education'])) {
            $where[] = ['doctors.education', $filter['education'], '='];
        }
        if (isset($filter['sortBy'])) {
            $sortBy = explode(':', $filter['sortBy']);

            $sort[] = [$sortBy[0], $sortBy[1]];
        }

        $doctors = $doctor->find(
            ['doctor.id', 'doctor.FirstName', 'doctor.lastName', 'doctor.education', 'department.department_Name'],
            $where,
            $sort,
            [
                ['doctor_department', 'doctor_department.doctor_id', 'doctor.id', 'LEFT'],
                ['department', 'doctor_department.department_id', 'department.id', 'LEFT'],
            ]
        );
        $education = $doctor->find(['*'], [['confirm', 'NULL', 'IS NOT']], null, null, null, 'education');
        $pagination = $this->pagination((array)$doctors, 5);
        $doctorsCount = count($doctors);
        $department = $this->findDepartment();
        $doctors = array_slice((array)$doctors, $itemPerPage * ($currentPage - 1), $itemPerPage);
        $this->show('doctors', compact('doctors', 'education', 'pagination', 'doctorsCount', 'department','filter'));
    }
}