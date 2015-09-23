<?php
namespace mvc\Middleware;

use mvc\App;
use mvc\Request;
use mvc\Response;

class GetRoute implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){

        $routes = App::instance()->getConfig('routes');
        $router = App::instance()->getService('router');
        $router->setRoutes($routes);
        $controller = $router->getController($request);
        $actionData = $router->getAction($request);

        $request->setController($controller);
        $request->setAction($actionData['name']);
        $request->setParameters($actionData['params']);
        return true;
    }
}