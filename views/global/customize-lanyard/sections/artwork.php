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
  <p>1. Please download the files, update the artwork, and reupload it in the next step.</p>
  <div class="container_download_files_artwork">
    <a id="download_file_artwork_left" href="../../views/assets/img/global/customize-lanyard/sections/artwork/templates_artwork/left_15mm.png" download>Link left side</a>
    <a id="download_file_artwork_right" href="../../views/assets/img/global/customize-lanyard/sections/artwork/templates_artwork/right_15mm.png" download>Link right side</a>
  </div>
  <br>
  <p>2. Select an option to reupload your file.</p>
  <br>

  <div id="containers_boxes_artwork" class="containers_boxes_artwork">

    <div class="container_boxes_artwork artworkFrontSide">
      <p class="click_upload_artwork">Click to add artwork to the front left side.</p>
      <input id="upload_file_artwork_left" type="file" class="input_image_artwork" >
    </div>

    <div class="container_boxes_artwork artworkFrontSide">
      <p class="click_upload_artwork"> Click to add artwork to the front right side.</p>
      <input id="upload_file_artwork_right" type="file" class="input_image_artwork" >
    </div>


    </div>

</section>
<script src="<?php echo $artworkJsPath . '?v=' . $artworkJsTime; ?>" type="text/javascript"></script>
