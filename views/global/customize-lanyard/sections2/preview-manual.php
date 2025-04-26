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
      <div class="text-lanyard">
        <div class="wrap_ex">
          <h1>Holacom oesta</h1>
        </div>
      </div>
    </div>
    <div class="" id="right-super-lanyard-manual">
      <div class="text-lanyard">
      </div>
    </div>
    <div class="" id="center-super-lanyard-manual"></div>
  </div>
</section>

<script src="../../views/assets/js/customize-lanyard/sections2/preview-manual.js?v=<?php echo get_file_version('../../views/assets/js/customize-lanyard/sections2/preview-manual.js'); ?>" type="text/javascript"></script>
