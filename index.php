<?php
//error_reporting(0);
global $autoload;
include 'system/b_controller.php';
include 'system/b_model.php';
include 'system/autoload.php';
function validParam($param){
    return preg_match('/^[a-z_]\w+$/i', $param);
}
$raw=$_SERVER['PATH_INFO'];
$string=substr($raw,1);
$parts=  explode('/', $string);
if(!validParam($parts[0])){
    die('INVALID_USER_PARAMS');
}
include 'controllers/'.$parts[0].'.php';
$instance=new $parts[0];
unset($parts[0]);
if(isset($parts[1])){
    if(!validParam($parts[1])){
        die('INVALID_USER_PARAMS');
    }
    $arguments='';
    $currentCode='$instance->'.$parts[1].'(';
    unset($parts[1]);   
    foreach ($parts as $part){
    if(!validParam($part)){
        die('INVALID_USER_PARAMS');
    }
        $arguments.=$part.',';
    }
    $arguments=substr_replace($arguments,"",-1);
    $currentCode=$currentCode.$arguments.');';   
}
else{
    $currentCode='$instance->index();';
}
eval($currentCode);
