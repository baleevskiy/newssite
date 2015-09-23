<?php

namespace controllers;

use models\News;
use mvc\Controller;
use mvc\Request;
use mvc\Response;

class NewsController extends Controller{
    public function actionIndex(Request $request, Response $response){
        $request->setView('site/list');
        return ['list' => News::lastTwoNews()];
    }

    public function actionDetail(Request $request, Response $response){
        $newsId = $request->getRequestData()['newsId'];
        $request->setView('site/details');
        return News::getByIdOr404($newsId);

    }
}