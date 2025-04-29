<?php
function asset_version($path) {
    $fullPath = __DIR__ . '/' . $path;
    return file_exists($fullPath) ? filemtime($fullPath) : time();
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections/image.css?v=<?=asset_version('../../views/assets/css/global/customize-lanyard/sections/image.css')?>">

<section class="image section">
  <h2>Image</h2>
  <div id="containers-boxes-image" class="containers-boxes-image">
    <div class="containers-image1">
      <div class="item-image">
        <p>Please upload your logo image.</p>
        <input type="file" id="imageUpload" name="imageUpload" style="display:none;" accept="image/*">
        <label for="imageUpload">Upload</label>
      </div>


      <div class="item-image inline-item-text">
        <input  id="printable_area_image" type="checkbox"   >
        <label for="printable_area_image">Select to view the printable area:</label>
        <p>This will not be printed on the lanyard; it is only for visualising the printable area.</p>
      </div>

      <div class="item-image">
        <p>Adjust the spacing between the image</p>
        <div class="containr-space-between-image">
          <div class="space-between-image-box" id="decrease_space_between_image">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/minus.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/minus.png')?>" alt="">
          </div>
          <div class="space-between-image-box" id="increase_space_between_image">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/plus.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/plus.png')?>" alt="">
          </div>
        </div>
      </div>

      <div class="item-image">
        <p id="label-repeat-image">Repeat image</p>
        <div class="containr-repeat-image">
          <div class="repeat-image-box" id="decrease-image-box">
            <h3>-</h3>
          </div>
          <div class="repeat-image-box" id="repeat-image-box">
            <h3>+</h3>
          </div>
        </div>
      </div>

      <div class="item-image">
        <p>Adjust the image size</p>
        <div class="containr-size-image">
          <div class="size-image-box" id="decrease-image-size">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/smaller.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/smaller.png')?>" alt="">
          </div>
          <div class="size-image-box" id="increase-image-size">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/bigger.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/bigger.png')?>" alt="">
          </div>
        </div>
      </div>



      <div class="item-image">
        <p>Adjust the rotation of the image.</p>
        <div class="containr-rotation-image">
          <div class="rotation-image-box" id="rotate_image_left">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/rotation-left.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/rotation-left.png')?>" alt="">
          </div>
          <div class="rotation-image-box" id="rotate_image_right">
            <img src="../../views/assets/img/global/customize-lanyard/sections/image/rotation-rigth.png?v=<?=asset_version('../../views/assets/img/global/customize-lanyard/sections/image/rotation-rigth.png')?>" alt="">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script src="../../views/assets/js/customize-lanyard/sections/image.js?v=<?=asset_version('../../views/assets/js/customize-lanyard/sections/image.js')?>"></script>
