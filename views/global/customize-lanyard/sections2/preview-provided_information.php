<?php
function previewProvidedInformation($filePath) {
    return $filePath . '?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . $filePath);
}
?>

<link rel="stylesheet" href="<?php echo previewProvidedInformation('/views/assets/css/global/customize-lanyard/sections2/preview-provided-information.css'); ?>">
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

<section class="preview-provided-information-container" id="preview-provided-information-container">
    <h2>Location</h2>
    <br>
    <div id="map"></div>
</section>

<script src="<?php echo previewProvidedInformation('/views/assets/js/customize-lanyard/sections2/preview-provided-information.js'); ?>" type="text/javascript"></script>
