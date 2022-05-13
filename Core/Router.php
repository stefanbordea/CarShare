<?php

namespace Core;

class Router
{
    #Associative array of routes (this is the routing table)
    protected $routes = [];
    #Parameters from the matched route
    protected $params = [];

    #Add a route to the routing table
    #$route is the route url, $params refers to the controller and the action
    public function add($route, $params = []){

        #Convert the route to a regex, escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        #Convert variables eg controller
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        #Convert variables with custom regex eg {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        #Add start and end delimiters and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    #Get all the routes from the routing table
    public function getRoutes(){
        return $this->routes;
    }

    #Return the route to the routes in the routing table $routes[]
    #and set the $params property if a route is found
    public function match($url){
//        foreach ($this->routes as $route => $params){
//            if($url == $route){
//                $this->params = $params;
//                return true;
//            }
//        }
//        return false;

        #Match to the fixed url format /controller/action
        #$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                #$params = [];
                foreach ($matches as $key => $match){
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function getParams(){
        return $this->params;
    }

    #Dispatch the route, creating the controller object and running the action method
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $controller_object->$action();

                } else {
//                    echo "Method $action (in controller $controller) not found";
                    throw new \Exception("Method $action (in controller $controller) not found");
                }
            } else {
//                echo "Controller class $controller not found";
                throw new \Exception("Controller class $controller not found");
            }
        } else {
//            echo 'No route matched.';
            throw new \Exception("No route matched");
        }
    }

    #Convert the string with hyphens to StudlyCaps
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    #Convert the string with hyphens to camelCase
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function removeQueryStringVariables($url){
        if($url != ''){
            $parts = explode('&', $url, 2);

            if(strpos($parts[0], '=') === false){
                $url = $parts[0];
            }else{
                $url = '';
            }
        }
        return $url;
    }

    protected function getNamespace(){
        $namespace = 'App\Controllers\\';

        if(array_key_exists('namespace', $this->params)){
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }

}