<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Interfaces\IRoute;

class HomeRouter implements IRoute
{
    public function route($requestUri)
    {
        if ($requestUri === "/") {
            return array(
                'controller' => HomeController::class,
                'action' => 'showHome',
                'args' => [],
            );
        }
        return false;
    }

    public function getHomeUrl() {
        return '/';
    }
}