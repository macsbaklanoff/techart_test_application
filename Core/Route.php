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

        // var_dump($routes);

        foreach ($routes as $route) {
            $class = new $route;
            $result = $class->route($requestUri);
            if ($result) {
                $controller = new $result['controller'];
                call_user_func_array([$controller, $result['action']], $result['args']);
                return;
            }
        }
        // $homeRouter = new HomeRouter();
        // $newsRouter = new NewsRouter();

        // $homeResult = $homeRouter->route($requestUri);
        // $newsResult = $newsRouter->route($requestUri);

        // if ($homeResult) {
        //     $controller = new $homeResult['controller'];
        //     call_user_func_array([$controller, $homeResult['action']], $homeResult['args']);
        //     return;
        // }
        // if ($newsResult) {
        //     $controller = new $newsResult['controller'];
        //     call_user_func_array([$controller, $newsResult['action']], $newsResult['args']);
        //     return;
        // }

        // $controller = new Controller();
        // $controller->showPageNotFount();
    }
}