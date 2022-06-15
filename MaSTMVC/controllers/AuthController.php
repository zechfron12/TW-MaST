<?php

namespace app\controllers;

require_once("core/Controller.php");
require_once("core/Request.php");
require_once("core/Response.php");
require_once("models/User.php");
require_once("models/LoginForm.php");

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect("/" . basename(Application::$ROOT_DIR) . "/index.php/");
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {

            $user->loadData($request->getBody());


            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('succes', 'Thanks for registering');
                Application::$app->response->redirect("/" . basename(Application::$ROOT_DIR) . "/index.php/");
            }

            return $this->render('register', ['model' => $user]);
        }
        $this->setLayout('auth');
        return $this->render("register", ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect("/" . basename(Application::$ROOT_DIR) . "/index.php/");
    }
}