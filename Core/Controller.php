<?php

namespace Core;

class Controller
{
    protected $routeParams = [];

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }

    
}
