<?php

namespace mvc\Middleware;


use mvc\Request;
use mvc\Response;

interface MiddlewareBase
{
    public function run(Request $request, Response $response);
}