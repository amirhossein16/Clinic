<?php

namespace App\core;

class Router
{
    protected Request $req;
    public $routeList;
    public $res;

    public function __construct($request)
    {
        $this->res = new Response;
        $this->req = $request;
    }

    public function get($path, $callback)
    {
        $this->routeList['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routeList['post'][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->routeList['delete'][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->routeList['put'][$path] = $callback;
    }

    public function resolve()
    {
        $uri = $this->req->getUrl();
        $method = $this->req->getMethod();
        $callback = $this->routeList[$method][$uri] ?? null;
        if ($callback === null) {
            $this->res->setStatus(404);
            include __DIR__ . "./../view/layouts/404.php";
            exit;
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        echo call_user_func($callback);
    }
}