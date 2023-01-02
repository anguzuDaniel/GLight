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
require_once __DIR__."./../vendor/autoload.php";
use app\core\Application;


$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');
$app->router->post('/contact', function () {
    return "Handling submitted data";
});

$app->run();
