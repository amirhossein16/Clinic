<?php

namespace App\app\Model;

use App\core\Model;

class DoctorDepartment extends Model
{
    protected array $convert = [];

    public function getTable(): string
    {
        return 'doctor_department';
    }
}