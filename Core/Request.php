<?php

namespace App\Core;

class Request
{
    public function getUrl(): bool|array|int|string|null
    {
        $url = $_SERVER['REQUEST_URI'];
        return parse_url($url, PHP_URL_PATH);
    }

    public function getMethod()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if ($method === 'post') {
            if (isset($_POST['_method']) and $_POST['_method'] == 'put') {
                return 'put';
            }
            if (isset($_POST['_method']) and $_POST['_method'] == 'delete') {
                return 'delete';
            }
        }
        return $method;
    }
}