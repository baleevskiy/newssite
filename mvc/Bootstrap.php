<?php

class Bootstrap {
    public static function loadClass($classname){
        //make all the proper checks and try to include the file
        $filename = __DIR__."/../".str_replace('\\','/',$classname).'.php';
        include($filename);
    }
}