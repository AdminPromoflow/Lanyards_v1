<?php
function preview_template_artwork_versioned_asset($relative_path) {
    $full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($relative_path, '/');
    $version = file_exists($full_path) ? filemtime($full_path) : time();
    return $relative_path . '?v=' . $version;
}
?>

<link rel="stylesheet" href="<?php echo preview_template_artwork_versioned_asset('../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css'); ?>">

<section id="preview-template-artwork-section">
  <div class="super-lanyard-artwork" id="super-lanyard-artwork">
    <div id="left-super-lanyard-template-artwork"></div>
    <div id="right-super-lanyard-template-artwork"></div>
    <div id="center-super-lanyard-template-artwork"></div>
  </div>
</section>

<script src="<?php echo preview_template_artwork_versioned_asset('../../views/assets/js/customize-lanyard/sections2/preview-template-artwork.js'); ?>" type="text/javascript"></script>
