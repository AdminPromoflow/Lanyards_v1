<?php
function asset_version_accessories($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_accessories = "../../views/assets/css/global/customize-lanyard/sections/accessories.css";
$jsFile_accessories = "../../views/assets/js/customize-lanyard/sections/accessories.js";
$imgFile_accessories_none = "../../views/assets/img/global/customize-lanyard/sections/accessories/none.png";
$imgFile_accessories_arrow = "../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png";
$imgFile_accessories_6 = "../../views/assets/img/global/customize-lanyard/sections/accessories/6.png";
$imgFile_accessories_2 = "../../views/assets/img/global/customize-lanyard/sections/accessories/2.png";
$imgFile_accessories_1 = "../../views/assets/img/global/customize-lanyard/sections/accessories/1.png";
$imgFile_accessories_7 = "../../views/assets/img/global/customize-lanyard/sections/accessories/7.png";
$imgFile_accessories_12 = "../../views/assets/img/global/customize-lanyard/sections/accessories/12.png";
$imgFile_accessories_9 = "../../views/assets/img/global/customize-lanyard/sections/accessories/9.png";
$imgFile_accessories_11 = "../../views/assets/img/global/customize-lanyard/sections/accessories/11.png";
?>

<link rel="stylesheet" href="<?= $cssFile_accessories ?>?v=<?= asset_version_accessories($cssFile_accessories) ?>">

<section class="accessoriesSection section">
  <h2 class="name-section-customize-lanyard">Accessories 2</h2>
  <br>
  <p>Select one accessories</p>
  <br>

  <div id="containers_boxes_accessories" class="containers_boxes_accessories">
    <div class="container_boxes_accessories">
      <h3 class="dataAccessories">None</h3>
      <img class="imgaccessories" src="<?= $imgFile_accessories_none ?>?v=<?= asset_version_accessories($imgFile_accessories_none) ?>" alt="">
      <div class="arrow_accessories">
        <img class="hideArrowAccessories" src="<?= $imgFile_accessories_arrow ?>?v=<?= asset_version_accessories($imgFile_accessories_arrow) ?>" alt="">
      </div>
    </div>

    <div class="container_boxes_accessories">
      <h3 class="dataAccessories">Rigid Card Holder</h3>
      <div class="arrow_accessories">
        <img src="<?= $imgFile_accessories_arrow ?>?v=<?= asset_version_accessories($imgFile_accessories_arrow) ?>" alt="">
      </div>
    </div>

    <div class="subcontainers_boxes_accessories">
      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Clear Plastic (closed face)</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_6 ?>?v=<?= asset_version_accessories($imgFile_accessories_6) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.3 per unit</h4>
      </div>
      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Coloured Plastic (closed face)</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_2 ?>?v=<?= asset_version_accessories($imgFile_accessories_2) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.3 per unit</h4>
      </div>
      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Coloured Plastic (open face)</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_1 ?>?v=<?= asset_version_accessories($imgFile_accessories_1) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.25 per unit</h4>
      </div>
    </div>

    <div class="container_boxes_accessories">
      <h3 class="dataAccessories">Plastic Wallet</h3>
      <div class="arrow_accessories">
        <img src="<?= $imgFile_accessories_arrow ?>?v=<?= asset_version_accessories($imgFile_accessories_arrow) ?>" alt="">
      </div>
    </div>

    <div class="subcontainers_boxes_accessories">
      <div class="subcontainer_boxes_accessories plastic_wallet_small">
        <h3 class="dataAccessories">86 x 56mm</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_7 ?>?v=<?= asset_version_accessories($imgFile_accessories_7) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.12 per unit</h4>
      </div>
    </div>

    <div class="container_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel</h3>
      <div class="arrow_accessories">
        <img src="<?= $imgFile_accessories_arrow ?>?v=<?= asset_version_accessories($imgFile_accessories_arrow) ?>" alt="">
      </div>
    </div>

    <div class="subcontainers_boxes_accessories">
      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Plastic</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_12 ?>?v=<?= asset_version_accessories($imgFile_accessories_12) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.5 per unit</h4>
      </div>
    </div>

    <div class="container_boxes_accessories">
      <h3 class="dataAccessories">Other</h3>
      <div class="arrow_accessories">
        <img src="<?= $imgFile_accessories_arrow ?>?v=<?= asset_version_accessories($imgFile_accessories_arrow) ?>" alt="">
      </div>
    </div>

    <div class="subcontainers_boxes_accessories">
      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Cord Lock</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_9 ?>?v=<?= asset_version_accessories($imgFile_accessories_9) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.08 per unit</h4>
      </div>

      <div class="subcontainer_boxes_accessories">
        <h3 class="dataAccessories">Whistle</h3>
        <img class="imgaccessories" src="<?= $imgFile_accessories_11 ?>?v=<?= asset_version_accessories($imgFile_accessories_11) ?>" alt="">
        <h4 class="priceDataAccessories">+£0.1 per unit</h4>
      </div>
    </div>
  </div>
</section>

<script src="<?= $jsFile_accessories ?>?v=<?= asset_version_accessories($jsFile_accessories) ?>" type="text/javascript"></script>
