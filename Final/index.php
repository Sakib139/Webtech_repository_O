<?php
session_start();
$base_url = 'http://localhost:81/PROJECT/Final/index.php/';
$base_url1 = 'http://localhost:81/PROJECT/Final/index.php';
$base_url2 = 'http://localhost:81/PROJECT/Final/';
$base_url3 = 'http://localhost:81/PROJECT/Final';

function base_url($url = ""){
	return 'http://localhost:81/PROJECT/Final/'.$url;
}
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$request_url = str_replace([$base_url, $base_url1, $base_url2, $base_url3], '', $actual_link);
$routeParams = explode('/', $request_url);

if(isset($routeParams[0]) && $routeParams[0] != ""){
	$controllerName = ucfirst(strtolower($routeParams[0]));
}else{
	$controllerName = 'Home';
}

if(isset($routeParams[1]) &&$routeParams[1] != ""){
	$controllerMethodName = $routeParams[1];
}else{
	$controllerMethodName = 'index';
}

array_shift($routeParams);
array_shift($routeParams);

function show_404(){
	echo '<h1 style="font-size: 4rem; text-align: center;">404</h1><h1 style="font-size: 2rem; text-align: center;">Page Not Found</h1>';
}
$controllerPath = 'controllers/'.$controllerName.'.php';
require_once 'Base_controller.php';
require_once 'Base_Model.php';
if(file_exists($controllerPath)){
	require_once $controllerPath;
	$controller = new $controllerName();
	if(method_exists($controller, $controllerMethodName)){
		call_user_func_array([$controller, $controllerMethodName], $routeParams);
	}else{
		show_404();
	}
}else{
	show_404();
}
