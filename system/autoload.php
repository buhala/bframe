<?php
$libraries=array('testlib');
$models=array('model');
foreach($libraries as $lib){
    include 'libs/'.$lib.'.php';
    $libraries[$lib]=new $lib;
}