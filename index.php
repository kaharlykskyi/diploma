<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    define('ROOT', dirname(__FILE__));
    session_start();

    include_once(ROOT.'/components/Router.php');
    require_once(ROOT.'/components/Autoload.php');

    $router = new Router();
    $router->run();
