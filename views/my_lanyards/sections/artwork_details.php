<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/artwork_details.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/artwork_details.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- Link to external stylesheet for styling the section -->
<link rel="stylesheet" href="/views/assets/css/my_lanyards/sections/artwork_details.css?v=<?= $cssVersion; ?>">

<section id="section_artwork_details" class="section_artwork_details">
  <div id="back_to_my_lanyards" class="back_to_my_lanyards">
    <img src="../../views/assets/img/my_lanyards/artwork_details/arrow.png" alt="">
  </div>
  <div class="title_artwork_details">
    <h3>My products</h3>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBox_artwork_details">

    <div id="my_lanyards_left_side" class="my_lanyards_left_side">
      <div class="my_lanyards_artwork">
        <img class="" src="../../views/assets/img/my_lanyards/artwork_details/left_10mm-2.png" alt="">

      </div>


    </div>
    <div id="my_lanyards_right_side" class="my_lanyards_right_side">
        <img class="my_lanyards_artwork" src="../../views/assets/img/my_lanyards/artwork_details/left_10mm-2.png" alt="">
    </div>

  </div>

</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/my_lanyards/sections/artwork_details.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
