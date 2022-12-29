<?php

/**
 * Front controller
 * 
 * PHP version 8.0.13
 * 
 */

// echo 'Requested URL ="' . $_SERVER['QUERY_STRING'] . '"';

require_once "../Core/Router.php";

$router = new Router();


echo get_class($router);


$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\id}/{action}');



$url = $_SERVER['QUERY_STRING'];

echo '<pre>';
// var_dump($router->getParams());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}
