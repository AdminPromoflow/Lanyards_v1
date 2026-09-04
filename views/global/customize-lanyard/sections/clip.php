<?php
function clip_filemtime($file) {
    return file_exists($file) ? filemtime($file) : time();
}

$clip_css = "../../views/assets/css/global/customize-lanyard/sections/clip.css";
$clip_js = "../../views/assets/js/customize-lanyard/sections/clip.js";

/*$clip_images = [
    "dog_clip.png",
    "swvel_clip.png",
    "crocodile_clip.png",
    "metal_j_hook.png",
    "crab_hook.png",
    "slide_clip.png"
];*/

//$img_path_base = "../../views/assets/img/global/customize-lanyard/sections/clip/";
?>

<link rel="stylesheet" href="<?php echo $clip_css . '?v=' . clip_filemtime($clip_css); ?>">

<section class="clip_section section">
  <h2 class="name-section-customize-lanyard">Clips</h2>
  <br>
  <p>Select one clip</p>
  <br>
  <div id="containers_boxes_clip" class="containers_boxes_clip">

  </div>
</section>

<script src="<?php echo $clip_js . '?v=' . clip_filemtime($clip_js); ?>"></script>
