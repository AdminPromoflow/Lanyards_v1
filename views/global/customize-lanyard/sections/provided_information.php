<?php
$cssFile = '../../views/assets/css/global/customize-lanyard/sections/provided_information.css';
$jsFile = '../../views/assets/js/customize-lanyard/sections/provided_information.js';

$cssVersion = file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = file_exists($jsFile) ? filemtime($jsFile) : time();
?>
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections/provided_information.css?v=<?= $cssVersion ?>">


<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
<section class="provided_information section" id="artworkManual">
  <h2 class="name-section-customize-lanyard">Provided information</h2>
  <br>
  <p>Please add or update the information you have provided.</p>
  <br>
  <div id="containers_boxes_provided_information" class="containers_boxes_provided_information">


      </div>
      <br><br><br>

  </div>
</section>
<script src="../../views/assets/js/customize-lanyard/sections/provided_information.js?v=<?= $jsVersion ?>"></script>
