<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/my_lanyards/sections/my_lanyards.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/my_lanyards/sections/my_lanyards.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- Link to external stylesheet for styling the section -->
<link rel="stylesheet" href="/views/assets/css/my_lanyards/sections/my_lanyards.css?v=<?= $cssVersion; ?>">

<section class="section_my_lanyards">
  <!-- Title section for ABOUT US -->
  <div class="title_my_lanyards">
    <h3>About us</h3>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBox_my_lanyards">

    <!-- Box for first individual (Crafting Unique Lanyards) -->
    <div class="box_my_lanyards">
      <h3>Crafting Unique Lanyards</h3>
      <p>We are a company dedicated to creating bespoke lanyards from scratch,
        combining quality materials with unique designs. Our goal is to provide
        personalised solutions that meet your needs while ensuring fast service
        and exceptional attention to detail for every project.</p>
    </div>

    <!-- Box for second individual (Elevating Your Brand) -->
    <div class="box_my_lanyards">
      <h3>Elevating <br> Your Brand</h3>
      <p>With a focus on delivering the most popular lanyard styles, we help elevate
      your brand or event. Our experienced team is committed to innovation and
      functionality, offering customised products that reflect professionalism,
      enhance visibility, and leave a lasting impression.</p>
    </div>

  </div>

  <!-- Explore More Button -->
  <button type="button" onclick="window.location.href='/views/my_lanyards/index.php'">Explore More</button>
</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/my_lanyards/sections/my_lanyards.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
