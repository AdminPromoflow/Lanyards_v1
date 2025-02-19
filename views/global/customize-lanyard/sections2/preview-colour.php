<?php
// Function to get the last modified timestamp of the file
function get_customize_lanyard_file_version($filePath) {
    if (file_exists($filePath)) {
        return filemtime($filePath);
    }
    return time(); // If the file doesn't exist, return current timestamp
}

$customize_lanyard_css = "../../views/assets/css/global/customize-lanyard/sections2/preview-colour.css";
$customize_lanyard_js = "../../views/assets/js/customize-lanyard/sections2/preview-colour.js";
?>

<!-- Link CSS with versioning -->
<link rel="stylesheet" href="<?php echo $customize_lanyard_css . '?v=' . get_customize_lanyard_file_version($customize_lanyard_css); ?>">

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
<script src="<?php echo $customize_lanyard_js . '?v=' . get_customize_lanyard_file_version($customize_lanyard_js); ?>" type="text/javascript"></script>
