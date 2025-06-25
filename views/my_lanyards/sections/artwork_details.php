<?php

function get_file_version($relative_path) {
    $absolute_path = __DIR__ . '/' . $relative_path;
    return file_exists($absolute_path) ? filemtime($absolute_path) : time();
}


// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/artwork_details.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/artwork_details.js');
$jsFileImage = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/image.js');
$jsFileText = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/text.js');




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
      <img class="" src="../../views/assets/img/my_lanyards/artwork_details/left_10mm-2.png" alt="">
    </div>
    <div id="my_lanyards_right_side" class="my_lanyards_right_side">
      <img class="" src="../../views/assets/img/my_lanyards/artwork_details/left_10mm-2.png" alt="">
    </div>

  </div>

</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/my_lanyards/sections/text.js?v=<?= $jsFileText; ?>" type="text/javascript"></script>
<script src="/views/assets/js/my_lanyards/sections/image.js?v=<?= $jsFileImage; ?>" type="text/javascript"></script>
<script src="/views/assets/js/my_lanyards/sections/artwork_details.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
