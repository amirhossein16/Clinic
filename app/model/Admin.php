<?php

namespace App\app\Model;

use App\app\Model\traits\UsersTraits;
use App\Core\Model;

class Admin extends Model
{
    use UsersTraits;
    protected array $convert = [];

    public function getTable():string
    {
        return 'admin';
    }
}
