<?php 

ini_set('display_errors', 1);

use App\Core\Application;

// require_once 'core/application.php';
// require_once 'core/model.php';
// require_once 'core/route.php';


spl_autoload_register('autoloader'); //вызывается в результате еще неопределенных классов


function autoloader ($class_name) {
    // $namespaces_array = explode('\\', $class_name); // имя класса приходит с пространством имен
    // $class_name = $namespaces_array[count($namespaces_array) - 1]; //нашли имя класса
    $filename = $class_name . '.php';
    var_dump($class_name . '.php');//

    if (file_exists($filename)) {
        require_once $filename;
    }
    // $file = '/app/controllers/' . $class_name . '.php';
    // if (file_exists($file)) {
    //     var_dump($file);
    //     require_once $file;
    //     return;
    // }

    // $file = '/app/models/' . $class_name . '.php';
    // if (file_exists($file)) {
    //     var_dump($file);
    //     require_once $file;
    //     return;
    // }
    
    // $file = 'core/' . $class_name . '.php';
    // if (file_exists($file)) {
    //     var_dump($file);
    //     require_once $file;
    //     return;
    // }

}

$application = new Application();

$application->route->add('GET', '/', [HomeController::class, 'redirectToHome']);
$application->route->add('GET', '/home', [HomeController::class, 'index']);
$application->route->add('GET', '/home/news', [NewsController::class, 'showNews']);

$request_URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];
$application->route->dispatch($request_URI, $request_method);
