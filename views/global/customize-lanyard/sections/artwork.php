<?php
// Ruta de los archivos
$artworkCssPath = "../../views/assets/css/global/customize-lanyard/sections/artwork.css";
$artworkJsPath = "../../views/assets/js/customize-lanyard/sections/artwork.js";

// Función para obtener la fecha de modificación de un archivo
function getArtworkFileTime($artworkFile) {
    return file_exists($artworkFile) ? filemtime($artworkFile) : false;
}

// Obtener timestamps
$artworkCssTime = getArtworkFileTime($artworkCssPath);
$artworkJsTime = getArtworkFileTime($artworkJsPath);
?>

<link rel="stylesheet" href="<?php echo $artworkCssPath . '?v=' . $artworkCssTime; ?>">
<section class=" artworkSection section" id="artworkPHPClass">
  <h2 class="name-section-customize-lanyard">Artwork</h2>
  <br>
  <p>Select one artwork</p>
  <br>

  <div id="containers_boxes_artwork" class="containers_boxes_artwork">

    <div class="container_boxes_artwork artworkFrontSide">
      <p class="click_upload_artwork">Click to add artwork to the front left side.</p>
      <input type="file" class="input_image_artwork" style="display:none;">
      <div class="image_artwork_rigth_section"></div>
<!--      <div class="move_artwork_rigth_section">
        <p>Move artwork</p>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/left.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/right.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/top.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bottom.png" alt="">
        </div>
      </div>
      <div class="rotate_artwork_rigth_section">
        <p>Rotate artwork</p>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-left.png" alt="">
        </div>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-rigth.png" alt="">
        </div>
      </div>
      <div class="scale_artwork_rigth_section">
        <p>Scale artwork</p>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bigger.png" alt="">
        </div>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/smaller.png" alt="">
        </div>
      </div>   -->
      </div>

    <div class="container_boxes_artwork artworkFrontSide">
      <p class="click_upload_artwork"> Click to add artwork to the front right side.</p>
      <input type="file" class="input_image_artwork" style="display:none;">
      <div class="image_artwork_rigth_section"></div>
<!--      <div class="move_artwork_rigth_section">
        <p>Move artwork</p>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/left.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/right.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/top.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bottom.png" alt="">
        </div>
      </div>
      <div class="rotate_artwork_rigth_section">
        <p>Rotate artwork</p>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-left.png" alt="">
        </div>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-rigth.png" alt="">
        </div>
      </div>
      <div class="scale_artwork_rigth_section">
        <p>Scale artwork</p>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bigger.png" alt="">
        </div>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/smaller.png" alt="">
        </div>
      </div>   -->
      </div>

    <div class="container_boxes_artwork artworkBackSide">
      <p class="click_upload_artwork">Click to add artwork to the back left side.</p>
      <input type="file" class="input_image_artwork" style="display:none;">
      <div class="image_artwork_rigth_section"></div>
<!--      <div class="move_artwork_rigth_section">
        <p>Move artwork</p>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/left.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/right.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/top.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bottom.png" alt="">
        </div>
      </div>
      <div class="rotate_artwork_rigth_section">
        <p>Rotate artwork</p>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-left.png" alt="">
        </div>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-rigth.png" alt="">
        </div>
      </div>
      <div class="scale_artwork_rigth_section">
        <p>Scale artwork</p>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bigger.png" alt="">
        </div>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/smaller.png" alt="">
        </div>
      </div>-->
      </div>

    <div class="container_boxes_artwork artworkBackSide">
      <p class="click_upload_artwork">Click to add artwork to the back right side.</p>
      <input type="file" class="input_image_artwork" style="display:none;">
      <div class="image_artwork_rigth_section"></div>
<!--      <div class="move_artwork_rigth_section">
        <p>Move artwork</p>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/left.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/right.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/top.png" alt="">
        </div>
        <div class="move_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bottom.png" alt="">
        </div>
      </div>
      <div class="rotate_artwork_rigth_section">
        <p>Rotate artwork</p>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-left.png" alt="">
        </div>
        <div class="rotate_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/rotation-rigth.png" alt="">
        </div>
      </div>
      <div class="scale_artwork_rigth_section">
        <p>Scale artwork</p>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/bigger.png" alt="">
        </div>
        <div class="scale_artwork_rigth_section_icons">
          <img src="../../views/assets/img/global/customize-lanyard/sections/artwork/smaller.png" alt="">
        </div>
      </div>
    </div>    -->

  </div>

</section>
<script src="<?php echo $artworkJsPath . '?v=' . $artworkJsTime; ?>" type="text/javascript"></script>
