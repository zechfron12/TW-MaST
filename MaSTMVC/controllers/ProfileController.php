<?php

namespace app\controllers;

require_once("core/Controller.php");
require_once("core/Request.php");
require_once("core/Response.php");
require_once("core/middlewares/AuthMiddleware.php");
require_once("models/User.php");
require_once("models/LoginForm.php");
require_once("models/StampsModel.php");
require_once("models/CataloguesModel.php");
require_once("models/PostStampModel.php");
require_once("models/PostCatalogueModel.php");
require_once("models/StatisticsInterrogator.php");

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CataloguesModel;
use app\models\LoginForm;
use app\models\PostCatalogueModel;
use app\models\PostStampModel;
use app\models\StampsModel;
use app\models\StatisticsInterrogator;
use app\models\User;

class ProfileController extends Controller
{
    public function __construct()
    {

    }

    public function profile(Request $request, Response $response)
    {

        $myStatisticInterrogator = new StatisticsInterrogator();

        $params = [
            'stampsPostedThisWeekData' => $myStatisticInterrogator->getLastStampsPosted(),
            'stampsLikedThisMonth' => $myStatisticInterrogator->getLikedStamps(),
        ];
        $this->setLayout('main');
        return $this->render('profile', $params);
    }

    public function mystamps(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postStampModel = new PostStampModel();
            $postStampModel->loadData($request->getBody());
            $postStampModel->postStampData();
            Application::$app->session->setFlash('succes', 'Stamp Added');
        }


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

    public function mycatalogues(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postCatalogueModel = new PostCatalogueModel();
            $postCatalogueModel->loadData($request->getBody());
            $postCatalogueModel->postCatalogueData();
            Application::$app->session->setFlash('succes', 'Catalogue created');
        }


        $myCatalogueModel = new CataloguesModel();
        $myCatalogues = $myCatalogueModel->getUserCatalogues();
        $params = [
            'catalogues' => $myCatalogues
        ];
        $this->setLayout('profile');
        return $this->render('mycatalogues', $params);
    }
}