<?php

namespace mvc;


class Response
{
    protected $_body = "";
    protected $_content = "";
    protected $_headers = [];

    public function setBody($body=""){
        $this->_body = $body;
    }
    public function getBody(){
        return $this->_body;
    }

    public function addHeader($header){
        $this->_headers[] = $header;
    }

    public function getHeaders(){
        return $this->_headers;
    }

    public function setStatusCode($code){
        return http_response_code($code);
    }

    public function setContent($content){
        $this->_content = $content;
        return $this;
    }
    public function getContent(){
        return $this->_content;
    }
}