<!-- CSS with filemtime() to force the browser to load the latest version -->
<link rel="stylesheet" href="../assets/css/home/sections/1-slider.css?v=<?php echo filemtime('../assets/css/home/sections/1-slider.css'); ?>">

<section class="sliderContainer">
  <div id="sliderLong" class="sliderLong">
    <!-- First slider -->
    <div class="slider">
      <div class="messageSlider reverseSlider">
        <h2>Click here to start creating your unique lanyard.</h2>
        <button class="buttonColor1 open_choose_options_lanyards" type="button"><strong class="width300">Start</strong></button>
      </div>
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider1.png?v=<?php echo filemtime('../assets/img/home/1-slider/slider1.png'); ?>" alt="Slider 1">
      </div>
    </div>

    <!-- Second slider -->
    <div class="slider">
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider2.png?v=<?php echo filemtime('../assets/img/home/1-slider/slider2.png'); ?>" alt="Slider 2">
      </div>
      <div class="messageSlider">
        <h2>Start personalizing or choose the bestsellers here.</h2>
        <button class="buttonColor2 open_choose_options_lanyards" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>

    <!-- Third slider -->
    <div class="slider">
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider3.png?v=<?php echo filemtime('../assets/img/home/1-slider/slider3.png'); ?>" alt="Slider 3">
      </div>
      <div class="messageSlider">
        <h2>Press here to create your lanyard from scratch.</h2>
        <button class="buttonColor3" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>

    <!-- Fourth slider -->
    <div class="slider">
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider4.png?v=<?php echo filemtime('../assets/img/home/1-slider/slider4.png'); ?>" alt="Slider 4">
      </div>
      <div class="messageSlider">
        <h2>Start here to choose the best-selling lanyard.</h2>
        <button class="buttonColor4" type="button"><strong class="width300">Start</strong></button>
      </div>
    </div>
  </div>

  <!-- Navigation buttons for the slider -->
  <div class="buttonSliderContainer">
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
    <div class="buttonSlider"></div>
  </div>
</section>

<!-- Modal for choosing lanyard options -->
<div id="background_choose_options_lanyards" class="background_choose_options_lanyards">
  <div class="choose_options_lanyards">
    <p>Please select one of the following options:</p>
    <h3>The most popular lanyard</h3>
    <h3>Create a lanyard from scratch</h3>
    <h2 id="close_choose_options_lanyards" class="close_choose_options_lanyards">X</h2>
  </div>
</div>

<!-- Arrow button for slider navigation -->
<div id="arrow_slider" class="arrow_slider">
  <img src="../../views/assets/img/home/1-slider/arrow_top.png?v=<?php echo filemtime('../../views/assets/img/home/1-slider/arrow_top.png'); ?>" alt="Arrow">
</div>

<!-- JavaScript with filemtime() to avoid cache issues -->
<script src="../assets/js/home/sections/1-slider.js?v=<?php echo filemtime('../assets/js/home/sections/1-slider.js'); ?>"></script>

<script>
  // Get modal background and close button elements
  const background_choose_options_lanyards = document.getElementById("background_choose_options_lanyards");
  const close_choose_options_lanyards = document.getElementById("close_choose_options_lanyards");
  const open_choose_options_lanyards = document.querySelectorAll(".open_choose_options_lanyards");

  // Close modal when clicking the "X" button
  close_choose_options_lanyards.addEventListener("click", function(){
    background_choose_options_lanyards.style.display = "none";
  });

  // Open modal when clicking any "Start" button
  open_choose_options_lanyards.forEach(button => {
    button.addEventListener("click", function(){
      background_choose_options_lanyards.style.display = "block";
    });
  });
</script>
