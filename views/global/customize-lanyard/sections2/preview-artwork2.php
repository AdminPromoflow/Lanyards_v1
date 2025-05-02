<?php
function get_file_version($relative_path) {
    $absolute_path = __DIR__ . '/' . $relative_path;
    return file_exists($absolute_path) ? filemtime($absolute_path) : time();
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-artwork2.css?v=<?php echo get_file_version('../../views/assets/css/global/customize-lanyard/sections2/preview-artwork2.css'); ?>">

<section id="preview-artwork2-section">
  <!-- Artwork2 lanyard layout -->
  <!-- Artwork lanyard layout -->
  <div class="super-lanyard-artwork" id="super-lanyard-artwork">
    <div id="left-super-lanyard-artwork2"></div>
    <div id="right-super-lanyard-artwork2"></div>
    <div id="center-super-lanyard-artwork2"></div>
  </div>
</section>

<!--<script src="../../views/assets/js/customize-lanyard/sections2/preview-artwork2.js?v=<?php //echo get_file_version('../../views/assets/js/customize-lanyard/sections2/preview-artwork2.js'); ?>" type="text/javascript"></script>-->
