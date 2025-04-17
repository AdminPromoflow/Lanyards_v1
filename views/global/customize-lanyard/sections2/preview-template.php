<?php
// Function to get the last modified time (timestamp) of a file
function getPreviewTemplateFilemtime($filePath) {
    return file_exists($filePath) ? filemtime($filePath) : time(); // fallback a time() si no existe
}

// File paths for CSS, JS and images
$cssFilePath = '../../views/assets/css/global/customize-lanyard/sections2/preview-template.css';
$cssFilePathArtwork = '../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css';
$cssFilePathManual = '../../views/assets/css/global/customize-lanyard/sections2/preview-template-manual.css';
$jsFilePath = '../../views/assets/js/customize-lanyard/sections2/preview-template.js';

// File paths for images
$imgLeftPath = '../../views/assets/img/global/customize-lanyard/sections2/preview_template/clip-neck-left.png';
$imgRightPath = '../../views/assets/img/global/customize-lanyard/sections2/preview_template/clip-neck-right.png';

// Get the last modified times
$cssFilemtime = getPreviewTemplateFilemtime($cssFilePath);
$cssFilemtimeArtwork = getPreviewTemplateFilemtime($cssFilePathArtwork);
$cssFilemtimeManual = getPreviewTemplateFilemtime($cssFilePathManual);
$jsFilemtime = getPreviewTemplateFilemtime($jsFilePath);
$imgLeftMtime = getPreviewTemplateFilemtime($imgLeftPath);
$imgRightMtime = getPreviewTemplateFilemtime($imgRightPath);
?>

<!-- Include CSS files -->
<link rel="stylesheet" href="<?php echo $cssFilePath; ?>?v=<?php echo $cssFilemtime; ?>">
<link rel="stylesheet" href="<?php echo $cssFilePathArtwork; ?>?v=<?php echo $cssFilemtimeArtwork; ?>">
<link rel="stylesheet" href="<?php echo $cssFilePathManual; ?>?v=<?php echo $cssFilemtimeManual; ?>">

<!-- Preview Template Section -->
<section id="preview-template-class" class="preview-template-class">
  <div class="container-preview-template">

    <!-- Standard lanyard preview layout -->
    <div class="super-lanyard" id="super-lanyard">
      <div class="top_left_clip top_left_clip-one-end-15mm">
        <img src="<?php echo $imgLeftPath . '?v=' . $imgLeftMtime; ?>" alt="">
      </div>
      <div class="top_right_clip top_right_clip-one-end-15mm">
        <img src="<?php echo $imgRightPath . '?v=' . $imgRightMtime; ?>" alt="">
      </div>

      <div class="left-super-lanyard-one-end-30mm" id="left-super-lanyard"></div>
      <div class="right-super-lanyard-one-end-30mm" id="right-super-lanyard"></div>
      <div class="center-super-lanyard-one-end-30mm" id="center-super-lanyard"></div>
    </div>

    <!-- Manual lanyard layout -->
    <div class="super-lanyard-manual" id="super-lanyard-manual">
      <div class="left-super-lanyard-one-end-30mm-manual" id="left-super-lanyard-manual"></div>
      <div class="right-super-lanyard-one-end-30mm-manual" id="right-super-lanyard-manual"></div>
      <div class="center-super-lanyard-one-end-30mm-manual" id="center-super-lanyard-manual"></div>
    </div>

    <!-- Artwork lanyard layout -->
    <div class="super-lanyard-artwork" id="super-lanyard-artwork">
      <div id="left-super-lanyard-artwork"></div>
      <div id="right-super-lanyard-artwork"></div>
      <div id="center-super-lanyard-artwork"></div>
    </div>

  </div>
</section>

<!-- Include JS file -->
<script src="<?php echo $jsFilePath; ?>?v=<?php echo $jsFilemtime; ?>" type="text/javascript"></script>
