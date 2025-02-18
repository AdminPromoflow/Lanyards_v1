<?php
// Validar el archivo CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/home/sections/3-materials.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="../../views/assets/css/home/sections/3-materials.css?v=<?= $cssVersion; ?>">

<section class="materials">
  <h1>Create your own lanyard from scratch.</h1>
  <p>Create your own custom lanyard from scratch! Tailor it to your style, needs,
    and preferences for a unique accessory. Perfect for events, work, or personal use,
    design a lanyard that stands out. Start creating yours today and enjoy a
    one-of-a-kind design that's all your own!</p>

  <div class="containerMaterials">

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <?php
        $imgPath1 = '../../views/assets/img/home/3-materials/Material-1-Flat-Polyester.jpg';
        $imgVersion1 = file_exists($imgPath1) ? filemtime($imgPath1) : time();
        ?>
        <img src="<?= $imgPath1 ?>?v=<?= $imgVersion1; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material_for_select">Create your own lanyard</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="open_from_scratch_in_home" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <?php
        $imgPath2 = '../../views/assets/img/home/3-materials/Material-2-Tabular.jpg';
        $imgVersion2 = file_exists($imgPath2) ? filemtime($imgPath2) : time();
        ?>
        <img src="<?= $imgPath2 ?>?v=<?= $imgVersion2; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material_for_select">Tubular</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="open_from_scratch_in_home" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <?php
        $imgPath3 = '../../views/assets/img/home/3-materials/Material-3-Natural-Bamboo.jpg';
        $imgVersion3 = file_exists($imgPath3) ? filemtime($imgPath3) : time();
        ?>
        <img src="<?= $imgPath3 ?>?v=<?= $imgVersion3; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material_for_select">RPET Polyester</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="open_from_scratch_in_home" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <?php
        $imgPath4 = '../../views/assets/img/home/3-materials/Material-4-Dye-sublimation.jpg';
        $imgVersion4 = file_exists($imgPath4) ? filemtime($imgPath4) : time();
        ?>
        <img src="<?= $imgPath4 ?>?v=<?= $imgVersion4; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material_for_select">Dye Sub polyester</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="open_from_scratch_in_home" type="button">Select</button>
      </div>
    </div>

    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <?php
        $imgPath5 = '../../views/assets/img/home/3-materials/Material-5-Dye-sub-Recycled-PET.jpg';
        $imgVersion5 = file_exists($imgPath5) ? filemtime($imgPath5) : time();
        ?>
        <img src="<?= $imgPath5 ?>?v=<?= $imgVersion5; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material_for_select">Dye Sub RPET</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="open_from_scratch_in_home" type="button">Select</button>
      </div>
    </div>

    <div class="itemMaterial">
      <?php
      $imgPath6 = '../../views/assets/img/home/3-materials/FlatPolyester.png';
      $imgVersion6 = file_exists($imgPath6) ? filemtime($imgPath6) : time();
      ?>
      <img src="<?= $imgPath6 ?>?v=<?= $imgVersion6; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $imgPath7 = '../../views/assets/img/home/3-materials/2.png';
      $imgVersion7 = file_exists($imgPath7) ? filemtime($imgPath7) : time();
      ?>
      <img src="<?= $imgPath7 ?>?v=<?= $imgVersion7; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $imgPath8 = '../../views/assets/img/home/3-materials/3.png';
      $imgVersion8 = file_exists($imgPath8) ? filemtime($imgPath8) : time();
      ?>
      <img src="<?= $imgPath8 ?>?v=<?= $imgVersion8; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $imgPath9 = '../../views/assets/img/home/3-materials/4.png';
      $imgVersion9 = file_exists($imgPath9) ? filemtime($imgPath9) : time();
      ?>
      <img src="<?= $imgPath9 ?>?v=<?= $imgVersion9; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $imgPath10 = '../../views/assets/img/home/3-materials/6.png';
      $imgVersion10 = file_exists($imgPath10) ? filemtime($imgPath10) : time();
      ?>
      <img src="<?= $imgPath10 ?>?v=<?= $imgVersion10; ?>" alt="">
    </div>
  </div>
</section>

<?php
// Validar el archivo JS antes de usar filemtime()
$jsPath = '../../views/assets/js/home/sections/3-materials.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="../../views/assets/js/home/sections/3-materials.js?v=<?= $jsVersion; ?>"></script>
