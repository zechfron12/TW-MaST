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
                <input type="text" required name="name"/>
                <label >Name</label>
            </div>
            <div class="input-container">
                <input type="text" required name="country"/>
                <label >Country</label>
            </div>
            <div class="input-container">
                <input type="text" required name="category"/>
                <label>Category</label>
            </div>
            <div class="input-container">
                <input type="text" required name="color"/>
                <label>Color</label>
            </div>
            <div class="input-container">
                <input type="text" required name="height"/>
                <label>Height</label>
            </div>
            <div class="input-container">
                <input type="text" required name="width"/>
                <label>Width</label>
            </div>
            <div class="input-container">
                <input type="text" required name="price"/>
                <label>Price</label>
            </div>
            <div class="input-container">
                <input type="text" required name="perforations"/>
                <label>Perforations</label>
            </div>
            <div class="input-container">
                <input type="date" required name="issuedDateTime"/>
                <label>Issued DateTime</label>
            </div>
            <div class="input-container">
                <input type="file" accept="image/png,image/jpeg" name="uploadCover"/>
                <label>Upload Cover</label>
            </div>
            <button type="button" class="btn">submit</button>
        </form>
    </div>
</div>
