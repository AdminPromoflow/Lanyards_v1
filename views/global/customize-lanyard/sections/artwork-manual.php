<?php
$artworkManualCssPath = '../../views/assets/css/global/customize-lanyard/sections/artwork-manual.css';
$artworkManualJsPath = '../../views/assets/js/customize-lanyard/sections/artwork-manual.js';

$artworkManualCssVersion = filemtime($artworkManualCssPath);
$artworkManualJsVersion = filemtime($artworkManualJsPath);
?>

<link rel="stylesheet" href="<?= $artworkManualCssPath ?>?v=<?= $artworkManualCssVersion ?>">

<section class="artwork-manual section" id="artworkManual">
  <h2 class="name-section-customize-lanyard">Artwork - Manual</h2>
  <br>
  <p>Select the type of printed on the lanyard</p>
  <br>
  <div id="containers_boxes_artwork-manual" class="containers_boxes_artwork-manual">
    <div class="container_boxes_artwork-manual">
      <h4>Manual</h4>
    </div>
    <div class="container_boxes_artwork-manual">
      <h4>Artwork</h4>
    </div>
  </div>
</section>

<script src="<?= $artworkManualJsPath ?>?v=<?= $artworkManualJsVersion ?>"></script>
