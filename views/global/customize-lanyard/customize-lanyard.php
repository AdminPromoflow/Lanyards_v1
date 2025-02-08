<?php
function asset_version_customize_lanyard($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_customize_lanyard = "../../views/assets/css/global/customize-lanyard/style.css";
$jsFile_customize_lanyard = "../../views/assets/js/customize-lanyard/app.js";
$imgFile_customize_lanyard = "../../views/assets/img/global/customize-lanyard/close.png";
?>

<section id="customize-lanyard" class="customize-lanyard">
  <link rel="stylesheet" href="<?= $cssFile_customize_lanyard ?>?v=<?= asset_version_customize_lanyard($cssFile_customize_lanyard) ?>">

  <div class="customize-lanyard-container">
    <div id="preview-customize-lanyard" class="preview-customize-lanyard">
      <h2>Customize lanyard</h2>
      <br>

      <?php include "../../views/global/customize-lanyard/sections2/preview-price.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-material.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-lanyard-type.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-width.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-side-printed.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-clip.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-attachment.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-acccessories.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-colour.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork-manual.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-background.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-text.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-image.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork-final.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-login.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-provided_information.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-checkout.php" ?>
    </div>

    <div id="options-customize-lanyard" class="options-customize-lanyard">
      <div id="close-customize-lanyard" class="close-customize-lanyard">
        <img src="<?= $imgFile_customize_lanyard ?>?v=<?= asset_version_customize_lanyard($imgFile_customize_lanyard) ?>" alt="">
      </div>
      <?php include "../../views/global/customize-lanyard/sections/price.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/material.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/one-two-ends.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/width.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/side-printed.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/clip.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/attachment.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/accessories.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/colour.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/artwork-manual.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/background.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/text.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/image.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/artwork-final.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/login.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/provided_information.php" ?>
      <?php include "../../views/global/customize-lanyard/sections/checkout.php" ?>

      <div class="container_buttons_next_preview">
        <button id="preview" type="button">Preview</button>
        <button id="next" type="button">Next</button>
      </div>
    </div>
  </div>

  <script src="<?= $jsFile_customize_lanyard ?>?v=<?= asset_version_customize_lanyard($jsFile_customize_lanyard) ?>" type="text/javascript"></script>
</section>
