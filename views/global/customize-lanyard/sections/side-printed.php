<?php
function asset_version_sidePrinted($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_sidePrinted = "../../views/assets/css/global/customize-lanyard/sections/side-printed.css";
$jsFile_sidePrinted = "../../views/assets/js/customize-lanyard/sections/side-printed.js";
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_sidePrinted ?>?v=<?= asset_version_sidePrinted($cssFile_sidePrinted) ?>">
<section class="side_printed  section ">
  <h2 class="name-section-customize-lanyard">Side printed</h2>
  <br>
  <p>Select one side or two sides printed</p>
  <br>
  <div id="containers_boxes_side_printed" class="containers_boxes_side_printed">

  </div>
</section>


<!-- JavaScript -->
<script src="<?= $jsFile_sidePrinted ?>?v=<?= asset_version_sidePrinted($jsFile_sidePrinted) ?>" type="text/javascript"></script>
