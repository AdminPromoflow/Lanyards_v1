<?php
// Validar el archivo CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/home/sections/1-slider.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="../../views/assets/css/home/sections/1-slider.css?v=<?= $cssVersion; ?>">

<section class="sliderContainer">
  <div id="sliderLong" class="sliderLong">
    <div class="slider">
      <div class="messageSlider reverseSlider">
        <h2>Click here to start creating your unique lanyard.</h2>
        <button class="open_from_scratch buttonColor1 open_choose_options_lanyards" type="button"><strong class="width300">Start</strong></button>
      </div>
      <div class="imageSlider">
        <?php
        $img1 = '../../views/assets/img/home/1-slider/slider1.png';
        $imgVersion1 = file_exists($img1) ? filemtime($img1) : time();
        ?>
        <img src="<?= $img1 ?>?v=<?= $imgVersion1; ?>" alt="">
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img2 = '../../views/assets/img/home/1-slider/slider2.png';
        $imgVersion2 = file_exists($img2) ? filemtime($img2) : time();
        ?>
        <img src="<?= $img2 ?>?v=<?= $imgVersion2; ?>" alt="">
      </div>
      <div class="messageSlider">
        <h2>Start personalizing or choose the bestsellers here.</h2>
        <button class="open_from_best_seller buttonColor2 open_choose_options_lanyards" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img3 = '../../views/assets/img/home/1-slider/slider3.png';
        $imgVersion3 = file_exists($img3) ? filemtime($img3) : time();
        ?>
        <img src="<?= $img3 ?>?v=<?= $imgVersion3; ?>" alt="">
      </div>
      <div class="messageSlider">
        <h2>Press here to create your lanyard from scratch.</h2>
        <button class="open_from_scratch buttonColor3" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img4 = '../../views/assets/img/home/1-slider/slider4.png';
        $imgVersion4 = file_exists($img4) ? filemtime($img4) : time();
        ?>
        <img src="<?= $img4 ?>?v=<?= $imgVersion4; ?>" alt="">
      </div>
      <div class="messageSlider">
        <h2>Start here to choose the best-selling lanyard.</h2>
        <button class="open_from_best_seller buttonColor4" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>
  </div>

  <div class="buttonSliderContainer">
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
  </div>
</section>

<?php
$arrowImg = '../../views/assets/img/home/1-slider/arrow_top.png';
$arrowImgVersion = file_exists($arrowImg) ? filemtime($arrowImg) : time();
?>
<div id="arrow_slider" class="arrow_slider">
  <img src="<?= $arrowImg ?>?v=<?= $arrowImgVersion; ?>" alt="">
</div>

<?php
// Validar el archivo JS antes de usar filemtime()
$jsPath = '../../views/assets/js/home/sections/1-slider.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="../../views/assets/js/home/sections/1-slider.js?v=<?= $jsVersion; ?>"></script>
