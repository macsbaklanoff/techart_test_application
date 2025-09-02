<?php

namespace Core;

use App\Controllers\NewsController;
use App\Controllers\HomeController;

class Route
{
  protected array $routes = [];

  public function add($method, $path, $handler){
    $this->routes[] = [
      'method' => $method,
      'path'=> $path,
      'handler'=> $handler
    ];
  }

  public function getRoutes(): array {
    return $this->routes;
  }

  public function dispatch($requestUri, $requestMethod): void {
    foreach ($this->routes as $route) {
      $params =[];
      if ($route['method'] === $requestMethod && $route['path'] == $requestUri) {
        [$class, $method] = $route['handler'];
        $controller = new $class;
        call_user_func_array([$controller, $method], $params);
        return;
      }
    }
    http_response_code(404);
    require_once 'App/Views/PageNotFound.php';
  }

}