<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFileMaterial = realpath(__DIR__ . '/../../views/assets/css/global/customize-lanyard/sections/material.css');
$jsFileMaterial = realpath(__DIR__ . '/../../views/assets/js/customize-lanyard/sections/material.js');

// Rutas y versión de las imágenes
$imageMaterialArrowUp = realpath(__DIR__ . '/../../views/assets/img/global/customize-lanyard/sections/material/arrow_up.png');
$imageMaterialArrowDown = realpath(__DIR__ . '/../../views/assets/img/global/customize-lanyard/sections/material/arrow_down.png');

$cssVersionMaterial = $cssFileMaterial && file_exists($cssFileMaterial) ? filemtime($cssFileMaterial) : time();
$jsVersionMaterial = $jsFileMaterial && file_exists($jsFileMaterial) ? filemtime($jsFileMaterial) : time();

$imageMaterialVersionArrowUp = $imageMaterialArrowUp && file_exists($imageMaterialArrowUp) ? filemtime($imageMaterialArrowUp) : time();
$imageMaterialVersionArrowDown = $imageMaterialArrowDown && file_exists($imageMaterialArrowDown) ? filemtime($imageMaterialArrowDown) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="/views/assets/css/global/customize-lanyard/sections/material.css?v=<?= $cssVersionMaterial; ?>">

<section class="material section active">
  <h2 class="name-section-customize-lanyard">Material</h2>
  <br>
  <p>Select the type of lanyard</p>
  <br>

  <!-- Contenedor con las flechas de desplazamiento -->
  <div id="containers_boxes_material" class="containers_boxes_material">
    <!-- Flechas de desplazamiento -->
    <img src="../../views/assets/img/global/customize-lanyard/sections/material/arrow_up.png?v=<?= $imageMaterialVersionArrowUp; ?>" alt="Up Arrow" class="arrow-material arrow-up-material" />
    <img src="../../views/assets/img/global/customize-lanyard/sections/material/arrow_down.png?v=<?= $imageMaterialVersionArrowDown; ?>" alt="Down Arrow" class="arrow-material arrow-down-material" />
  </div>
</section>

<!-- JavaScript -->
<script src="/views/assets/js/customize-lanyard/sections/material.js?v=<?= $jsVersionMaterial; ?>" type="text/javascript"></script>
