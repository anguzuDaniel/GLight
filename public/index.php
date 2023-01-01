<?php

/**
 * Front controller
 * 
 * PHP version 8.0.13
 * 
 */


/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require_once $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$app = new \Core\Application();

$router = new \Core\Router();

$app->run('/', function () {
    echo "Hello World";
});
