<?php
namespace mvc\Middleware;

use mvc\Request;
use mvc\Response;

class CompileTemplate implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){
        $view = $request->getView();
        ob_start();

        extract($request->data['controllerContent']);

        include(PATH_ROOT.'/views/'.$view.'.php');
        $viewContent = ob_get_contents();
        ob_end_clean();

        $response->setContent($viewContent);
        return true;
    }
}