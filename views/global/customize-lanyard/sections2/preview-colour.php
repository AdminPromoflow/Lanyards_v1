<?php
// Function to get the last modified timestamp of the file
function get_colour_preview_file_version($filePath) {
    if (file_exists($filePath)) {
        return filemtime($filePath);
    }
    return time(); // If the file doesn't exist, return the current timestamp
}

$colour_preview_css = "../../views/assets/css/global/customize-lanyard/sections2/preview-colour.css";
$colour_preview_js = "../../views/assets/js/customize-lanyard/sections2/preview-colour.js";
?>

<!-- Link CSS with versioning -->
<link rel="stylesheet" href="<?php echo $colour_preview_css . '?v=' . get_colour_preview_file_version($colour_preview_css); ?>">

<section id="preview-colour-container" class="preview-colour-container">
  <!-- <h3>Tubular</h3>

  <div class="img-preview-material">
    <img src="../../views/assets/img/global/customize-lanyard/sections2/Material-1-Flat-Polyester.jpg" alt="">
  </div>
  <div class="description-preview-material">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.   </p>
  </div> -->
</section>

<!-- Include JS with versioning -->
<script src="<?php echo $colour_preview_js . '?v=' . get_colour_preview_file_version($colour_preview_js); ?>" type="text/javascript"></script>
