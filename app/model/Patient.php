<?php

namespace App\Model;

use App\app\Model\traits\UsersTraits;
use App\Core\Model;

class Patient extends Model
{
    protected array $convert = [
        'visit_time' => 'array'
    ];

    use UsersTraits;

    public function getTable(): string
    {
        return 'patient';
    }

}
