<?php
function preview_material_version($file) {
    return file_exists($file) ? filemtime($file) : time();
}

$preview_material_css = "../../views/assets/css/global/customize-lanyard/sections2/preview-material.css";
$preview_material_js = "../../views/assets/js/customize-lanyard/sections2/preview-material.js";
?>

<link rel="stylesheet" href="<?php echo $preview_material_css . '?v=' . preview_material_version($preview_material_css); ?>">

<section id="preview-material-container" class="preview-material-container">
</section>

<script src="<?php echo $preview_material_js . '?v=' . preview_material_version($preview_material_js); ?>" type="text/javascript"></script>
