<?php
function asset_version_previewArtworkManual($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_previewArtworkManual = "../../views/assets/css/global/customize-lanyard/sections2/preview-artwork-manual.css";
$jsFile_previewArtworkManual = "../../views/assets/js/customize-lanyard/sections2/preview-artwork-manual.js";

// Image files with versioning
$imgFiles_previewArtworkManual = [
    "background-colour" => "../../views/assets/img/global/customize-lanyard/sections2/preview-artwork-manual/background-colour.png",
    "text" => "../../views/assets/img/global/customize-lanyard/sections2/preview-artwork-manual/text.png",
    "logo" => "../../views/assets/img/global/customize-lanyard/sections2/preview-artwork-manual/logo.png",
    "artwork" => "../../views/assets/img/global/customize-lanyard/sections2/preview-artwork-manual/artwork.png"
];

foreach ($imgFiles_previewArtworkManual as $key => $path) {
    $imgFiles_previewArtworkManual[$key] = $path . "?v=" . asset_version_previewArtworkManual($path);
}
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssFile_previewArtworkManual ?>?v=<?= asset_version_previewArtworkManual($cssFile_previewArtworkManual) ?>">

<section id="preview-artwork-manual-container" class="preview-artwork-manual-container">
  <div id="preview-manual-container" class="preview-manual-container">
    <div class="preview-manual-boxes">
      <h2>Manual</h2>
      <p>Lanyards can be printed using screen print in one of two ways,
        depending on your previous selection. <br>The manual option allows you to choose text,
        a background colour, and/or an image. This lets you personalise your lanyard with simple design elements.</p>

      <div id="open-background-colour" class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes">
          <h3>Choose the lanyard background color</h3>
        </div>
        <div class="artwork-manual-boxes">
          <img src="<?= $imgFiles_previewArtworkManual['background-colour'] ?>" alt="Background Colour">
        </div>
      </div>

      <div class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes">
          <h3>Add text to the lanyard</h3>
        </div>
        <div class="artwork-manual-boxes">
          <img src="<?= $imgFiles_previewArtworkManual['text'] ?>" alt="Text">
        </div>
      </div>

      <div class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes">
          <h3>Upload the lanyard logo</h3>
        </div>
        <div class="artwork-manual-boxes">
          <img src="<?= $imgFiles_previewArtworkManual['logo'] ?>" alt="Logo">
        </div>
      </div>
    </div>
  </div>

  <div id="preview-artwork-container" class="preview-artwork-container">
    <div class="preview-artwork-boxes">
      <h2>Artwork</h2>
      <p>With the artwork option for screen printing, you can choose whether or
        not to include a background colour and upload an image for each side.
        If you selected double-sided printing, you will need to upload four
        images—two for the front and two for the back.</p>
      <div class="preview-artwork-boxes-img">
        <img src="<?= $imgFiles_previewArtworkManual['artwork'] ?>" alt="Artwork">
      </div>
    </div>
  </div>
</section>

<!-- JavaScript -->
<script src="<?= $jsFile_previewArtworkManual ?>?v=<?= asset_version_previewArtworkManual($jsFile_previewArtworkManual) ?>" type="text/javascript"></script>
