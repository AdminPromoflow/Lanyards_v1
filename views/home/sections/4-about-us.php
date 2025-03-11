<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/home/sections/4-about-us.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/home/sections/4-about-us.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- Link to external stylesheet for styling the section -->
<link rel="stylesheet" href="/views/assets/css/home/sections/4-about-us.css?v=<?= $cssVersion; ?>">

<section class="section_about_us">
  <!-- Title section for ABOUT US -->
  <div class="titleAboutUs">
    <h3>About us</h3>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBoxAboutUs">

    <!-- Box for first individual (Crafting Unique Lanyards) -->
    <div class="boxAboutUs">
      <h3>Crafting Unique Lanyards</h3>
      <p>We are a company dedicated to creating bespoke lanyards from scratch,
        combining quality materials with unique designs. Our goal is to provide
        personalised solutions that meet your needs while ensuring fast service
        and exceptional attention to detail for every project.</p>
    </div>

    <!-- Box for second individual (Elevating Your Brand) -->
    <div class="boxAboutUs">
      <h3>Elevating Your Brand</h3>
      <p>With a focus on delivering the most popular lanyard styles, we help elevate
      your brand or event. Our experienced team is committed to innovation and
      functionality, offering customised products that reflect professionalism,
      enhance visibility, and leave a lasting impression.</p>
    </div>

  </div>

  <!-- Explore More Button -->
  <button type="button" onclick="window.location.href='/views/about_us/index.php'">Explore More</button>
</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/home/sections/4-about-us.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
