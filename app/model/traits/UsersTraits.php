<?php

namespace App\app\Model\traits;

trait UsersTraits
{
    public function getRules(): array
    {
        return [
            'role' => ['required'],
//            'firstName' => ['name'],
//            'lastName' => ['name'],
//            'email' => ['email'],
            'username' => ['required', 'username'],
            'password' => ['required', 'password'],
            'confirmPassword' => ['required', ['matchParam', 'matchParam' => 'password']]
        ];
    }

    public function personalEditRules()
    {
        return [
            'firstName' => ['name'],
            'lastName' => ['name'],
            'file' => ['avatar'],
        ];
    }

    public function educationEditRules()
    {
        return [
            'visit_time' => ['visit_time'],
        ];
    }

    public function accountEditRules()
    {
        return [
            'email' => ['email'],
            'username' => ['required', 'username'],
            'password' => ['required', 'password'],
            'confirmPassword' => ['required', ['matchParam', 'matchParam' => 'password']]
        ];
    }
}
