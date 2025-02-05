<?php
// Obtener rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../assets/css/home/sections/3-materials.css');
$jsFile = realpath(__DIR__ . '/../assets/js/home/sections/3-materials.js');

// Validar archivos antes de usar filemtime()
$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();

// Array con las imágenes a validar
$images = [
    'Material-1-Flat-Polyester.jpg',
    'Material-2-Tabular.jpg',
    'Material-3-Natural-Bamboo.jpg',
    'Material-4-Dye-sublimation.jpg',
    'Material-5-Dye-sub-Recycled-PET.jpg',
    'FlatPolyester.png',
    '2.png',
    '3.png',
    '4.png',
    '6.png'
];

// Crear un array con las versiones de las imágenes
$imageVersions = [];
foreach ($images as $img) {
    $imgPath = realpath(__DIR__ . "/../assets/img/home/3-materials/{$img}");
    $imageVersions[$img] = $imgPath && file_exists($imgPath) ? filemtime($imgPath) : time();
}
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
    <?php
    // Array con nombres de materiales
    $materials = [
        "Create your own lanyard",
        "Tubular",
        "RPET Polyester",
        "Dye Sub polyester",
        "Dye Sub RPET"
    ];

    // Generar dinámicamente los bloques de materiales
    for ($i = 0; $i < count($materials); $i++) {
        $imgName = $images[$i]; // Obtener nombre de la imagen correspondiente
        ?>
        <div class="containerTextMaterials">
          <div class="containerTextMaterialsBox">
            <img src="/assets/img/home/3-materials/<?= $imgName; ?>?v=<?= $imageVersions[$imgName]; ?>" alt="<?= $materials[$i]; ?>">
          </div>
          <div class="containerTextMaterialsBox">
            <h3 class="material-for-select"><?= $materials[$i]; ?></h3>
          </div>
          <div class="buttonMaterialsBox">
            <button class="openCustomizeLanyardFromMaterials" type="button">Select</button>
          </div>
        </div>
        <?php
    }
    ?>

    <!-- Renderizar imágenes individuales -->
    <?php for ($i = 5; $i < count($images); $i++): ?>
      <div class="itemMaterial">
        <img src="/assets/img/home/3-materials/<?= $images[$i]; ?>?v=<?= $imageVersions[$images[$i]]; ?>" alt="Material <?= $i - 4; ?>">
      </div>
    <?php endfor; ?>
  </div>
</section>

<!-- JavaScript -->
<script src="/assets/js/home/sections/3-materials.js?v=<?= $jsVersion; ?>"></script>
