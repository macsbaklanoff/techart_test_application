<?php 

ini_set('display_errors', 1);

use Core\Application;
use App\Controllers\HomeController;
use App\Controllers\NewsController;

spl_autoload_register('autoloader'); //вызывается в результате еще неопределенных классов

function autoloader ($class_name) {
    $filename = $class_name . '.php';
    $filename = str_replace('\\', '/', $filename);

    if (file_exists($filename)) {
        require_once $filename;
    }
}

$application = new Application();

$application->route->add('GET', '/', [HomeController::class, 'redirectToHome']);
$application->route->add('GET', '/home', [HomeController::class, 'index']);
$application->route->add('GET', '/home/news', [NewsController::class, 'showNews']);

$request_URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($request_URI, $request_method);
