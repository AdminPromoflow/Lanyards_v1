<?php
  $preview_attachment_css = '../../views/assets/css/global/customize-lanyard/sections2/preview-attachment.css';
  $preview_attachment_js = '../../views/assets/js/customize-lanyard/sections2/preview-attachment.js';
?>

<link rel="stylesheet" href="<?= $preview_attachment_css ?>?<?= filemtime($preview_attachment_css) ?>">

<section id="preview-attachment-class" class="preview-attachment-class">
  <div class="container-attachment-one-end" id="container-attachment-one-end">
    <div id="attachment-one-end" class="attachment-one-end-15mm">
      <img src="../../views/assets/img/global/customize-lanyard/sections2/preview-attachment/quick-release-black.png" alt="">
    </div>
  </div>
  <div class="container-attachment-two-end" id="container-attachment-two-end">
    <div id="attachment-two-end-left" class="">
      <img src="../../views/assets/img/global/customize-lanyard/sections2/preview-attachment/quick-release-black.png" alt="">
    </div>
    <div id="attachment-two-end-right" class="">
      <img src="../../views/assets/img/global/customize-lanyard/sections2/preview-attachment/quick-release-black.png" alt="">
    </div>
  </div>
</section>

<script src="<?= $preview_attachment_js ?>?<?= filemtime($preview_attachment_js) ?>" type="text/javascript"></script>
