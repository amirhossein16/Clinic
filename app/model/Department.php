<?php

namespace App\app\model;

use App\core\Model;

class Department extends model
{
    protected array $convert = [];

    function getTable(): string
    {
        return 'department';
    }
}