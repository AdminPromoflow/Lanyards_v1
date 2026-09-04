<?php
// Validar el archivo CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/home/sections/1-slider.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="../../views/assets/css/home/sections/1-slider.css?v=<?= $cssVersion; ?>">

<section class="sliderContainer" aria-label="Create your lanyard">
  <div id="sliderLong" class="sliderLong">
    <div class="slider">
      <div class="messageSlider reverseSlider">
        <span class="hero-kicker">Made for your brand</span>
        <h1>Custom lanyards, built around your idea.</h1>
        <p>Choose every detail and preview your design as you build it.</p>
        <button class="open_from_scratch buttonColor1 open_choose_options_lanyards" type="button"><strong class="width300">Start designing</strong></button>
      </div>
      <div class="imageSlider">
        <?php
        $img1 = '../../views/assets/img/home/1-slider/slider1.png';
        $imgVersion1 = file_exists($img1) ? filemtime($img1) : time();
        ?>
        <img src="<?= $img1 ?>?v=<?= $imgVersion1; ?>" alt="A selection of customised lanyards">
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img2 = '../../views/assets/img/home/1-slider/slider2.png';
        $imgVersion2 = file_exists($img2) ? filemtime($img2) : time();
        ?>
        <img src="<?= $img2 ?>?v=<?= $imgVersion2; ?>" alt="Colourful personalised lanyards and fittings">
      </div>
      <div class="messageSlider">
        <span class="hero-kicker">A proven combination</span>
        <h2>Start with our most popular setup.</h2>
        <p>Use a customer favourite as your base, then make it yours.</p>
        <button class="open_from_best_seller buttonColor2 open_choose_options_lanyards" type="button"><strong class="width300">Choose bestseller</strong></button>
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img3 = '../../views/assets/img/home/1-slider/slider3.png';
        $imgVersion3 = file_exists($img3) ? filemtime($img3) : time();
        ?>
        <img src="<?= $img3 ?>?v=<?= $imgVersion3; ?>" alt="Custom lanyard shown with its card holder">
      </div>
      <div class="messageSlider">
        <span class="hero-kicker">Your details, your way</span>
        <h2>Build a lanyard from scratch.</h2>
        <p>Pick the material, width, print, clip and finishing options.</p>
        <button class="open_from_scratch buttonColor3" type="button"><strong class="width300">Open customiser</strong></button>
      </div>
    </div>

    <div class="slider">
      <div class="imageSlider">
        <?php
        $img4 = '../../views/assets/img/home/1-slider/slider4.png';
        $imgVersion4 = file_exists($img4) ? filemtime($img4) : time();
        ?>
        <img src="<?= $img4 ?>?v=<?= $imgVersion4; ?>" alt="A finished full-colour lanyard">
      </div>
      <div class="messageSlider">
        <span class="hero-kicker">Need a quick route?</span>
        <h2>Choose the bestseller and customise it.</h2>
        <p>A fast starting point for events, teams and everyday use.</p>
        <button class="open_from_best_seller buttonColor4" type="button"><strong class="width300">Use this setup</strong></button>
      </div>
    </div>
  </div>

  <div id="buttonSliderContainer" class="buttonSliderContainer" aria-label="Choose a featured option">
    <button class="buttonSlider" type="button" aria-label="Show slide 1"></button>
    <button class="buttonSlider" type="button" aria-label="Show slide 2"></button>
    <button class="buttonSlider" type="button" aria-label="Show slide 3"></button>
    <button class="buttonSlider" type="button" aria-label="Show slide 4"></button>
  </div>
</section>

<?php
$arrowImg = '../../views/assets/img/home/1-slider/arrow_top.png';
$arrowImgVersion = file_exists($arrowImg) ? filemtime($arrowImg) : time();
?>
<button id="arrow_slider" class="arrow_slider" type="button" aria-label="Explore products below">
  <img src="<?= $arrowImg ?>?v=<?= $arrowImgVersion; ?>" alt="">
</button>

<?php
// Validar el archivo JS antes de usar filemtime()
$jsPath = '../../views/assets/js/home/sections/1-slider.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="../../views/assets/js/home/sections/1-slider.js?v=<?= $jsVersion; ?>"></script>
