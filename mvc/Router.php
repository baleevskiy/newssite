<?php

namespace mvc;
use \controllers;

class Router{
    protected $_routes;
    protected $_paths = [];
    public function setRoutes($routes){
        $this->_routes = $routes;
    }
    /**
     * @param Request $request
     * @return Controller controller
     */
    public function getController(Request $request){
        $data = $this->getMatch($request);

        $cName = ucfirst(explode('/', $data['route'])[0])."Controller";
        $controllerClassName = "controllers\\{$cName}";
        return new $controllerClassName;
    }

    public function getMatch(Request $request){
        $path = $request->getPath();
        $matches = [];
        $data = [
            'route' => '/',
            'matches' => [],
        ];
        foreach($this->_routes as $rule => $route){
            if(isset($this->_paths[$path])){
                $data = $this->_paths[$path];
                break;
            }

            $regex = "/<(.+?):(.+?)>/";
            $rule = preg_replace($regex,'(?P<\1>\2)', $rule);
            $regex = addcslashes($rule, '/');

            if(preg_match("/{$regex}/", $path, $matches)){
                $data = [
                    'matches' => $matches,
                    'route' => $route];
                $this->_paths[$path] = $data;
                break;
            }
        }
        return $data;
    }

    /**
     * @param Request $request
     * @return string action
     */
    public function getAction(Request $request){
        $data = $this->getMatch($request);
        $actionName = ucfirst(explode('/', $data['route'])[1]);
        return [
            'name' => $actionName,
            'params' => $data['matches']];
    }
}