<?php

require_once("core/Application.php");
require_once("controllers/SiteController.php");
require_once("controllers/AuthController.php");
require_once("models/User.php");

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=stampworld',
        'user' => 'root',
        'password' => '',
    ]
];

$app = new Application(__DIR__, $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    //    echo "Before request";
});

$app->router->get('/', [new SiteController(), 'home']);
$app->router->get('/contact', [new SiteController(), 'contact']);
$app->router->post('/contact', [new SiteController(), 'contact']);
$app->router->get('/catalogue', [new SiteController(), 'catalogue']);
$app->router->post('/catalogue', [new SiteController(), 'catalogue']);
$app->router->get('/mystamps', [new SiteController(),'mystamps']);
$app->router->post('/mystamps', [new SiteController(),'mystamps']);
$app->router->get('/mycatalogues', [new SiteController(),'mycatalogues']);
$app->router->post('/mycatalogues', [new SiteController(),'mycatalogues']);


$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);
$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);
$app->router->get('/logout', [new AuthController(), 'logout']);
$app->router->get('/profile', [new AuthController(), 'profile']);



$app->run();
