<?php
namespace mvc\Registry;
use mvc\Registry\RegistryAbstract;


class RegistryRequest extends RegistryAbstract {
}

class RegistrySession extends RegistryAbstract {
    public function init(){
        session_start();
    }

    public function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public function get($key){
        return $_SESSION[$key];
    }
}

/*
 * just a filesystem storage without locks
 */
class RegistryApplication extends RegistryAbstract {
    protected $_fileName='tmp/.app';
    protected $_isChanged = false;
    public function init(){
        if(!file_exists($this->_fileName)){
            touch($this->_fileName);
        } else {
            foreach (unserialize(file_get_contents($this->_fileName)) as $k => $v) {
                $this->set($k, $v);
            }
        }
    }
    public function set($key, $value){
        $this->_isChanged = true;
        return parent::set($key, $value);
    }

    public function __destruct(){
        if($this->_isChanged) {
            file_put_contents($this->_fileName, serialize($this->_data));
        }
    }
}