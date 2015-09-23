<?php
namespace mvc;
use mvc\ServiceProvider;

class App extends Singleton{

    private $__serviceProvider;
    private $__middlewareHandler;
    private $__appConfig;
    /**
     * @return $this
     */
    public function init(){
        $this->loadConfig();
        $this->__serviceProvider = ServiceProvider::instance();
        $this->__middlewareHandler = $this->getService('middlewareHandler');
        $this->__middlewareHandler->setConfig($this->__appConfig['middleware']);
        return $this;
    }

    public function getService($serviceName){
        return $this->__serviceProvider->$serviceName;
    }

    public function run(){
        $this->__middlewareHandler->runAll(new Request(), new Response());
    }

    /**
     * loads all configs from config directory
     * @return null
     *
     */
    private function loadConfig()
    {
        if(false !== ($dh = opendir(PATH_CONFIG))){
            while(false !== ($scriptName = readdir($dh))){
                if(in_array($scriptName ,['.', '..']))
                    continue;
                $res = include(PATH_CONFIG.'/'.$scriptName);
                //TODO: add checks about config schema
                foreach($res as $name=>$config){
                    $this->__appConfig[$name] = $config;
                }
            }

        }

    }

    public function getConfig($componentName){
        return isset($this->__appConfig[$componentName])?$this->__appConfig[$componentName]:null;
    }

    public function setConfig($componentName, $confData){

    }

    private function loadComponents()
    {
    }
}