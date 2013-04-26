<?php
class b_model{
    public function loadModel($model){
        include 'models/'.$model.'.php';
        $this->$model=new $model;
        return $model;
    }
}