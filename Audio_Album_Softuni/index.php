<?php

session_start();

require_once('includes/config.php');

$requestParts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$requestParts = array_filter($requestParts);

$controllerName = DEFAULT_CONTROLLER;

if( count($requestParts) > 1) {
    $controllerName = $requestParts[2];
}

$action = DEFAULT_ACTION;

if( count($requestParts) > 2 ) {
    $action = $requestParts[3];
}

$params = array_splice($requestParts, 3);

$controllerClassName = ucfirst(strtolower($controllerName)) . 'Controller';
$controllerFileName = "controllers/" .$controllerClassName . '.php';

if(class_exists($controllerClassName)) {
    $controller = new $controllerClassName( $controllerName, $action );
}
else {
    die('There is no such controller.');
}


if( method_exists( $controller, $action ) ) {
    call_user_func_array(array($controller, $action), $params);
    $controller->renderView();
}
else {
    die("Cannot find $action in controller $controllerClassName");
}

$controller->renderView();

function __autoload( $class_name ) {

    if( file_exists("controllers/$class_name.php") ) {
        include "controllers/$class_name.php";
    }
    if( file_exists("models/$class_name.php") ) {
        include "models/$class_name.php";
    }
}



