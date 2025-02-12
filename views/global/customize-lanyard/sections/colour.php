<?php
function asset_version_colour($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_colour = "../../views/assets/css/global/customize-lanyard/sections/colour.css";
$jsFile_colour = "../../views/assets/js/customize-lanyard/sections/colour.js";
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_colour ?>?v=<?= asset_version_colour($cssFile_colour) ?>">

<section class="colour section ">
  <h2 class="name-section-customize-lanyard">Colour Quantity</h2>
  <br>
  <p>Select the number of colours you want printed on your lanyard:</p>
  <br>
  <div id="containers_boxes_colour" class="containers_boxes_colour">

  </div>
</section>
<!-- JavaScript -->
<script src="<?= $jsFile_colour ?>?v=<?= asset_version_colour($jsFile_colour) ?>" type="text/javascript"></script>
