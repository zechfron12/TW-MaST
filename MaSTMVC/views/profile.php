<?php

/** @var $this \app\core\View */

$this->title = 'Profile';
?>


<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="../views/css/main.css" />
    <link rel="stylesheet" href="../views/css/profile.css" />

    <title>Stamp Worldn't</title>
</head>
<body>
<div id="profile-wrapper">
    <div id="profile-info">
        <img
                src="../views/assets/blank-profile-picture.png"
                alt="Profile picture"
        />
        <h1>Mihai Ciobotaru</h1>
        <div class="profile-description-table">
            <table>
                <tbody>
                <tr>
                    <th>User Name :</th>
                    <td>xXmihaiul_thauXx</td>
                </tr>
                <tr>
                    <th>Member since :</th>
                    <td>April 6, 2022</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="profile-content">
        <div class="buttons-container">
            <a class="profile-content-button">
            Statistics</a
            >
            <a href="/MaSTMVC/index.php/profile/mystamps" class="profile-content-button"
            >My Stamps</a
            >
            <a href="/MaSTMVC/index.php/profile/mycatalogues" class="profile-content-button">
                My Catalogues
            </a>
        </div>
        <img src="../views/assets/stat-example.png" alt="statistic"/>
        <img src="../views/assets/stat-example.png" alt="statistic"/>
        <img src="../views/assets/stat-example.png" alt="statistic"/>
    </div>
</div>
</body>
</html>

