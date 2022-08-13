<?php

namespace App\app\model;

use App\core\Model;

class DoctorPatient extends Model
{
    protected array $convert = [];

    public function getTable(): string
    {
        return 'doctor_patient';
    }

    public function getRules(): array
    {
        return [
            'patient_id' => ['required'],
            'date' => ['required'],
            'day' => ['required'],
            'time' => ['required'],
            'role' => ['patient']
        ];
    }
}