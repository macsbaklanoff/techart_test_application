<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;
use App\Routes\HomeRouter;
use App\Routes\NewsRouter;

class Route
{
    public function dispatch($requestUri, $requestMethod): void
    {

        $routes = [HomeRouter::class, NewsRouter::class];

        foreach ($routes as $route) {
            $class = new $route;
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