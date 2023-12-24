<?php


session_start();

$basePath = __DIR__."/../";

require($basePath."function/index.php");

spl_autoload_register(function($classes){
   $class = str_replace("\\",DIRECTORY_SEPARATOR,$classes);
   require base_path("{$class}.php");
});

use Core\Route;

$router = new Route();

require base_path("route.php");

$url = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = $_POST['__METHOD'] ?? $_SERVER["REQUEST_METHOD"];

$router->route($url,$method);