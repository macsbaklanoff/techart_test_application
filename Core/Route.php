<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;

class Route
{
  protected array $routes = [];

  public function add($method, $path, $handler)
  {
    $this->routes[] = [
      'method' => $method,
      'path' => $path,
      'handler' => $handler
    ];
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function dispatch($requestUri, $requestMethod): void
  {
    switch(true) {
      case $requestUri === '/':
        $controller = new HomeController();
        $controller->showHome();
        break;
      case $requestUri === '/news/':
        $controller = new NewsController();
        $controller->redirectToFirstPage();
        break;
      case preg_match('~^/news/page-(\d+)/$~', $requestUri, $matches):
        $controller = new NewsController();
        $controller->showListNews($matches[1]);
        break;
      case preg_match('~^/news/(\d+)/$~', $requestUri, $matches):
        $controller = new NewsController();
        $controller->showDetailPage($matches[1]);
        break;
      default:
        $controller = new Controller();
        $controller->showPageNotFount();
        break;
    }
  }

}