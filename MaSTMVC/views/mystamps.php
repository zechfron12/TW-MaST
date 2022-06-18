<?php
/** @var $this View */

use app\core\View;

require_once ("core/Stamp.php");

$this->title = 'My stamps';

?>
        <img
            src="../../views/assets/plus-sign.svg"
            alt="add-sign"
            class="plus-sign trigger"
        />

<?php echo $stamps?>


<!--
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>
<div class="stamp-card card1" style="margin: 15px">
    <div class="stamp-card-image">
        <img src="../../views/assets/stamp_image1.jpg" alt="" />
    </div>
    <div class="stamp-card-title">
        1861 -1863 Hermes Head - Final Athens Print - No. 12-16:
        7 mm Control Number on Back
    </div>
    <div class="stamp-card-price">0.40$</div>
    <div class="stamp-card-country">Romania</div>
</div>

-->

<!-- MODAL CONTENT -->

<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Post a stamp</h1>
        <form>
            <div class="input-container">
                <input type="text" required />
                <label>Title</label>
            </div>
            <div class="input-container">
                <input type="text" required />
                <label>Date of Issue</label>
            </div>
            <div class="input-container">
                <input type="text" required />
                <label>Denomination</label>
            </div>
            <div class="input-container">
                <input type="text" required />
                <label>Perforations</label>
            </div>
            <div class="input-container">
                <input type="text" required />
                <label>Height</label>
            </div>
            <div class="input-container">
                <input type="text" required />
                <label>Width</label>
            </div>
            <div class="input-container">
                <input type="text" />
                <label>Design</label>
            </div>
            <div class="input-container">
                <input type="text" />
                <label>Theme</label>
            </div>
            <div class="input-container">
                <input type="file" />
                <label>Upload Cover</label>
            </div>
            <button type="button" class="btn">submit</button>
        </form>
    </div>
</div>
