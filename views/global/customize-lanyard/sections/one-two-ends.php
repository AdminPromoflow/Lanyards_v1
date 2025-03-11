<?php
function asset_version_lanyardType($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_lanyardType = "../../views/assets/css/global/customize-lanyard/sections/one-two-ends.css";
$jsFile_lanyardType = "../../views/assets/js/customize-lanyard/sections/one-two-ends.js";
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_lanyardType ?>?v=<?= asset_version_lanyardType($cssFile_lanyardType) ?>">

<section class="one_two_ends section">
  <h2 class="name-section-customize-lanyard">Lanyard type</h2>
  <br>
  <p>Select the type of lanyard</p>
  <br>
  <div id="containers_boxes_one_two_ends" class="containers_boxes_one_two_ends">
  </div>
</section>

<!-- JavaScript -->
<script src="<?= $jsFile_lanyardType ?>?v=<?= asset_version_lanyardType($jsFile_lanyardType) ?>" type="text/javascript"></script>
