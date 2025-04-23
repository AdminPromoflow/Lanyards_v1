<?php
function get_preview_manual_css_version() {
    $preview_manual_css_path = __DIR__ . "/../../views/assets/css/global/customize-lanyard/sections2/preview-manual.css";
    if (file_exists($preview_manual_css_path)) {
        $preview_manual_version = filemtime($preview_manual_css_path);
    } else {
        $preview_manual_version = time(); // Valor por defecto si no existe el archivo
    }
    return $preview_manual_version;
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-manual.css?v=<?php echo get_preview_manual_css_version(); ?>">

<section id="preview-manual-section">
  <h1>Hola</h1>
</section>

<script src="../../views/assets/js/customize-lanyard/sections2/preview-manual.js" type="text/javascript"></script>
