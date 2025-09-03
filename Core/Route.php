<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;
use App\Routes\HomeRouter;
use App\Routes\NewsRouter;

class Route
{
  protected array $routes = [];

  // public function add($method, $path, $handler)
  // {
  //   $this->routes[] = [
  //     'method' => $method,
  //     'path' => $path,
  //     'handler' => $handler
  //   ];
  // }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function dispatch($requestUri, $requestMethod): void
  {
    $homeRouter = new HomeRouter();
    $newsRouter = new NewsRouter();

    $homeResult = $homeRouter->route($requestUri);
    $newsResult = $newsRouter->route($requestUri);

    if ($homeResult) {
      $controller = new $homeResult['controller'];
      // var_dump($homeResult['action']);
      call_user_func_array([$controller, $homeResult['action']], $homeResult['args']);
      return;
    }
    if ($newsResult) {
      $controller = new $newsResult['controller'];
      // var_dump($newsResult['action']);
      call_user_func_array([$controller, $newsResult['action']], $newsResult['args']);
      return;
    }

    $controller = new Controller();
    $controller->showPageNotFount();

    // switch (true) {

    //   case $requestUri === '/':
    //     $controller = new HomeController();
    //     $controller->showHome();
    //     break;

    //   case $requestUri === '/news/':
    //     $controller = new NewsController();
    //     $controller->showListNews(1);
    //     break;

    //   case preg_match('~^/news/page-(\d+)/$~', $requestUri, $matches):
    //     $controller = new NewsController();
    //     $controller->showListNews($matches[1]);
    //     break;

    //   case preg_match('~^/news/(\d+)/$~', $requestUri, $matches):
    //     $controller = new NewsController();
    //     $controller->showDetailPage($matches[1]);
    //     break;
        
    //   default:
    //     $controller = new Controller();
    //     $controller->showPageNotFount();
    //     break;
    // }
    // $operation = match($requestUri) {
    //   '/' => (new HomeController())->showHome(),
    //   '/news/' => (new NewsController())->showListNews(1),
    //   preg_match('~^/news/page-(\d+)/$~', $requestUri, $matches) => (new NewsController())->showListNews($matches[1]) ,
    //   preg_match('~^/news/(\d+)/$~', $requestUri, $matches) => (new NewsController())->showDetailPage($matches[1]) ,
    //   default => (new Controller())->showPageNotFount()
    // };
    // var_dump($operation);
  }
}