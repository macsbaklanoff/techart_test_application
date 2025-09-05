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

    public static function basePath($template) {
        $fullPathToTemplate = $_SERVER['DOCUMENT_ROOT'] . 'Templates/' . $template . '.phtml';
        return $fullPathToTemplate;
    }

}