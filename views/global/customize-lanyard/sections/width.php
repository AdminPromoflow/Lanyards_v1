<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFileWidth = realpath(__DIR__ . '/../../views/assets/css/global/customize-lanyard/sections/width.css');
$jsFileWidth = realpath(__DIR__ . '/../../views/assets/js/customize-lanyard/sections/width.js');

$cssVersionWidth = $cssFileWidth && file_exists($cssFileWidth) ? filemtime($cssFileWidth) : time();
$jsVersionWidth = $jsFileWidth && file_exists($jsFileWidth) ? filemtime($jsFileWidth) : time();
?>

<!-- CSS con filemtime() -->
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections/width.css?v=<?= $cssVersionWidth; ?>">

<section class="width section">
  <h2 class="name-section-customize-lanyard">Width</h2>
  <br>
  <p>Select the width</p>
  <br>
  <div id="containers_boxes_width" class="containers_boxes_width"></div>
</section>

<!-- JavaScript con filemtime() -->
<script src="../../views/assets/js/customize-lanyard/sections/width.js?v=<?= $jsVersionWidth; ?>"></script>
