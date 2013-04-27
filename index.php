<?php
//error_reporting(0);
global $autoload;
define('PROJECT_DIR', 'C:\xampp\htdocs\bframe/');
include PROJECT_DIR.'system/config.php';
include PROJECT_DIR.'system/b_library.php';
include PROJECT_DIR.'system/b_controller.php';
include PROJECT_DIR.'system/b_model.php';
include PROJECT_DIR.'system/autoload.php';
function validParam($param){
    return preg_match('/^[a-z_]\w+$/i', $param);
}
$raw=$_SERVER['PATH_INFO'];
if(!$raw){
    $instance=new $GLOBALS['config']['autoload_controller'];
    $instance->index();
}
$string=substr($raw,1);
$parts=  explode('/', $string);
if(!validParam($parts[0])){
    die('INVALID_USER_PARAMS');
}
include PROJECT_DIR.'controllers/'.$parts[0].'.php';
$instance=new $parts[0];
unset($parts[0]);
if(isset($parts[1])){
    if(!validParam($parts[1])){
        die('INVALID_USER_PARAMS');
    }
    $arguments='';
    
    
    $methodname=$parts[1];
    unset($parts[1]);
    foreach ($parts as $part){
    if(!validParam($part)){
        die('INVALID_USER_PARAMS');
    }
        $arguments[]=$part; //In case we want to do some validation later
    }
   // var_dump($arguments);
	call_user_func_array(array($instance, $methodname), $arguments);

}
else{
    $instance->index();
}
//eval($currentCode);

