<?php

/** @var $this \app\core\View */

use app\core\Application;

$this->title = 'Profile';


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
            <a class="profile-content-button" style="color: blue"
            >Statistics</a
            >
            <a href="/MaSTMVC/index.php/profile/mystamps" class="profile-content-button"
            >My Stamps</a
            >
            <a href="/MaSTMVC/index.php/profile/mycatalogues" class="profile-content-button">
                My Catalogues
            </a>
        </div>
        <script>
            window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Stamps posted this week"
                    },
                    data: [{
                        type: "line",
                        dataPoints: <?php echo json_encode($stampsPostedThisWeekData, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
                //var chart2 = new CanvasJS.Chart("chartContainer2", {
                //    title: {
                //        text: "Liked stamps in last Month"
                //    },
                //    data: [{
                //        type: "line",
                //        dataPoints: <?php //echo json_encode($stampsLikedThisMonth, JSON_NUMERIC_CHECK); ?>
                //    }]
                //});
                //chart2.render();

            }
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <div id="chartContainer" style="height: 370px; width: 70%; display:block;"></div>
        <div id="chartContainer2" style="height: 370px; width: 70%; display:block;"></div>

    </div>
</div>
</body>
</html>

