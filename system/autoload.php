<?php
//Input libraries to autoload right here!
$libraries=array('database');
foreach($libraries as $lib){
    include 'libs/'.$lib.'.php';
    $libraries[$lib]=new $lib;
}