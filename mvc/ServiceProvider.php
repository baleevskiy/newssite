<?php
namespace mvc;

use mvc\MiddleWareHandler;
use mvc\Registry\RegistryAbstract;

class ServiceProvider extends RegistryAbstract{
    private $__services = [];
    public function init(){
        $this->__services = [
            'middlewareHandler' => function () {return new MiddleWareHandler();},
            'router' => function (){ return new Router();}
        ];
    }

    public function get($key){
        if(null === ($pk = parent::get($key))){
            $service = $this->__services[$key]();
            $this->set($key, $service);
        }
        return parent::get($key);
    }
}