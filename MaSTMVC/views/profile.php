<?php

/** @var $this \app\core\View */

$this->title = 'Profile';
?>
<div id="profile-wrapper">
    <div id="profile-info">
        <img
                src="../assets/blank-profile-picture.png"
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
            <a href="/MaSTMVC/index.php/mystamps" class="profile-content-button"
            >My Stamps</a
            >
            <a href="/MaSTMVC/index.php/mycatalogues" class="profile-content-button">
                My Catalogues
            </a>
        </div>
        <img src="../assets/stat-example.png" alt="statistic" />
        <img src="../assets/stat-example.png" alt="statistic" />
        <img src="../assets/stat-example.png" alt="statistic" />
    </div>
</div>
