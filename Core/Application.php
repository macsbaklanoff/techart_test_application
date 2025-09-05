<?php

namespace Core;

use Core\Route;
use Core\Model;

class Application
{
    public Route $route;

    public Model $model;

    public function __construct()
    {
        $this->route = new Route();

        $this->model = new Model();
    }

    public static function basePathToTemplate($template) {
        $fullPathToTemplate = $_SERVER['DOCUMENT_ROOT'] . 'templates/' . $template . '.phtml';
        return $fullPathToTemplate;
    }
}