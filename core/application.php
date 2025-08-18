<?php
require_once 'route.php';

class Application {
  protected string $uri;


  public Route $route;

  public Model $model;

  public function __construct() {
    $this->route = new Route();

    $this->model = new Model();
  }

}