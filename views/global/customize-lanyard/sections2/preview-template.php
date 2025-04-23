<?php
// Function to get the last modified time (timestamp) of a file
function getPreviewTemplateFilemtime($filePath) {
    return file_exists($filePath) ? filemtime($filePath) : time(); // fallback a time() si no existe
}

// File paths for CSS, JS and images
$cssFilePath = '../../views/assets/css/global/customize-lanyard/sections2/preview-template.css';
$cssFilePathArtwork = '../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css';
$jsFilePath = '../../views/assets/js/customize-lanyard/sections2/preview-template.js';

// File paths for images
$imgLeftPath = '../../views/assets/img/global/customize-lanyard/sections2/preview_template/clip-neck-left.png';
$imgRightPath = '../../views/assets/img/global/customize-lanyard/sections2/preview_template/clip-neck-right.png';

// Get the last modified times
$cssFilemtime = getPreviewTemplateFilemtime($cssFilePath);
$cssFilemtimeArtwork = getPreviewTemplateFilemtime($cssFilePathArtwork);
$jsFilemtime = getPreviewTemplateFilemtime($jsFilePath);
$imgLeftMtime = getPreviewTemplateFilemtime($imgLeftPath);
$imgRightMtime = getPreviewTemplateFilemtime($imgRightPath);
?>

<!-- Include CSS files -->
<link rel="stylesheet" href="<?php echo $cssFilePath; ?>?v=<?php echo $cssFilemtime; ?>">
<link rel="stylesheet" href="<?php echo $cssFilePathArtwork; ?>?v=<?php echo $cssFilemtimeArtwork; ?>">

<!-- Preview Template Section -->
<section id="preview-template-class" class="preview-template-class">
  <div class="container-preview-template">

    <!-- Standard lanyard preview layout -->
    <div class="super-lanyard" id="super-lanyard">
      <div class="top_left_clip top_left_clip-one-end-30mm" id="top_left_clip">
        <img src="<?php echo $imgLeftPath . '?v=' . $imgLeftMtime; ?>" alt="">
      </div>
      <div class="top_right_clip top_right_clip-one-end-30mm" id="top_right_clip">
        <img src="<?php echo $imgRightPath . '?v=' . $imgRightMtime; ?>" alt="">
      </div>

      <div class="background-colour" id="left-super-lanyard"></div>
      <div class="background-colour" id="right-super-lanyard"></div>
      <div class="background-colour" id="center-super-lanyard"></div>
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
