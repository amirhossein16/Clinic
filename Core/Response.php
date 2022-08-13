<?php

namespace App\Core;

class Response
{
    public function setStatus($code): bool|int
    {
        return http_response_code($code);
    }

    public function setCookie(array $data)
    {
        setCookie('userdata', serialize($data), time() + 60 * 60 * 24);
    }

    public function unsetCookie(string $name)
    {
        unset($_COOKIE[$name]);
        setcookie($name, null, -1, '/');
    }
}