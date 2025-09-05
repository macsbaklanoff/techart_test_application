<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;

class Route
{
    public static $routes = [];

    public function add($nameClass, $class)
    {
        $objectClass = new $class();
        self::$routes[$nameClass] = $objectClass;
    }

    public function dispatch($requestUri, $requestMethod): void
    {
        foreach (self::$routes as $route) {
            $class = new $route();
            $result = $class->route($requestUri);
            if ($result) {
                $controller = new $result['controller'];
                call_user_func_array([$controller, $result['action']], $result['args']);
                return;
            }
        }
        http_response_code(404);

        require_once Application::basePathToTemplate('pageNotFound');

    }
}