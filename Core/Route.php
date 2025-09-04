<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;

class Route
{
    public $routes = [];

    public function add($class) {
        array_push($this->routes, $class);
    }
    
    public function dispatch($requestUri, $requestMethod): void
    {
        foreach ($this->routes as $route) {
            $class = new $route();
            $result = $class->route($requestUri);
            if ($result) {
                $controller = new $result['controller'];
                call_user_func_array([$controller, $result['action']], $result['args']);
                return;
            }
        }
        http_response_code(404);
        require 'App/Views/PageNotFound.php';

    }
}