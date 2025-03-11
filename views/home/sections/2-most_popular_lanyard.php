<?php
// Validar el archivo CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/home/sections/2-most_popular_lanyard.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="../../views/assets/css/home/sections/2-most_popular_lanyard.css?v=<?= $cssVersion; ?>">

<section class="most_popular_lanyard">
  <h1>Most popular lanyard</h1>
  <p>Discover the best-selling lanyard everyone loves! Designed for durability, comfort, and style, this lanyard is perfect for work, events, or everyday use. Get yours today and enjoy the perfect blend of quality and functionality!</p>

  <div class="container_most_popular_lanyard">
    <div class="subcontainer_most_popular_lanyard">
      <h2>Customization options</h2>
      <div class="subcontainer_box_information_most_popular_lanyard">
        <div class="box_information_most_popular_lanyard">
          <h3>Material:</h3>
          <h3>Dye-sublimation</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Type of lanyard:</h3>
          <h3>Single ended</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Width:</h3>
          <h3>20mm</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Side Printed:</h3>
          <h3>Both sides</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Colour:</h3>
          <h3>Full colour</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Clip:</h3>
          <h3>Standard</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Attachment:</h3>
          <h3>None</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Accessory:</h3>
          <h3>None</h3>
        </div>
        <div class="box_information_most_popular_lanyard">
          <h3>Design options:</h3>
          <h3>Customization</h3>
        </div>
      </div>
      <button type="button" name="button">Select</button>
    </div>

    <div class="subcontainer_most_popular_lanyard">
      <?php
      function getImageVersion($imagePath) {
          return file_exists($imagePath) ? filemtime($imagePath) : time();
      }
      ?>

      <div class="box_display_most_popular_lanyard">
        <h2>Material</h2>
        <?php $img1 = '../../views/assets/img/home/2-most_popular_lanyard/Material-5-Dye-sub-Recycled-PET.jpg'; ?>
        <img src="<?= $img1 ?>?v=<?= getImageVersion($img1); ?>" alt="">
        <h3>Dye-sublimation</h3>
        <p>High-resolution, color-rich designs achieved through dye sublimation on smooth polyester, blending quality and durability.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Type of lanyard</h2>
        <?php $img2 = '../../views/assets/img/home/2-most_popular_lanyard/one-end.png'; ?>
        <img src="<?= $img2 ?>?v=<?= getImageVersion($img2); ?>" alt="">
        <h3>Single ended</h3>
        <p>A lanyard type one end is a strap with a single functional end for holding accessories or ID cards.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Width</h2>
        <?php $img3 = '../../views/assets/img/home/2-most_popular_lanyard/one-end-25mm.png'; ?>
        <img src="<?= $img3 ?>?v=<?= getImageVersion($img3); ?>" alt="">
        <h3>20mm</h3>
        <p>A lanyard one end 20mm is a strap, 20mm wide, with a single functional end for attachments.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Side Printed</h2>
        <?php $img4 = '../../views/assets/img/home/2-most_popular_lanyard/two-side.png'; ?>
        <img src="<?= $img4 ?>?v=<?= getImageVersion($img4); ?>" alt="">
        <h3>Both sides</h3>
        <p>A lanyard two sides printed is a strap with printing on both sides for enhanced visibility and personalisation.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Colour</h2>
        <?php $img5 = '../../views/assets/img/home/2-most_popular_lanyard/colour-coverage.png'; ?>
        <img src="<?= $img5 ?>?v=<?= getImageVersion($img5); ?>" alt="">
        <h3>Full colour</h3>
        <p>Colorful, vibrant lanyard ideal for promotional events, showcasing logos, and ensuring high visibility with a creative, attention-grabbing design.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Clip</h2>
        <?php $img6 = '../../views/assets/img/home/2-most_popular_lanyard/dog_clip.png'; ?>
        <img src="<?= $img6 ?>?v=<?= getImageVersion($img6); ?>" alt="">
        <h3>Dog</h3>
        <p>A dog clip is a metal hook with a spring, designed to securely attach ID cards, badges, or accessories.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Attachment</h2>
        <?php $img7 = '../../views/assets/img/home/2-most_popular_lanyard/none.png'; ?>
        <img src="<?= $img7 ?>?v=<?= getImageVersion($img7); ?>" alt="">
        <h3>None</h3>
        <p>There is no attachment included, but you can add it in our customization options by simply clicking 'Select'.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Accessory</h2>
        <?php $img8 = '../../views/assets/img/home/2-most_popular_lanyard/none.png'; ?>
        <img src="<?= $img8 ?>?v=<?= getImageVersion($img8); ?>" alt="">
        <h3>None</h3>
        <p>No accessories are included, but you can easily add them through our customization options by clicking 'Select'.</p>
      </div>

      <div class="box_display_most_popular_lanyard">
        <h2>Design options</h2>
        <?php $img9 = '../../views/assets/img/home/2-most_popular_lanyard/design-options.png'; ?>
        <img src="<?= $img9 ?>?v=<?= getImageVersion($img9); ?>" alt="">
        <h3>Artwork or background, text, and logo.</h3>
        <p>You can choose between these two options to add your design to the lanyard: artwork or background, text, and logo.</p>
      </div>
    </div>
  </div>
</section>

<?php
// Validar el archivo JS antes de usar filemtime()
$jsPath = '../../views/assets/js/home/sections/2-most_popular_lanyard.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="../../views/assets/js/home/sections/2-most_popular_lanyard.js?v=<?= $jsVersion; ?>"></script>
