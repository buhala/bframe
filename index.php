<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
global $autoload;
define('PROJECT_DIR', 'C:\xampp\htdocs\bframe/');
include PROJECT_DIR.'system/includes.php';
$bootstrap=new bootstrap($_SERVER['PATH_INFO']);
$controller=$bootstrap->getController();
$instance=$bootstrap->createInstance($controller);
$method=$bootstrap->getMethod();
$arguments=$bootstrap->getArguments();
call_user_func_array(array($instance, $method), $arguments);
