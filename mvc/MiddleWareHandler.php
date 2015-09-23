<?php

namespace mvc;

use mvc\Middleware;
use mvc\Middleware\MiddlewareBase;


class MiddleWareHandler {
    protected $_config;

    public function setConfig(array $config){
        foreach($config as $mwName){
            $className = __NAMESPACE__."\\Middleware\\$mwName";
            $middleWareInstance = new $className;
            $this->addMiddleware($middleWareInstance);
        }
    }


    public function addMiddleware(MiddlewareBase $mw){
        $this->_config[] = $mw;
        return $this;
    }

    public function runAll(Request $request, Response $response){
        foreach($this->_config as $mw){
            $mw->run($request, $response);
        }
        return $this;
    }
}