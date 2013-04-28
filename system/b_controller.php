<?php
class b_controller{
    /**
    *Loads a model
    **/
    public function loadModel($model){
        include 'models/'.$model.'.php';
        $this->$model=new $model;
        return $model;
    }
    /**
    *Loads a library
    **/
    public function loadLibrary($lib){
        include 'libs/'.$lib.'.php';
        $libraries[$lib]=new $lib;
    }
    /**
    *Loads a view
    **/
    public function loadView($view,$input=array()){
        
        global $data;
        $data=$input;
        include 'views/'.$view.'.php';
        
    }
}