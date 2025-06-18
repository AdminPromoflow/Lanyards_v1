<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/artwork_details.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/my_lanyards.css');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- Link to external stylesheet for styling the section -->
<link rel="stylesheet" href="/views/assets/css/my_lanyards/sections/artwork_details.css?v=<?= $cssVersion; ?>">

<section id="section_artwork_details" class="section_artwork_details">
  <!-- Title section for ABOUT US -->
  <div class="title_artwork_details">
    <h3>My products</h3>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBox_artwork_details">

  </div>


</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/css/my_lanyards/sections/my_lanyards.css?v=<?= $jsVersion; ?>" type="text/javascript"></script>
