<?php

namespace App\Routes;

use App\Controllers\NewsController;
use App\Interfaces\IRoute;
use Core\Controller;

class NewsRouter implements IRoute
{

    public function route($requestUri)
    {
        if ($requestUri === "/news/") {
            return array(
                'controller' => NewsController::class,
                'action' => 'showListNews',
                'args' => [1],
            );
        }

        else if (preg_match('~^/news/page-(\d+)/$~', $requestUri, $matches)) {
            return array(
                'controller' => NewsController::class,
                'action' => 'showListNews',
                'args' => [$matches[1]],
            );
        } 

        else if (preg_match('~^/news/(\d+)/$~', $requestUri, $matches)) {
            return array(
                'controller' => NewsController::class,
                'action' => 'showDetailPage',
                'args' => [$matches[1]],
            );
        }

        return false;
    }

    public function getListUrl($page = 1)
    {
        return "/news/page-$page/";
    }

    public function getViewUrl($id)
    {
        return "/news/$id/";
    }


}
