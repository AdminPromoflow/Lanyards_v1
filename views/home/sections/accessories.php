<?php
function accessories_home_file_version($file_path) {
    return file_exists($file_path) ? filemtime($file_path) : time();
}

$accessories_home_css = "../../views/assets/css/home/sections/accessories.css";
$accessories_home_js = "../../views/assets/js/home/sections/accessories.js";
?>

<link rel="stylesheet" href="<?php echo $accessories_home_css . '?v=' . accessories_home_file_version($accessories_home_css); ?>">
<section id="accessories_home" class="accessories_home">
  <h1>Accessories</h1>
  <div class="container_accessories_home">
    <div class="box_accessories_home">
      <img src="../../views/assets/img/home/accessories/1.png" alt="">
      <div class="subcontainer_accessories_home_quantity">
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <input type="text" name="" value="">
      </div>
      <div class="subcontainer_accessories_home_quantity">
        <div class="box_accessories_home_quantity">
`         <h3>Description</h3>`
          <h3>£3 per unit</h3>
        </div>
      </div>
    </div>
    <div class="box_accessories_home">

    </div>
    <div class="box_accessories_home">

    </div>
    <div class="box_accessories_home">

    </div>
    <div class="box_accessories_home">

    </div>
  </div>
</section>
<script src="<?php echo $accessories_home_js . '?v=' . accessories_home_file_version($accessories_home_js); ?>" type="text/javascript"></script>
