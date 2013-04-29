<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //The system occasionally throws a notice
default_socket_timeout(6);
global $autoload;//We want it accessed from a lot of places
define('PROJECT_DIR', 'C:\xampp\htdocs\bframe/');//Change this line in case you move the project somewhere else
include PROJECT_DIR.'system/includes.php'; 
if($GLOBALS['config']['system']['update']==true){
	$updater=new updater();
	$updater->checkVersion();
}
$bootstrap=new bootstrap($_SERVER['PATH_INFO']);
$controller=$bootstrap->getController();
$instance=$bootstrap->createInstance($controller);
$method=$bootstrap->getMethod();
$arguments=$bootstrap->getArguments();
call_user_func_array(array($instance, $method), $arguments);
