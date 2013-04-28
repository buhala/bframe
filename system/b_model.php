<?php
class b_model{
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
}