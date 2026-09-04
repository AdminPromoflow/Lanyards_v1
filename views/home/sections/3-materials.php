<?php
// Validate the CSS file before using filemtime()
$cssPath = '../../views/assets/css/home/sections/3-materials.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section class="materials">
  <span class="section-kicker">Pick your foundation</span>
  <h2>Choose the right material</h2>
  <p class="section-intro">From everyday polyester to recycled and full-colour options, choose the finish that suits your design and budget.</p>

  <div class="containerMaterials">
    <?php
    // Array of materials with file paths and names
    $materials = [
        ["path" => "Material-1-Flat-Polyester.jpg", "name" => "Ribbed Polyester"],
        ["path" => "Material-2-Tabular.jpg", "name" => "Tubular"],
        ["path" => "Material-3-Natural-Bamboo.jpg", "name" => "Natural Bamboo"],
        ["path" => "Material-4-Dye-sublimation.jpg", "name" => "Dye Sub polyester"],
        ["path" => "Material-5-Dye-sub-Recycled-PET.jpg", "name" => "Dye Sub RPET"]
    ];

    // Base path for material images
    $imgBasePath = '../../views/assets/img/home/3-materials/';

    // Generate material selection blocks dynamically
    foreach ($materials as $material) {
        $imgPath = $imgBasePath . $material["path"];
        $imgVersion = file_exists($imgPath) ? filemtime($imgPath) : time();
    ?>
        <div class="containerTextMaterials">
          <div class="containerTextMaterialsBox">
            <img src="<?= $imgPath ?>?v=<?= $imgVersion; ?>" alt="<?= $material['name']; ?>">
          </div>
          <div class="containerTextMaterialsBox">
            <h3 class="material_for_select"><?= $material['name']; ?></h3>
          </div>
          <div class="buttonMaterialsBox">
            <button class="open_from_scratch_in_home" type="button">Select</button>
          </div>
        </div>
    <?php
    }
    ?>

    <?php
    // Array of additional material preview images
    $extraMaterials = [
        "FlatPolyester.png",
        "2.png",
        "3.png",
        "4.png",
        "6.png"
    ];

    // Generate extra material preview images dynamically
    foreach ($extraMaterials as $extra) {
        $imgPath = $imgBasePath . $extra;
        $imgVersion = file_exists($imgPath) ? filemtime($imgPath) : time();
    ?>
        <div class="itemMaterial">
          <img src="<?= $imgPath ?>?v=<?= $imgVersion; ?>" alt="" aria-hidden="true">
        </div>
    <?php
    }
    ?>
  </div>
</section>

<?php
// Validate the JavaScript file before using filemtime()
$jsPath = '../../views/assets/js/home/sections/3-materials.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>"></script>
