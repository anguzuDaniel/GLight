<?php

namespace Core;

class Controller
{
    /**
     * routeParams
     *
     * @var array
     */
    protected $routeParams = [];

    /**
     * __construct
     *
     * @param  mixed $routeParams
     * @return void
     */
    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }
}
