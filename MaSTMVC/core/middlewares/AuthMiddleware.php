<?php

namespace app\core\middlewares;

require_once ("core/Application.php");
require_once ("core/exception/ForbiddenException.php");

use app\core\Application;
use app\core\exception\ForbiddenException;

class AuthMiddleware extends  BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }


    public function execute()
    {
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }
}