<?php
use \mvc\App;
define('PATH_ROOT', __DIR__.'/../');
define('PATH_CONFIG', PATH_ROOT."/config/");

require __DIR__ . '/../vendor/autoload.php';
require __DIR__.'/../mvc/Bootstrap.php';

spl_autoload_register(['Bootstrap', 'loadClass']);

App::instance()->run();
