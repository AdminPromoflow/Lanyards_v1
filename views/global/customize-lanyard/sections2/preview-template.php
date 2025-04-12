<?php
// Función para obtener el tiempo de modificación de un archivo
function getPreviewTemplateFilemtime($filePath) {
    return filemtime($filePath);
}

// Rutas de los archivos
$cssFilePath = '../../views/assets/css/global/customize-lanyard/sections2/preview-template.css';
$jsFilePath = '../../views/assets/js/customize-lanyard/sections2/preview-template.js';

// Obtener los tiempos de modificación
$cssFilemtime = getPreviewTemplateFilemtime($cssFilePath);
$jsFilemtime = getPreviewTemplateFilemtime($jsFilePath);
?>


<link rel="stylesheet" href="<?php echo $cssFilePath; ?>?v=<?php echo $cssFilemtime; ?>">

<section id="preview-template-class" class="preview-template-class">









  <div class="container-preview-template">

    <div class="left-super-lanyard left-super-lanyard-two-end-20mm">

    </div>
    <div class="right-super-lanyard right-super-lanyard-two-end-20mm">

    </div>
    <div class="center-super-lanyard ">

    </div>

  </div>

















</section>
<script src="<?php echo $jsFilePath; ?>?v=<?php echo $jsFilemtime; ?>" type="text/javascript"></script>
