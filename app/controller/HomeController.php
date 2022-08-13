<?php

namespace App\app\controller;

use App\Core\View;

class HomeController extends View
{
    public function index()
    {
        $this->show("home");
    }
}