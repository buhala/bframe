<?php
class b_controller{
    public function loadModel($model){
        include 'models/'.$model.'.php';
        $this->$model=new $model;
        return $model;
    }
    public function loadLibrary($lib){
        include 'libs/'.$lib.'.php';
        $libraries[$lib]=new $lib;
    }
    public function loadView($view,$input=array()){
        
        global $data;
        $data=$input;
        include 'views/'.$view.'.php';
        
    }
}