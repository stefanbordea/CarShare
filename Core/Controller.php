<?php

namespace Core;

use App\Authentication;

abstract class Controller
{
    #Parameters from the matched route
    protected $route_params = [];


    public function __construct($route_params){
        $this->route_params = $route_params;
    }

    public function __call($name, $args){
        $method = $name . 'Action';

        if(method_exists($this, $method)){
            if($this->before() !== false){
                call_user_func([$this, $method], $args);
                $this->after();
            }
        }else{
//            echo "Method $method not found in controller " . get_class($this);
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected function before(){

    }

    protected function after(){

    }

    public function redirect($url){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url, true, 303);
        exit;
    }

    public function requireLogin(){
        if(!Authentication::isLoggedIn()){
            Authentication::rememberRequestedPage();
            $this->redirect('/login');
        }
    }
}