<?php

namespace aep\phpmvc;

use aep\phpmvc\middlewares\Middleware;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

class Controller {
    public string $layout = 'main';
    public string $action = '';
    /**
     * @var \aep\phpmvc\middlewares\middleware[]
     */
    protected array $middlewares = [];

    public function setLayout(string $layout) {
        $this->layout = $layout;
    }
    
    public function render($view, $params = []) {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(Middleware $middleware) {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares() {
        return $this->middlewares;
    }
}
