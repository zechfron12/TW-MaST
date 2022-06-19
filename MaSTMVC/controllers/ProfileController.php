<?php

namespace app\controllers;

require_once("core/Controller.php");
require_once("core/Request.php");
require_once("core/Response.php");
require_once("models/User.php");
require_once("models/LoginForm.php");
require_once("models/StampsModel.php");
require_once("models/CataloguesModel.php");
require_once("core/middlewares/AuthMiddleware.php");

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CataloguesModel;
use app\models\LoginForm;
use app\models\StampsModel;
use app\models\User;

class ProfileController extends Controller
{
    public function __construct()
    {

    }

    public function profile(Request $request, Response $response)
    {
        $this->setLayout('main');
        return $this->render('profile');
    }

    public function mystamps()
    {
        $mystampModel = new StampsModel();
        $myStamps = $mystampModel->getUserStamps();
        $params = [
            'stamps' => $myStamps
        ];
        $this->setLayout('profile');
        return $this->render('mystamps', $params);
    }
    public function statistics()
    {
        $this->setLayout('profile');
        return $this->render('mystamps');
    }

    public function mycatalogues()
    {
        $myCatalogueModel = new CataloguesModel();
        $myCatalogues = $myCatalogueModel->getUserCatalogues();
        $params = [
            'catalogues' => $myCatalogues
        ];
        $this->setLayout('profile');
        return $this->render('mycatalogues',$params);
    }
}