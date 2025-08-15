<?php 

ini_set('display_errors', 1);
require_once 'core/application.php';
require_once 'core/model.php';
// require_once 'core/view.php';
// require_once 'core/controller.php';
require_once 'core/route.php';


$application = new Application();

$application->route->add('GET', '/', [HomeController::class, 'index']);
$application->route->add('GET', '/news', [NewsController::class, 'show_news']);


$request_URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($request_URI, $request_method);
