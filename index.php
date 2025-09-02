<?php

use App\Controllers\DetailNewsController;

ini_set('display_errors', 1);

use Core\Application;
use App\Controllers\HomeController;
use App\Controllers\NewsController;

require_once 'Config/ConfigDataBase.php';

spl_autoload_register('autoloader'); //вызывается в результате еще неопределенных классов

function autoloader($className)
{
    $filename = $className . '.php';
    $filename = str_replace('\\', '/', $filename);

    if (file_exists($filename)) {
        require_once $filename;
    }
}

$application = new Application();
$application->route->add('GET', '/', [HomeController::class, 'index']);
$application->route->add('GET', '/news/', [NewsController::class, 'listNews']); //news/page-2/;
$application->route->add('GET', '/news/{id}', [DetailNewsController::class, 'showDetailNews']); //с использованием регулярок

$requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump($requestURI);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($requestURI, $requestMethod);
