<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFileMaterial = realpath(__DIR__ . '/../../views/assets/css/global/customize-lanyard/sections/material.css');
$jsFileMaterial = realpath(__DIR__ . '/../../views/assets/js/customize-lanyard/sections/material.js');

$cssVersionMaterial = $cssFileMaterial && file_exists($cssFileMaterial) ? filemtime($cssFileMaterial) : time();
$jsVersionMaterial = $jsFileMaterial && file_exists($jsFileMaterial) ? filemtime($jsFileMaterial) : time();
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
    <div class="scroll-arrow scroll-arrow-up">&#x2191;</div>
    <div class="scroll-arrow scroll-arrow-down">&#x2193;</div>

  </div>
</section>

<!-- JavaScript -->
<script src="/views/assets/js/customize-lanyard/sections/material.js?v=<?= $jsVersionMaterial; ?>" type="text/javascript"></script>
