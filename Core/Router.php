<?php

/**
 * Front controller
 * 
 * PHP version 8.0.13
 * 
 */
class Router
{
    /**
     * routes
     *
     * @var array
     */
    protected $routes = [];

    /**
     * params
     *
     * @var array
     */
    protected $params = [];

    /**
     * match
     *
     * @param  mixed $url
     * @return void
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * adds a route to the routin table
     *
     * @param  string $route (the route URL)
     * @param  mixed $params Parameters (Controller, action, e.t.c)
     * @return void
     */
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * getRoutes
     * Get all the routes form the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function getParams()
    {
        return $this->params;
    }
}
