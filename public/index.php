<?php
require_once '../App/config/config.php';
//require '../vendor/autoload.php';

//echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

//Require the controller class
//require '../App/Controllers/index.php';


//Routing
//require '../Core/Router.php';

//Autoloader (no need for require every time)
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

//Session
session_start();



$router = new Core\Router();

//echo get_class($router);

//Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('signup', ['controller' => 'Signup', 'action' => 'signup']);
$router->add('login', ['controller' => 'Login', 'action' => 'login']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
//$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');
$router->add('{controller}/{id:\d+}');



//Display the routing table
//echo '<pre>';
//var_dump($router->getRoutes());
//echo htmlspecialchars(print_r($router->getRoutes(), true));
//echo '</pre>';


//if($router->match($url)){
//    echo '<pre>';
//    var_dump($router->getParams());
//    echo '</pre>';
//}else{
//    echo "No route was found for URL '$url'";

$router->dispatch($_SERVER['QUERY_STRING']);
