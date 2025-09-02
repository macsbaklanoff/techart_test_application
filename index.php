<?php 

ini_set('display_errors', 1);

use Core\Application;
use App\Controllers\HomeController;
use App\Controllers\NewsController;

require_once 'Config/ConfigDataBase.php';

spl_autoload_register('autoloader'); //вызывается в результате еще неопределенных классов

function autoloader ($className) {
    $filename = $className . '.php';
    $filename = str_replace('\\', '/', $filename);

    if (file_exists($filename)) {
        require_once $filename;
    }
}

$application = new Application();

$application->route->add('GET', '/', [HomeController::class, 'redirectToHome']);
$application->route->add('GET', '/home', [HomeController::class, 'index']);
$application->route->add('GET', '/home/news', [NewsController::class, 'showNews']);

$requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($requestURI, $requestMethod);
