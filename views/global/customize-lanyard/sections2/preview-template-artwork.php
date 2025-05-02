<?php
function get_file_version($relative_path) {
    $absolute_path = __DIR__ . '/' . $relative_path;
    return file_exists($absolute_path) ? filemtime($absolute_path) : time();
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css?v=<?php echo get_file_version('../../views/assets/css/global/customize-lanyard/sections2/preview-template-artwork.css'); ?>">

<section id="preview-template-artwork-section">
  <div class="super-lanyard-artwork" id="super-lanyard-artwork">
    <div id="left-super-lanyard-template-artwork"></div>
    <div id="right-super-lanyard-template-artwork"></div>
    <div id="center-super-lanyard-template-artwork"></div>
  </div>

</section>
