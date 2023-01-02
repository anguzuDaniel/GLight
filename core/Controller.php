<?php

namespace app\core;

class Controller
{
    /**
     * routeParams
     *
     * @var array
     */
    protected array $routeParams = [];

    /**
     * __construct
     *
     * @param  mixed $routeParams
     * @return void
     */
    public function __construct(mixed $routeParams)
    {
        $this->routeParams = $routeParams;
    }
}
