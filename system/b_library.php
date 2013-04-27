<?php
class b_library{
    public function __construct() {
        
        $classname=get_class($this);
        foreach($GLOBALS['config']['libraries'][$classname] as $key=>$value){
            $this->key=$value;
        }
    }
}