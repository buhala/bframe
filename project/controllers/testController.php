<?php
class testController{
    use b_controller;
    public function test(){
        $view=$this->loadView('test',array(),true);
        $this->loadModel('test_model');
        var_dump($view);
    }
}