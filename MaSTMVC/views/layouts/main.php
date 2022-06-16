<?php

use app\core\Application;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/MaSTMVC/index.php/">Home</a>
                </li>
                <li class="nav-ite m">
                    <a class="nav-link" href="/MaSTMVC/index.php/contact">Contact</a>
                </li>
            </ul>
            <?php if (Application::isGuest()): ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/MaSTMVC/index.php/login">Login</a>
                    </li>
                    <li class="nav-ite m">
                        <a class="nav-link" href="/MaSTMVC/index.php/register">Register</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/MaSTMVC/index.php/profile">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/MaSTMVC/index.php/logout">
                            Welcome <?php echo Application::$app->user->getDisplayName() ?> (Logout)
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

        </div>
    </div>
</nav>
<div class="container">
    <?php

    if (Application::$app->session->getFlash('succes')): ?>
        <div class="alert alert-succes">
            <?php echo(Application::$app->session->getFlash('succes')) ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>