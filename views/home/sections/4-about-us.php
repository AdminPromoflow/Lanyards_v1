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
  <div class="titleAboutUs">
    <span class="section-kicker">Why choose us</span>
    <h2>Made with care, from idea to delivery</h2>
    <p class="section-intro">Practical guidance, flexible customisation and careful production for every order.</p>
  </div>

  <!-- Group container for about us boxes -->
  <div class="groupBoxAboutUs">

    <!-- Box for first individual (Crafting Unique Lanyards) -->
    <article class="boxAboutUs">
      <span class="about-number">01</span>
      <h3>Crafting Unique Lanyards</h3>
      <p>We are a company dedicated to creating bespoke lanyards from scratch,
        combining quality materials with unique designs. Our goal is to provide
        personalised solutions that meet your needs while ensuring fast service
        and exceptional attention to detail for every project.</p>
    </article>

    <!-- Box for second individual (Elevating Your Brand) -->
    <article class="boxAboutUs">
      <span class="about-number">02</span>
      <h3>Elevating Your Brand</h3>
      <p>With a focus on delivering the most popular lanyard styles, we help elevate
      your brand or event. Our experienced team is committed to innovation and
      functionality, offering customised products that reflect professionalism,
      enhance visibility, and leave a lasting impression.</p>
    </article>

  </div>

  <!-- Explore More Button -->
  <a class="about-link" href="/views/about_us/index.php">Learn more about us</a>
</section>

<!-- Link to external JavaScript for additional functionality -->
<script src="/views/assets/js/home/sections/4-about-us.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
