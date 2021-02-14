<?php

class Controller{

    protected function view($view, $params = [])
    {
        extract($params);
        require_once "../app/views/$view.php";
    }

    protected function model($model)
    {
        require_once "../app/models/$model.php";
        return new $model;
    }
}