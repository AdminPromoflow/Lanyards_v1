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


    <div class="super-lanyard-real">
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm-real">

      </div>
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm-real">

      </div>
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm-real">

      </div>
    </div>



    <div class="super-lanyard-manual">
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm-manual">

      </div>
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm-manual">

      </div>
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm-manual">

      </div>


    </div>



    <div class="super-lanyard-arwork">
      <div class="left-super-lanyard left-super-lanyard-one-end-10mm-arwork">

      </div>
      <div class="right-super-lanyard right-super-lanyard-one-end-10mm-arwork">

      </div>
      <div class="center-super-lanyard center-super-lanyard-one-end-10mm-arwork">

      </div>
    </div>







  </div>























</section>
<script src="<?php echo $jsFilePath; ?>?v=<?php echo $jsFilemtime; ?>" type="text/javascript"></script>
