<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/my_lanyards.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/my_lanyards.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- Link to external stylesheet for styling the section -->
<link rel="stylesheet" href="/views/assets/css/my_lanyards/sections/my_lanyards.css?v=<?= $cssVersion; ?>">

<section class="section_my_lanyards">
  <!-- Title section for ABOUT US -->
  <div class="title_my_lanyards">
    <h3>About us</h3>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBox_my_lanyards">

    <!-- Box for first individual (Crafting Unique Lanyards) -->
    <div class="box_my_lanyards">
      <h3>My lanyards</h3>
      <br>
      <div class="box_my_jobs">
        <h4>Hola 1</h4>
      </div>
      <div class="box_my_jobs">
        <h4>Hola 2</h4>
      </div>
    </div>

    <!-- Box for second individual (Elevating Your Brand) -->
    <div class="box_my_lanyards">
      <h3>My lanyards</h3>

    </div>

  </div>

  <!-- Explore More Button -->
  <button type="button" onclick="window.location.href='../../views/home/index.php'">Explore More</button>
</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/my_lanyards/sections/my_lanyards.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
