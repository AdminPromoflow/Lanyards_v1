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

      <div id="open-background-colour" class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes">
          <h3>Choose the lanyard background color</h3>
        </div>
        <div class="artwork-manual-boxes">
          <img src="<?= $imgFiles_previewArtworkManual['background-colour'] ?>" alt="Background Colour">
        </div>
      </div>

      <div class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes"></div>
        <div class="artwork-manual-boxes">
          <h3>Add text to the lanyard</h3>
        </div>
        <div class="artwork-manual-boxes">
          <img src="<?= $imgFiles_previewArtworkManual['text'] ?>" alt="Text">
        </div>
      </div>

      <div class="preview-artwork-manual-boxes">
        <div class="artwork-manual-boxes"></div>
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
      <div class="artwork-boxes">
        <h3>If you already have a design for your lanyard, select the artwork option</h3>
      </div>
      <img src="<?= $imgFiles_previewArtworkManual['artwork'] ?>" alt="Artwork">
    </div>
  </div>
</section>

<!-- JavaScript -->
<script src="<?= $jsFile_previewArtworkManual ?>?v=<?= asset_version_previewArtworkManual($jsFile_previewArtworkManual) ?>" type="text/javascript"></script>
