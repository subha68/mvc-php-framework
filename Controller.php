<?php

namespace app\core;

use app\core\middlewares\Middleware;

/**
* @autor AmaderEPathshala
* @package app\core
*/

class Controller {
    public string $layout = 'main';
    public string $action = '';
    /**
     * @var \app\core\middlewares\middleware[]
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
