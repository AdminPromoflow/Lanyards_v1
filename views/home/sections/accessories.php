<?php
function accessories_home_file_version($file_path) {
    return file_exists($file_path) ? filemtime($file_path) : time();
}

$accessories_home_css = "../../views/assets/css/home/sections/accessories.css";
$accessories_home_js = "../../views/assets/js/home/sections/accessories.js";
?>

<link rel="stylesheet" href="<?php echo $accessories_home_css . '?v=' . accessories_home_file_version($accessories_home_css); ?>">
<section id="accessories_home" class="accessories_home">
  <div class="container_accessories_home">
    <div class="box_accessories_home">

    </div>
    <div class="box_accessories_home">

    </div>
  </div>
</section>
<script src="<?php echo $accessories_home_js . '?v=' . accessories_home_file_version($accessories_home_js); ?>" type="text/javascript"></script>
