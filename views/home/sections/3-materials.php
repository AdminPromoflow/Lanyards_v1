<?php
// Validar el archivo CSS antes de usar filemtime()
$cssFile = realpath(__DIR__ . '/../assets/css/home/sections/3-materials.css');
$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();

// Validar el archivo JS antes de usar filemtime()
$jsFile = realpath(__DIR__ . '/../assets/js/home/sections/3-materials.js');
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>
<!-- CSS -->
<link rel="stylesheet" href="/assets/css/home/sections/3-materials.css?v=<?= $cssVersion; ?>">

<section class="materials">
  <h1>Create your own lanyard from scratch.</h1>
  <p>Create your own custom lanyard from scratch! Tailor it to your style, needs,
    and preferences for a unique accessory. Perfect for events, work, or personal use,
    design a lanyard that stands out. Start creating yours today and enjoy a
    one-of-a-kind design that's all your own!</p>

  <div class="containerMaterials">

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <img src="../../views/assets/img/home/3-materials/Material-1-Flat-Polyester.jpg?v=<?php echo filemtime('../../views/assets/img/home/3-materials/Material-1-Flat-Polyester.jpg'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Create your own lanyard</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">

      <div class="containerTextMaterialsBox">
        <img src="../assets/img/home/3-materials/Material-2-Tabular.jpg?v=<?php echo filemtime('../assets/img/home/3-materials/Material-2-Tabular.jpg'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Tubular</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">

      <div class="containerTextMaterialsBox">
        <img src="../assets/img/home/3-materials/Material-3-Natural-Bamboo.jpg?v=<?php echo filemtime('../assets/img/home/3-materials/Material-3-Natural-Bamboo.jpg'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">RPET Polyester</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">

      <div class="containerTextMaterialsBox">
        <img src="../assets/img/home/3-materials/Material-4-Dye-sublimation.jpg?v=<?php echo filemtime('../assets/img/home/3-materials/Material-4-Dye-sublimation.jpg'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Dye Sub polyester</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">

      <div class="containerTextMaterialsBox">
        <img src="../assets/img/home/3-materials/Material-5-Dye-sub-Recycled-PET.jpg?v=<?php echo filemtime('../assets/img/home/3-materials/Material-5-Dye-sub-Recycled-PET.jpg'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Dye Sub RPET</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="itemMaterial">
      <img src="../assets/img/home/3-materials/FlatPolyester.png?v=<?php echo filemtime('../assets/img/home/3-materials/FlatPolyester.png'); ?>" alt="">
    </div>
    <div class="itemMaterial">
      <img src="../assets/img/home/3-materials/2.png?v=<?php echo filemtime('../assets/img/home/3-materials/2.png'); ?>" alt="">
    </div>
    <div class="itemMaterial">
      <img src="../assets/img/home/3-materials/3.png?v=<?php echo filemtime('../assets/img/home/3-materials/3.png'); ?>" alt="">
    </div>
    <div class="itemMaterial">
      <img src="../assets/img/home/3-materials/4.png?v=<?php echo filemtime('../assets/img/home/3-materials/4.png'); ?>" alt="">
    </div>
    <div class="itemMaterial">
      <img src="../assets/img/home/3-materials/6.png?v=<?php echo filemtime('../assets/img/home/3-materials/6.png'); ?>" alt="">
    </div>
  </div>
</section>

<script src="../assets/js/home/sections/3-materials.js?v=<?php echo filemtime('../assets/js/home/sections/3-materials.js'); ?>"></script>
