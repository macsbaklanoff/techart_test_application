<?php

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

$application->route->add('GET', '/', [HomeController::class, 'showHome']);
$application->route->add('GET', '/news/', [NewsController::class, 'redirectToFirstPage']);
$application->route->add('GET', '/news/page-{page}', [NewsController::class, 'showNews']);
$application->route->add('GET', '/news/{id}', [NewsController::class, 'showDetailNews']);

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($requestUri, $requestMethod);
