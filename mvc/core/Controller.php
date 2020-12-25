<?php
class Controller{
    final public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model();
    }

    final public function view($view, $data = []){
        require_once "./mvc/views/".$view.".php";
    }
}
?>