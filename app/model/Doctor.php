<?php

namespace App\app\model;

use App\core\Model;

class Doctor extends Model
{
    protected array $convert = [
        'visit_time' => 'array',
        'social' => 'array'
    ];

    use traits\UsersTraits;

    function getTable(): string
    {
        return 'Doctor';
    }
}