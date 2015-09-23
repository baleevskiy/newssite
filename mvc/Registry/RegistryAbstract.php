<?php
namespace mvc\Registry;

use mvc\Singleton;
use mvc\Registry\RegistryInterface;

abstract class RegistryAbstract extends Singleton implements RegistryInterface{
    //all the data will be stored here
    protected $_data = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value){
        $this->_data[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key){
        return isset($this->_data[$key]) ? $this->_data[$key] : null;
    }

    public function __get($key){
        return $this->get($key);
    }

    public function __set($key, $value){
        return $this->set($key, $value);
    }
}