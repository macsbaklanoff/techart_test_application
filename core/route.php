<?php

require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/NewsController.php';

class Route
{

  protected array $routes = [];

  protected array $routes_params = [];

  public Request $request;
  public Response $response;
  public function __construct($request, $response) {
    $this->request = $request;
    $this->response = $response;
  }

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
    require_once 'app/views/PageNotFound.php';
  }

}