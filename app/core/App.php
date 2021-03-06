<?php

class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct(){
        $url = $this->parseUrl();

        //Cek apakah ada controller terdaftar
        if(file_exists("../app/controllers/".ucfirst($url[0]).".php")){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once "../app/controllers/".ucfirst($this->controller).".php";
        $this->controller = new $this->controller;

        //Cek apakah ada method yang tersedia
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}