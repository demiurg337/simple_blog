<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');
define('BASE_PATH', __DIR__);
$route = $_SERVER['REQUEST_URI'];
$route = str_replace('/index.php/','', $route);


$parts = explode('/', $route);
$controllerPath = '';
//if only two parts then site route
if (sizeof($parts) === 2) {
    //$controllerPath = BASE_PATH.'/core/admin/'.$parts[0].'Controller';
}
//if three routes then is route (like /admin/post/index)
elseif (sizeof($parts) ===3) {
    $parts[1] = ucfirst($parts[1]);
    $controllerName = $parts[1].'Controller';
    $actionName = $parts[2];
    $controllerPath = BASE_PATH.'/core/admin/controllers/'.$controllerName.'.php';
}


if (file_exists($controllerPath)) {
    require_once $controllerPath;
    
    if (!method_exists($controllerName, $actionName)) {
        //-------------------------
    }

    $controller = new $controllerName();
    $controller->$actionName();
    
    var_dump($controller);
}

die;
require_once __DIR__.'/core/admin/controllers/PostController.php';
$c = new PostController;

$c->$parts[1]();
//var_dump($c);
//echo $route;
//:w
//print_r($parts);
?>
