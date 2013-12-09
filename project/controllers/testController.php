<?php
class testController{
    use b_controller;
    public function test(){
        $view=$this->loadView('test',array(),true);
        var_dump($view);
    }
}