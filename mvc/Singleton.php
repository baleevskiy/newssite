<?php
namespace mvc;

class Singleton {
    protected static $__instances;
    private function __construct(){
        $this->init();
    }

    /**
     * primary method to init some functionality in inherited classes
     */
    public function init(){}

    public function  __clone(){}

    public static function instance(){
        $class = get_called_class();
        if(!isset(self::$__instances[$class])){
            self::$__instances[$class] = new static();
        }
        return self::$__instances[$class];
    }
}