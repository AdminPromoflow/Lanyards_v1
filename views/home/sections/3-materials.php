<link rel="stylesheet" href="../assets/css/home/sectons/3-materials.css?v=<?php echo filemtime('../assets/css/home/sectons/3-materials.css'); ?>">

<section class="materials">
  <h1>Create your own lanyard from scratch.</h1>

  <div class="containerMaterials">
    <div class="containerTextMaterials">
      <div class="containerTextMaterialsBox">
        <img src="../../views/assets/img/home/3-materials/icon_lanyard.png?v=<?php echo filemtime('../../views/assets/img/home/3-materials/icon_lanyard.png'); ?>" alt="">
      </div>
      <div class="containerTextMaterialsBox">
        <h3 class="material-for-select">Create your own lanyard</h3>
      </div>
      <div class="buttonMaterialsBox">
        <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
      </div>
    </div>

    <?php
      $images = [
        "Material-2-Tabular.jpg",
        "Material-3-Natural-Bamboo.jpg",
        "Material-4-Dye-sublimation.jpg",
        "Material-5-Dye-sub-Recycled-PET.jpg"
      ];
      $titles = [
        "Tubular",
        "RPET Polyester",
        "Dye Sub polyester",
        "Dye Sub RPET"
      ];

      for ($i = 0; $i < count($images); $i++):
    ?>
      <div class="containerTextMaterials">
        <div class="closeMaterial">
          <img src="../assets/img/home/3-materials/Close-Materials.png?v=<?php echo filemtime('../assets/img/home/3-materials/Close-Materials.png'); ?>" alt="">
        </div>
        <div class="containerTextMaterialsBox">
          <img src="../assets/img/home/3-materials/<?php echo $images[$i]; ?>?v=<?php echo filemtime("../assets/img/home/3-materials/{$images[$i]}"); ?>" alt="">
        </div>
        <div class="containerTextMaterialsBox">
          <h3 class="material-for-select"><?php echo $titles[$i]; ?></h3>
        </div>
        <div class="buttonMaterialsBox">
          <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
        </div>
      </div>
    <?php endfor; ?>

    <?php
      $extraImages = [
        "FlatPolyester.png",
        "2.png",
        "3.png",
        "4.png",
        "6.png"
      ];

      foreach ($extraImages as $img):
    ?>
      <div class="itemMaterial">
        <img src="../assets/img/home/3-materials/<?php echo $img; ?>?v=<?php echo filemtime("../assets/img/home/3-materials/{$img}"); ?>" alt="">
      </div>
    <?php endforeach; ?>
  </div>
</section>

<script src="../assets/js/home/sectons/3-materials.js?v=<?php echo filemtime('../assets/js/home/sectons/3-materials.js'); ?>"></script>
