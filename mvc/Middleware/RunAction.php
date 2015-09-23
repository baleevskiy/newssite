<?php
namespace mvc\Middleware;

use mvc\Request;
use mvc\Response;

class RunAction implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){
        $controller = $request->getController();
        $action = $request->getAction();
        $controllerContent = $controller->runAction($action, [$request, $response]);
        $request->data['controllerContent'] = $controllerContent;
        return true;
    }
}