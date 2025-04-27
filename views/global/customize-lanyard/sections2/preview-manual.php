<?php
function get_file_version($relative_path) {
    $absolute_path = __DIR__ . '/' . $relative_path;
    return file_exists($absolute_path) ? filemtime($absolute_path) : time();
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-manual.css?v=<?php echo get_file_version('../../views/assets/css/global/customize-lanyard/sections2/preview-manual.css'); ?>">

<section id="preview-manual-section">
  <!-- Manual lanyard layout -->
  <div class="super-lanyard-manual" id="super-lanyard-manual">
    <div class="" id="left-super-lanyard-manual">
      <div class="text_lanyard_left" id="text_lanyard_left">
        <div class="wrap_img_0">
          <img src="../../views/assets/img/Test/arrow2.png" alt="">
        </div>
      </div>
    </div>
    <div class="" id="right-super-lanyard-manual">
      <div class="text_lanyard_right" id="text_lanyard_right">
        <div class="wrap_img_1">
          <img src="../../views/assets/img/Test/arrow2.png" alt="">
        </div>
        <div class="wrap_img_1">
          <img src="../../views/assets/img/Test/arrow2.png" alt="">
        </div>
      
      </div>
    </div>
    <div class="" id="center-super-lanyard-manual">
    </div>
  </div>
</section>

<script src="../../views/assets/js/customize-lanyard/sections2/preview-manual.js?v=<?php echo get_file_version('../../views/assets/js/customize-lanyard/sections2/preview-manual.js'); ?>" type="text/javascript"></script>
