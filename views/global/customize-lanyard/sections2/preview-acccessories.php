<?php
function previewAccessories_filemtime($file) {
    return file_exists($file) ? filemtime($file) : time();
}

$previewAccessories_css = "../../views/assets/css/global/customize-lanyard/sections2/preview-accessories.css";
$previewAccessories_js = "../../views/assets/js/customize-lanyard/sections2/preview-accessories.js";

$previewAccessories_images = [
    "6.png", "2.png", "1.png", "7.png", "7.png", "7.png",
    "12.png", "12.png", "12.png", "12.png", "12.png",
    "9.png", "11.png"
];

$img_path_base = "../../views/assets/img/global/customize-lanyard/sections/accessories/";
?>

<link rel="stylesheet" href="<?php echo $previewAccessories_css . '?v=' . previewAccessories_filemtime($previewAccessories_css); ?>">

<section class="previewAccessories" id="preview_accessories">

  <?php foreach ($previewAccessories_images as $img) :
      $img_path = $img_path_base . $img;
  ?>
    <div class="accessories_clear_plastic_closed_face">
      <img src="<?php echo $img_path . '?v=' . previewAccessories_filemtime($img_path); ?>" alt="">
    </div>
  <?php endforeach; ?>

</section>

<script src="<?php echo $previewAccessories_js . '?v=' . previewAccessories_filemtime($previewAccessories_js); ?>" type="text/javascript"></script>
