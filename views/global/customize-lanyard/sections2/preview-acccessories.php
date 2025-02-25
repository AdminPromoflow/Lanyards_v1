<?php
function preview_accessories_version($file) {
    return file_exists($file) ? filemtime($file) : time();
}

$preview_accessories_css = "../../views/assets/css/global/customize-lanyard/sections2/preview-accessories.css";
$preview_accessories_js = "../../views/assets/js/customize-lanyard/sections2/preview-accessories.js";

// Array de imágenes con sus rutas
$preview_accessories_images = [
    "../../views/assets/img/global/customize-lanyard/sections/accessories/6.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/2.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/1.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/7.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/12.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/9.png",
    "../../views/assets/img/global/customize-lanyard/sections/accessories/11.png"
];
?>

<link rel="stylesheet" href="<?php echo $preview_accessories_css . '?v=' . preview_accessories_version($preview_accessories_css); ?>">

<section class="previewAccessories" id="preview_accessories">
  <?php foreach ($preview_accessories_images as $image): ?>
    <div class="accessories_clear_plastic_closed_face">
      <img src="<?php echo $image . '?v=' . preview_accessories_version($image); ?>" alt="">
    </div>
  <?php endforeach; ?>
</section>

<script src="<?php echo $preview_accessories_js . '?v=' . preview_accessories_version($preview_accessories_js); ?>" type="text/javascript"></script>
