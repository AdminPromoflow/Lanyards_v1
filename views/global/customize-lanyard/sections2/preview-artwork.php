<?php
  $css_preview_artwork = '../../views/assets/css/global/customize-lanyard/sections2/preview-artwork.css';
  $js_preview_artwork = '../../views/assets/js/customize-lanyard/sections2/preview-artwork.js';
?>

<link rel="stylesheet" href="<?php echo $css_preview_artwork . '?v=' . filemtime($css_preview_artwork); ?>">

<section class="previewArtwork" id="previewArtwork">
  <div class="container-previewArtwork">

    <div class="box-previewArtwork" >
      <div class="measures-previewArtwork">
        <div class="measures-previewArtwork-long">
          <h4>39mm</h4>
        </div>
        <div class="measures-previewArtwork-width">
          <h4 class="width-preview-artwork">8mm</h4>
        </div>
      </div>
      <h2>Front left</h2>
      <br><br>
      <div class="lanyard-artwork" id="left-artwork-lanyard">
        <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/templates_artwork/test.png" alt="">
      </div>
    </div>

    <div class="box-previewArtwork" >
      <h2>Front right</h2>
      <br><br>
      <div class="measures-previewArtwork-long">
        <h4>39mm</h4>
      </div>
      <div class="measures-previewArtwork-width">
        <h4 class="width-preview-artwork">8mm</h4>
      </div>
      <div class="lanyard-artwork" id="right-artwork-lanyard"></div>
    </div>

  </div>
</section>

<script src="<?php echo $js_preview_artwork . '?v=' . filemtime($js_preview_artwork); ?>" type="text/javascript"></script>
