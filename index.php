<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');
define('BASE_PATH', __DIR__);
define('ACTION_PREFIX', 'action');

$route = $_SERVER['REQUEST_URI'];
$route = str_replace('/index.php/','', $route);


$parts = explode('/', $route);
$controllerPath = '';
//if only two parts then site route
if (sizeof($parts) === 2) {
    $parts[0] = ucfirst($parts[0]);
    $controllerName = $parts[0].'Controller';
    $actionName = $parts[1];
    $controllerPath = BASE_PATH.'/core/site/controllers/'.$controllerName.'.php';
}
//if three routes then is route (like /admin/post/index)
elseif (sizeof($parts) ===3 && $parts[0] === 'admin') {
    $parts[1] = ucfirst($parts[1]);
    $controllerFileName = $parts[1].'Controller';
    $controllerName = '\core\admin\controllers\\'. $controllerFileName;
    $actionName = $parts[2];
    $controllerPath = BASE_PATH.'/core/admin/controllers/'.$controllerFileName.'.php';
}

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    if (!method_exists($controllerName, $actionName)) {
        //stop-------------------------
    }

    $controller = new $controllerName();
    $controller->{ACTION_PREFIX.$actionName}();
    
    var_dump($controller);
}

