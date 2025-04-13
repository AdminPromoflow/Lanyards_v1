<?php
// Function to get the last modified time (timestamp) of a file
function getPreviewTemplateFilemtime($filePath) {
    return filemtime($filePath); // Returns the file's last modification time
}

// File paths for CSS and JS used in the lanyard preview
$cssFilePath = '../../views/assets/css/global/customize-lanyard/sections2/preview-template.css';
$cssFilePathArtwork = '../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css';
$cssFilePathManual = '../../views/assets/css/global/customize-lanyard/sections2/preview-template-manual.css';
$jsFilePath = '../../views/assets/js/customize-lanyard/sections2/preview-template.js';

// Get the last modified times for each file
$cssFilemtime = getPreviewTemplateFilemtime($cssFilePath);
$cssFilemtimeArtwork = getPreviewTemplateFilemtime($cssFilePathArtwork);
$cssFilemtimeManual = getPreviewTemplateFilemtime($cssFilePathManual);
$jsFilemtime = getPreviewTemplateFilemtime($jsFilePath);
?>

<!-- Include CSS files with versioning based on file modification time (prevents browser caching issues) -->
<link rel="stylesheet" href="<?php echo $cssFilePath; ?>?v=<?php echo $cssFilemtime; ?>">
<link rel="stylesheet" href="<?php echo $cssFilePathArtwork; ?>?v=<?php echo $cssFilemtimeArtwork; ?>">
<link rel="stylesheet" href="<?php echo $cssFilePathManual; ?>?v=<?php echo $cssFilemtimeManual; ?>">

<!-- Section that holds all the lanyard preview templates -->
<section id="preview-template-class" class="preview-template-class">

  <div class="container-preview-template">

    <!-- Standard lanyard preview layout -->
    <div class="super-lanyard">
      <!-- Left part of the standard lanyard (for one-end, 10mm type) -->
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm">
        <!-- Rendered preview for the left segment -->
      </div>
      <!-- Right part of the standard lanyard (for one-end, 10mm type) -->
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm">
        <!-- Rendered preview for the right segment -->
      </div>
      <!-- Center part of the standard lanyard (typically the neck area) -->
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm">
        <!-- Rendered preview for the center segment -->
      </div>
    </div>

    <!-- Manual mode lanyard preview layout (used when user adjusts elements manually) -->
    <div class="super-lanyard-manual">
      <!-- Left part of the manual-mode lanyard -->
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm-manual">
        <!-- Rendered manual preview for the left segment -->
      </div>
      <!-- Right part of the manual-mode lanyard -->
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm-manual">
        <!-- Rendered manual preview for the right segment -->
      </div>
      <!-- Center part of the manual-mode lanyard -->
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm-manual">
        <!-- Rendered manual preview for the center segment -->
      </div>
    </div>

    <!-- Artwork mode lanyard preview layout (used when uploading custom artwork) -->
    <div class="super-lanyard-arwork">
      <!-- Left part of the artwork-mode lanyard -->
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm-arwork">
        <!-- Rendered artwork preview for the left segment -->
      </div>
      <!-- Right part of the artwork-mode lanyard -->
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm-arwork">
        <!-- Rendered artwork preview for the right segment -->
      </div>
      <!-- Center part of the artwork-mode lanyard -->
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm-arwork">
        <!-- Rendered artwork preview for the center segment -->
      </div>
    </div>

  </div>

</section>

<!-- Include JavaScript file with versioning based on file modification time (prevents browser caching issues) -->
<script src="<?php echo $jsFilePath; ?>?v=<?php echo $jsFilemtime; ?>" type="text/javascript"></script>
