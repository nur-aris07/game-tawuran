<?php

class App {
    protected $controller = 'mainmenu';
    protected $method = 'index';
    protected $params = [];
    protected $guest = ['login','daftar'];

    public function __construct()
    {
        $url = $this->parseURL();
        if (is_null($url)) {
            if (!isset($_SESSION['auth'])) {
                $this->controller = 'login';
            }
        } else if ($url!=[]) {
            if( !isset($_SESSION['auth']) && !in_array($url[0],$this->guest) ) {
                $url = [];
                $url[0] = 'login';
            }
            if( isset($_SESSION['auth']) && in_array($url[0],$this->guest) ) {
                $url = [];
                $url[0] = 'mainmenu';
            }
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        // var_dump($url);


        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}