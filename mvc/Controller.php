<?php
namespace mvc;

use mvc\Exceptions\NotFoundException;

abstract class Controller{
    public function runAction($action, array $withParams){
        $action = "action".ucfirst($action);
        try{
            return call_user_func_array([$this, $action], $withParams);
        }
        catch (NotFoundException $ex){
            //set headers 404 and return
            return [];
        }
        catch(\Exception $ex){
            //TODO: make admin logs and return
            return [];
        }

    }
}