<?php
  $preview_attachment_css = '../../views/assets/css/global/customize-lanyard/sections2/preview-attachment.css';
  $preview_attachment_js = '../../views/assets/js/customize-lanyard/sections2/preview-attachment.js';
?>

<link rel="stylesheet" href="<?= $preview_attachment_css ?>?<?= filemtime($preview_attachment_css) ?>">

<section id="preview-attachment-class" class="preview-attachment-class">

</section>

<script src="<?= $preview_attachment_js ?>?<?= filemtime($preview_attachment_js) ?>" type="text/javascript"></script>
