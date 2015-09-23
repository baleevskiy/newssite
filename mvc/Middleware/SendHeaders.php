<?php
namespace mvc\Middleware;

use mvc\Request;
use mvc\Response;

class SendHeaders implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){
        foreach($response->getHeaders() as $header){
            header($header);
        }
        return true;
    }
}