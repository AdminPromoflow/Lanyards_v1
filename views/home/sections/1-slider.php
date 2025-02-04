<link rel="stylesheet" href="../assets/css/home/sectons/1-slider.css?v=<?php echo filemtime('../assets/css/home/sectons/1-slider.css'); ?>">
<section class="sliderContainer">

  <div id="sliderLong" class="sliderLong">
    <div class="slider ">
      <div class="messageSlider  reverseSlider">
            <h2>Click here to start creating your unique lanyard.</h2>
            <button class="buttonColor1 open_choose_options_lanyards" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider1.png" alt="">
      </div>

    </div>
    <div class="slider">
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider2.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Start personalizing or choose the bestsellers here.</h2>
        <button class="buttonColor2  open_choose_options_lanyards" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>

    </div>
    <div class="slider">

      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider3.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Press here to create your lanyard from scratch.</h2>
        <button class="buttonColor3" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>
    </div>
    <div class="slider">
      <div class="imageSlider">
        <img src="../assets/img/home/1-slider/slider4.png" alt="">
      </div>
      <div class="messageSlider">
        <h2>Start here to choose the best-selling lanyard.</h2>
        <button class="buttonColor4" type="button" name="button"><strong  class="width300">Start</strong></button>
      </div>

    </div>
  </div>

  <div class="buttonSliderContainer">
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>
    <div class="buttonSlider">
    </div>

  </div>


</section>



<style media="screen">
  .background_choose_options_lanyards{
    position: fixed;
    height: 100vh;
    width: 100vw;
    top: 0px;
    left: 0px;
    display: none;
    background: rgba(0, 0, 0, .3);
    z-index: 900;
  }
  .choose_options_lanyards{
    position: absolute;
    top: 40vh;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: rgba(24, 41, 66, 1);
    z-index: 100;
    color: white;
    box-shadow: -3px 3px 1px grey;
  }
  .choose_options_lanyards h3{
    text-align: center;
    font-weight: 300;
    padding: 4px 0px;
    cursor: pointer;
    background: rgba(0, 0, 0, .5);
    border: 1px solid rgba(255, 255, 255, .5);
    box-shadow: 1px 1px 0px black;
    transition: box-shadow .4s;
  }
  .choose_options_lanyards p{
    position: relative;
    text-align: center;
    left: 50%;
    font-size: 1.07em;
    font-weight: 300;
    transform: translateX(-50%);
    width: 80%;
  }
  .choose_options_lanyards h3:hover{
    box-shadow: 3px 3px 1px black;
  }
  .choose_options_lanyards h3:active{
    box-shadow: 1px 1px 0px black;
  }
  .close_choose_options_lanyards{
    position: absolute;
    top: 0px;
    right: 20px;
    color: white;
    cursor: pointer;
  }

</style>
<div id="background_choose_options_lanyards" class="background_choose_options_lanyards">
  <div class="choose_options_lanyards">
    <p>Please select one of the following options:</p>
    <h3>The most popular lanyard</h3>
    <h3>Create a lanyard from scratch</h3>
    <h2 id="close_choose_options_lanyards" class="close_choose_options_lanyards">X</h2>
  </div>
</div>
<script type="text/javascript">
const background_choose_options_lanyards = document.getElementById("background_choose_options_lanyards");
const close_choose_options_lanyards = document.getElementById("close_choose_options_lanyards");

const  open_choose_options_lanyards = document.querySelectorAll(".open_choose_options_lanyards");

close_choose_options_lanyards.addEventListener("click", function(){
  background_choose_options_lanyards.style.display = "none";
});

for (let i = 0; i < open_choose_options_lanyards.length; i++) {
  open_choose_options_lanyards[i].addEventListener("click", function(){
    background_choose_options_lanyards.style.display = "block";
  })
}
</script>




<div id="arrow_slider" class="arrow_slider">
  <img src="../../views/assets/img/home/1-slider/arrow_top.png" alt="">
</div>
<script src="../assets/js/home/sectons/1-slider.js?v=<?php echo filemtime('../assets/js/home/sectons/1-slider.js'); ?>"></script>
