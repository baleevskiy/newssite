<?php

namespace mvc;

use BadMethodCallException;

/**
 * @property Controller _controller
 */
class Request{
    public $data;
    protected $_view;
    protected $_layout;
    protected $_controller;
    protected $_action;

    public function __construct(){
        $this->_view = 'index';
        $this->_layout = 'index';

    }

    public function getRequestData(){
        return $_REQUEST;
    }

    public function getRequestType(){
        throw new BadMethodCallException();
    }

    public function getHeaders(){
        throw new BadMethodCallException();
    }

    public function getCookeis(){
        return $_COOKIE;
    }

    public function setView($filename){
        $this->_view = $filename;
        return $this;
    }

    public function getView(){
        return $this->_view;
    }

    public function getLayout(){
        return $this->_layout;
    }

    public function getPath(){
        preg_match('/^([^\?]+)/', $_SERVER['REQUEST_URI'], $match);
        return $match[1];
    }

    public function setController(Controller $controller){
        $this->_controller = $controller;
        return $this;
    }

    public function getController(){
        return $this->_controller;
    }

    public function getAction(){
        return $this->_action;
    }

    public function setAction($action){
        $this->_action = $action;
        return $this;
    }

    public function setParameters($params){
        foreach($params as $k=>$v){
            $_REQUEST[$k] = $v;
        }
    }

}