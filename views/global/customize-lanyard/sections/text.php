<?php
function asset_version_text($filePath) {
    // Convertir ruta relativa del navegador a ruta real en el servidor
    $fullPath = realpath(__DIR__ . '/' . $filePath);
    return ($fullPath && file_exists($fullPath)) ? filemtime($fullPath) : time();
}

$cssFile_text = "../../views/assets/css/global/customize-lanyard/sections/text.css";
$jsFile_text  = "../../views/assets/js/customize-lanyard/sections/text.js";
$imgPath_text = "../../views/assets/img/global/customize-lanyard/sections/text/";
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_text ?>?v=<?= asset_version_text($cssFile_text) ?>">

<section class="text section">
  <h2>Text.</h2>
  <div id="containers-boxes-text" class="containers-boxes-text">
    <div class="containers-text1">

      <div class="item-text">
        <p>Type the text below, please.</p>
        <input id="textInput" type="text" name="" value="">
      </div>

      <div class="item-text inline-item-text">
        <input id="printable_area" type="checkbox">
        <label for="printable_area">Select to view the printable area:</label>
        <p>This will not be printed on the lanyard; it is only for visualising the printable area.</p>
      </div>

      <!-- Repetir texto -->
      <div class="item-text">
        <p id="label-repeat-text">Repeat text</p>
        <div class="containr-repeat-text">
          <div class="repeat-text-box" id="decrease-text-box">
            <h3>-</h3>
          </div>
          <div class="repeat-text-box" id="repeat-text-box">
            <h3>+</h3>
          </div>
        </div>
      </div>

      <div class="item-text">
        <p>Adjust the text position</p>
        <div class="containr-space-between-text">
          <div class="space-between-text-box" id="move_down_text">
            <img src="../../views/assets/img/global/customize-lanyard/sections/text/top.png?v=<?= asset_version_text($imgPath_text . 'top.png') ?>" alt="">
          </div>
          <div class="space-between-text-box" id="move_up_text">
            <img src="../../views/assets/img/global/customize-lanyard/sections/text/bottom.png?v=<?= asset_version_text($imgPath_text . 'bottom.png') ?>" alt="">
          </div>
        </div>
      </div>

      <div class="item-text">
        <p>Adjust the spacing between the text</p>
        <div class="containr-space-between-text">
          <div class="space-between-text-box" id="decrease_space_between_text">
            <img src="<?= $imgPath_text ?>minus.png?v=<?= asset_version_text($imgPath_text . 'minus.png') ?>" alt="">
          </div>
          <div class="space-between-text-box" id="increase_space_between_text">
            <img src="<?= $imgPath_text ?>plus.png?v=<?= asset_version_text($imgPath_text . 'plus.png') ?>" alt="">
          </div>
        </div>
      </div>



      <div class="item-text">
        <p>Select the Pantone reference below.</p>
        <div class="colour-text-select" id="colour-text-select">
          <h3>Black</h3>
        </div>
        <div class="colour-text-select-container" id="colour-text-select-container"></div>
      </div>

      <div class="item-text">
        <p>Click to choose a font style:</p>
        <div class="type-text-select" id="type-text-select">
          <h3>Arial</h3>
        </div>
        <div class="type-text-select-container" id="type-text-select-container"></div>
      </div>

      <div class="item-text">
        <p>Choose the text styling</p>
        <div class="containr-styling-text">
          <div class="styling-text-box" id="styling-bold-text">
            <img src="<?= $imgPath_text ?>Bold.png?v=<?= asset_version_text($imgPath_text . 'Bold.png') ?>" alt="">
          </div>
          <div class="styling-text-box" id="styling-italic-text">
            <img src="<?= $imgPath_text ?>Italic.png?v=<?= asset_version_text($imgPath_text . 'Italic.png') ?>" alt="">
          </div>
          <div class="styling-text-box" id="styling-underline-text">
            <img src="<?= $imgPath_text ?>Underline.png?v=<?= asset_version_text($imgPath_text . 'Underline.png') ?>" alt="">
          </div>
        </div>
      </div>

      <div class="item-text">
        <p>Adjust the text size</p>
        <div class="containr-size-text">
          <div class="size-text-box" id="decrease-size-text">
            <img src="<?= $imgPath_text ?>smaller.png?v=<?= asset_version_text($imgPath_text . 'smaller.png') ?>" alt="">
          </div>
          <div class="size-text-box" id="increase-size-text">
            <img src="<?= $imgPath_text ?>bigger.png?v=<?= asset_version_text($imgPath_text . 'bigger.png') ?>" alt="">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- JavaScript -->
<script src="<?= $jsFile_text ?>?v=<?= asset_version_text($jsFile_text) ?>" type="text/javascript"></script>
