<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="stylesheet" href="../../views/css/main.css"/>
    <link rel="stylesheet" href="../../views/css/catalogue.css"/>
    <link rel="stylesheet" href="../../views/css/stamps.css"/>
    <link rel="stylesheet" href="../../views/css/profile.css"/>
    <link rel="stylesheet" href="../../views/css/modal.css"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <script src="../../views/js/modal.js" defer></script>

    <title><?php echo $this->title ?></title>

</head>
<body>
<nav>
    <div class="logo">Stamp Worldn't</div>
    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
        <ul>
            <li><a class="active" href="/MaSTMVC/index.php/">Home</a></li>
            <li><a href="/MaSTMVC/index.php/profile">Profile</a></li>
            <li><a href="/MaSTMVC/index.php/catalogue">Catalogue</a></li>
            <li><a href="/MaSTMVC/index.php/logout">Log out</a></li>
        </ul>
</nav>

<div id="profile-wrapper">
    <div id="profile-info">
        <img
                src="../../views/assets/blank-profile-picture.png"
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
            <a class="profile-content-button"
                <?php if ($this->title === 'Profile') : ?>
               style="color: #5ba7e8"
               <?php endif; ?>
               href="/MaSTMVC/index.php/profile"
            >Statistics</a
            >
            <a href="/MaSTMVC/index.php/profile/mystamps" class="profile-content-button"
                <?php if ($this->title === 'My stamps') : ?>
                    style="color: #5ba7e8"
                <?php endif; ?>
            >My Stamps</a
            >
            <a href="/MaSTMVC/index.php/profile/mycatalogues" class="profile-content-button"
                <?php if ($this->title === 'My Catalogues') : ?>
                    style="color: #5ba7e8"
                <?php endif; ?>
            >
                My Catalogues
            </a>
        </div>

        {{content}}

    </div>
</div>

<footer>
    <div>Stamp Worldn't</div>
    <div>Made by Ciobotaru Mihai, Grigorita Vlad, Radu Chelaru</div>
</footer>

<script src="../js/profile-bar-btns"></script>
</body>
</html>

