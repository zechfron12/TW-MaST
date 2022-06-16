<?php

namespace app\core;

require_once ("core/middlewares/BaseMiddleware.php");

use app\core\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] =  $middleware;
    }

    public function getMiddlewares(): BaseMiddleware|array
    {
        return $this->middlewares;
    }

}