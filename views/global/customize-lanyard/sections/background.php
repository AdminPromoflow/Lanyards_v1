<?php
function asset_version_background($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_background = "../../views/assets/css/global/customize-lanyard/sections/background.css";
$jsFile_background = "../../views/assets/js/customize-lanyard/sections/background.js";
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_background ?>?v=<?= asset_version_background($cssFile_background) ?>">

<section class="backgroundSection section">
  <h2 class="">Background</h2>
  <p>Select a background colour for your design or if you're uploading images with transparency, to ensure it displays well.</p>
  <div class="box_background_colour">
    <div class="option_background_colour">
      <input class="option_background_checked" id="option_background_checked_01" type="radio" name="option" value="0" checked >
      <label for="option_background_checked_01">Select colour of the background:</label>
    </div>
    <div class="containers_boxes_background" id="container_boxes_background">
    </div>
  <!--  <div class="option_background_colour">
      <input type="radio" class="select-background-colour-option" id="backgroundColourFirstOption" name="option" checked>
      <label for="backgroundColourFirstOption">Select colour of the background:</label>
    </div>

    <div class="opacity-background-option-first-option opacity-option-background-selected"></div>
    <div id="containers_boxes_background" class="containers_boxes_background">
      <div class="container_boxes_background" id="container_boxes_background">
      </div>
    </div>-->
  </div>

  <br>

  <div class="box_background_colour screen_print_background_colour">
    <div class="option_background_colour">
      <input class="option_background_checked" id="option_background_checked_02" type="radio" name="option" value="1"  >
      <label for="option_background_checked_02">If your color isn't in stock, customize it for £25 more at checkout:</label>
    </div>
    <div class="containers_boxes_background">
      <input  class="select-colour-second-option " id="optionColourBackground" type="color" value="#FFFFFF">
    </div>
  <!--  <div class="option_background_colour">
      <input type="radio" class="select-background-colour-option  " id="backgroundColourSecondOption" name="option">
      <label class="" for="backgroundColourSecondOption">If your color isn't in stock, customize it for £25 more at checkout:</label>
    </div>
    <br>
    <div class="opacity-background-option-second-option opacity-option-background-selected "></div>
    <input  class="select-colour-second-option " id="optionColourBackground" type="color" value="#FFFFFF">
  -->
  </div>

</section>

<!-- JavaScript -->
<script src="<?= $jsFile_background ?>?v=<?= asset_version_background($jsFile_background) ?>" type="text/javascript"></script>
