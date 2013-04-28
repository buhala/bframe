<?php
class bootstrap{
    private $raw;
    private $components;
    private $arguments;
    public function __construct($raw) {
        $this->raw=substr($raw,1);
        $this->components=explode('/', $this->raw);
        $arguments=$this->components;
        unset($arguments[0]);
        unset($arguments[1]);
        $this->arguments=$arguments;
        
    }
    public function validParam($param){
        return preg_match('/^[a-z_]\w+$/i', $param);
    }
    public function getController(){
        if($this->components[0]){
            if($this->validParam($this->components[0])){
            return $this->components[0];
            }
            else{
                
                $this->terminate();
            }
            
        }
        else{
            return $GLOBALS['config']['autoload_controller'];
        }
    }
    private function terminate(){
        die('BOOTSTRAP_ERROR');
    }
    public function createInstance($controller){ //For people modding the index file
        include PROJECT_DIR.'controllers/'.$controller.'.php';
        $return=new $controller;
        return $return;
        
    }
    public function getMethod(){
        if(isset($this->components[1])){
            if($this->validParam($this->components[1])){
                return $this->components[1];
            }
            else{
                
                $this->terminate();
            }
        }
        else{
            return $index;
        }
    }
    public function getArguments(){
        if(is_array($this->arguments)){
            return $this->arguments;
        }
        else{
            return array();
        }
    }
    
    
}