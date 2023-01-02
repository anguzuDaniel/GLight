<?php

namespace app\core;

/**
 * Router
 *
 * PHP version 8.0.13
 * @package app\core
 */
class Router
{
    protected array $routes  = [];
    public Request $request;
    public Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return "Not found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view): string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function layoutContent(): string
    {
        ob_start();
        include_once Application::$ROOT_DIR. "/app/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view): string
    {
        ob_start();
        include_once Application::$ROOT_DIR. "/app/views/$view.php";
        return ob_get_clean();
    }
}
