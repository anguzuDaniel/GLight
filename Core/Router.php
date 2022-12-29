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
        // $regExpection = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $params = [];

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
            }

            $this->params = $params;
            return true;
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
    public function add($route, $params = [])
    {
        // convert the route to a regular expression: escapeforaed slashes
        $route = preg_replace('/\//', '\\/', $route);

        // convert variables e.g {controller}
        $route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // convert variables e.g id:\id
        $route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // adding start and end delimiters and case insensitive flag
        $route = '/^' . $route . '$/i';

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
