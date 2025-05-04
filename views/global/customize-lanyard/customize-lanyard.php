<?php
// Function to get the last modified timestamp of the file
function get_customize_lanyard_file_version($filePath) {
    if (file_exists($filePath)) {
        return filemtime($filePath);
    }
    return time(); // If the file doesn't exist, return current timestamp
}

$customize_lanyard_css = "../assets/css/global/customize-lanyard/style.css";
$customize_lanyard_js = "../../views/assets/js/customize-lanyard/app.js";
?>
<?php
  header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
?>

<!-- Link CSS with versioning -->
<link rel="stylesheet" href="<?php echo $customize_lanyard_css . '?v=' . get_customize_lanyard_file_version($customize_lanyard_css); ?>">

<section id="customize-lanyard" class="customize-lanyard">
  <?php //include "../../views/global/customize-lanyard/customize-lanyard.php" ?>

  <div class="customize-lanyard-container">

    <div id="preview-customize-lanyard" class="preview-customize-lanyard">
      <h2>Customize lanyard</h2>
      <br>

      <?php include "../../views/global/customize-lanyard/sections2/preview-price.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-material.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-lanyard-type.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-width.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-side-printed.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-clip.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-attachment.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-acccessories.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-colour.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork-manual.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-background.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-text.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-image.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-artwork-final.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-login.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-provided_information.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-checkout.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-template-artwork.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-template.php" ?>
      <?php include "../../views/global/customize-lanyard/sections2/preview-manual.php" ?>
    </div>

    <div id="options-customize-lanyard" class="options-customize-lanyard">
      <div id="close-customize-lanyard" class="close-customize-lanyard">
        <img src="../../views/assets/img/global/customize-lanyard/close.png" alt="">
      </div>

      <?php include "../../views/global/customize-lanyard/sections/price.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/material.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/one-two-ends.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/width.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/side-printed.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/clip.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/attachment.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/accessories.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/colour.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/artwork-manual.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/background.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/text.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/image.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/artwork-final.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/login.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/provided_information.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/checkout.php"; ?>
      <?php include "../../views/global/customize-lanyard/sections/artwork.php" ?>

      <div class="container_buttons_next_preview">
        <button id="preview" type="button">Preview</button>
        <button id="next" type="button">Next</button>
      </div>

    </div>
  </div>
</section>

<!-- Include JS with versioning -->
<script src="<?php echo $customize_lanyard_js . '?v=' . get_customize_lanyard_file_version($customize_lanyard_js); ?>"></script>
