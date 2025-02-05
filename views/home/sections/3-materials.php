<?php
// Validar CSS antes de usar filemtime()
$cssFile = realpath(__DIR__ . '/../assets/css/home/sections/3-materials.css');
$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
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
        <?php
        $img1 = realpath(__DIR__ . "/../assets/img/home/3-materials/Material-1-Flat-Polyester.jpg");
        $img1Version = $img1 && file_exists($img1) ? filemtime($img1) : time();
        ?>
        <img src="/assets/img/home/3-materials/Material-1-Flat-Polyester.jpg?v=<?= $img1Version; ?>" alt="">
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
        <?php
        $img2 = realpath(__DIR__ . "/../assets/img/home/3-materials/Material-2-Tabular.jpg");
        $img2Version = $img2 && file_exists($img2) ? filemtime($img2) : time();
        ?>
        <img src="/assets/img/home/3-materials/Material-2-Tabular.jpg?v=<?= $img2Version; ?>" alt="">
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
        <?php
        $img3 = realpath(__DIR__ . "/../assets/img/home/3-materials/Material-3-Natural-Bamboo.jpg");
        $img3Version = $img3 && file_exists($img3) ? filemtime($img3) : time();
        ?>
        <img src="/assets/img/home/3-materials/Material-3-Natural-Bamboo.jpg?v=<?= $img3Version; ?>" alt="">
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
        <?php
        $img4 = realpath(__DIR__ . "/../assets/img/home/3-materials/Material-4-Dye-sublimation.jpg");
        $img4Version = $img4 && file_exists($img4) ? filemtime($img4) : time();
        ?>
        <img src="/assets/img/home/3-materials/Material-4-Dye-sublimation.jpg?v=<?= $img4Version; ?>" alt="">
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
        <?php
        $img5 = realpath(__DIR__ . "/../assets/img/home/3-materials/Material-5-Dye-sub-Recycled-PET.jpg");
        $img5Version = $img5 && file_exists($img5) ? filemtime($img5) : time();
        ?>
        <img src="/assets/img/home/3-materials/Material-5-Dye-sub-Recycled-PET.jpg?v=<?= $img5Version; ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Dye Sub RPET</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <div class="itemMaterial">
      <?php
      $img6 = realpath(__DIR__ . "/../assets/img/home/3-materials/FlatPolyester.png");
      $img6Version = $img6 && file_exists($img6) ? filemtime($img6) : time();
      ?>
      <img src="/assets/img/home/3-materials/FlatPolyester.png?v=<?= $img6Version; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $img7 = realpath(__DIR__ . "/../assets/img/home/3-materials/2.png");
      $img7Version = $img7 && file_exists($img7) ? filemtime($img7) : time();
      ?>
      <img src="/assets/img/home/3-materials/2.png?v=<?= $img7Version; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $img8 = realpath(__DIR__ . "/../assets/img/home/3-materials/3.png");
      $img8Version = $img8 && file_exists($img8) ? filemtime($img8) : time();
      ?>
      <img src="/assets/img/home/3-materials/3.png?v=<?= $img8Version; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $img9 = realpath(__DIR__ . "/../assets/img/home/3-materials/4.png");
      $img9Version = $img9 && file_exists($img9) ? filemtime($img9) : time();
      ?>
      <img src="/assets/img/home/3-materials/4.png?v=<?= $img9Version; ?>" alt="">
    </div>

    <div class="itemMaterial">
      <?php
      $img10 = realpath(__DIR__ . "/../assets/img/home/3-materials/6.png");
      $img10Version = $img10 && file_exists($img10) ? filemtime($img10) : time();
      ?>
      <img src="/assets/img/home/3-materials/6.png?v=<?= $img10Version; ?>" alt="">
    </div>
  </div>
</section>

<?php
// Validar JS antes de usar filemtime()
$jsFile = realpath(__DIR__ . '/../assets/js/home/sections/3-materials.js');
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- JavaScript -->
<script src="/assets/js/home/sections/3-materials.js?v=<?= $jsVersion; ?>"></script>
