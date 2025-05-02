<?php
function get_file_version($relative_path) {
    $absolute_path = __DIR__ . '/' . $relative_path;
    return file_exists($absolute_path) ? filemtime($absolute_path) : time();
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-artwork.css?v=<?php echo get_file_version('../../views/assets/css/global/customize-lanyard/sections2/preview-artwork.css'); ?>">

<section id="preview-artwork-section">
  <!-- artwork lanyard layout -->
  <div class="super-lanyard-artwork" id="super-lanyard-artwork">

    <div class="" id="left-super-lanyard-artwork">

    </div>

    <div class="" id="right-super-lanyard-artwork">

    </div>

    <div class="" id="center-super-lanyard-artwork">

    </div>
    
</section>

<script src="../../views/assets/js/customize-lanyard/sections2/preview-artwork.js?v=<?php echo get_file_version('../../views/assets/js/customize-lanyard/sections2/preview-artwork.js'); ?>" type="text/javascript"></script>
