<?php
require_once 'request.php';
require_once 'response.php';
require_once 'route.php';

class Application {
  protected string $uri;

  public Request $request;
  public Response $response;

  public Route $route;

  public Model $model;

  public function __construct() {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->request = new Request($this->uri);
    $this->response = new Response();
    $this->route = new Route($this->request, $this->response);

    $this->model = new Model();
  }

}