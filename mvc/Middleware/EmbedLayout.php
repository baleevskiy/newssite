<?php
namespace mvc\Middleware;

use mvc\Request;
use mvc\Response;

class EmbedLayout implements MiddlewareBase{
    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    public function run(Request $request, Response $response){
        ob_start();
        $content = $response->getContent();
        $layout = $request->getLayout();
        include(PATH_ROOT.'/views/layouts/'.$layout.'.php');
        $layoutContent = ob_get_contents();
        ob_end_clean();
        $response->setBody($layoutContent);
        return true;
    }
}