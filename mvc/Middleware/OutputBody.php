<?php
namespace mvc\Middleware;

use mvc\Request;
use mvc\Response;

class OutputBody implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){
        echo $response->getBody();
        return true;
    }
}