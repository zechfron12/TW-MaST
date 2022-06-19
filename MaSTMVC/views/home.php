<?php

/** @var $this View */
use app\core\View;

$this->title = 'Home';
?>
<div class="content">
    <div class="horizontal-list">
        <div class="list-header-container">
            <div class="list-buttons">
                <h1 class="list-header">Most popular uploads</h1>
                <label class="b-contain">
                    <input type="checkbox" />
                </label>
            </div>
        </div>

        <div class="slider">
            <?php echo $popularStamps ?>
        </div>
    </div>

    <div class="horizontal-list">
        <div class="list-header-container">
            <div class="list-buttons">
                <h1 class="list-header">New Users</h1>
                <label class="b-contain">
                    <input type="checkbox" />
                </label>
            </div>
        </div>

        <div class="slider">

            <?php echo $newUsers ?>

        </div>
    </div>

    <div class="horizontal-list">
        <div class="list-header-container">
            <div class="list-buttons">
                <h1 class="list-header">Most Active Users</h1>
                <label class="b-contain">
                    <input type="checkbox" />
                </label>
            </div>
        </div>

        <div class="slider">
            <?php echo $activeUsers ?>

        </div>

    </div>
</div>

<!-- MODAL CONTENT -->

<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>1861 -1863 Hermes Head</h1>
        <div class="modal-wrapper">
            <div class="modal-description">
                <img
                        src="../views/assets/stamp_image1.jpg"
                        alt=""
                        class="modal-image"
                />
                <br />
                <strong>Description: </strong>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Dolorem, eum.
                </p>
            </div>
            <div class="modal-details">
                <table>
                    <tbody>
                    <tr>
                        <th>Date of Issue:</th>
                        <td>1861</td>
                    </tr>
                    <tr>
                        <th>Denomination:</th>
                        <td>10 L</td>
                    </tr>
                    <tr>
                        <th>Perforations:</th>
                        <td>Imperforated</td>
                    </tr>
                    <tr>
                        <th>Sheet size:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th># Issued:</th>
                        <td>None</td>
                    </tr>
                    <tr>
                        <th>Design:</th>
                        <td>Albert Barre</td>
                    </tr>
                    <tr>
                        <th>Engraved by:</th>
                        <td>Albert Barre</td>
                    </tr>
                    <tr>
                        <th>Height/Wodth:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Theme:</th>
                        <td>Mythology/Greek</td>
                    </tr>
                    </tbody>
                </table>
                <div style="display:flex;justify-content: space-evenly; flex-wrap: wrap;">
                <div style="display:block"><button class="modal-button">Download</button></div>
                <div style="display:block"><button class="modal-button">Like</button></div>
                <div style="display:block"><button class="modal-button">Add </button></div>
                </div>

            </div>
        </div>
    </div>
</div>
