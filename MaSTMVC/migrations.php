<?php

require_once("core/Application.php");
require_once ("controllers/SiteController.php");
require_once ("controllers/AuthController.php");

use app\core\Application;

$config = [
    'db' => [
        'dsn' =>'mysql:host=localhost;port=3306;dbname=stampworld',
        'user' => 'root',
        'password' => '',
    ]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();
