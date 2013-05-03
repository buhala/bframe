<?php
//Input libraries to autoload right here!
//If you are using a library, type in global $libraries whereever you are using it
$libraries_list=array('database');
foreach($libraries_list as $lib){
    include 'libs/'.$lib.'.php';
    $libraries[$lib]=new $lib;
}
