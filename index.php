<?php 
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');
define(BASE_PATH, __DIR__);
$route = $_SERVER['REQUEST_URI'];
$route = str_replace('/index.php/','', $route);
$parts = explode('/', $route);
$parts[0] = ucfirst($parts[0]);

require_once __DIR__.'/core/admin/controllers/PostController.php';
$c = new PostController;

$c->$parts[1]();
//var_dump($c);
//echo $route;
//:w
//print_r($parts);
?>
