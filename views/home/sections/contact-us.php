<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/home/sections/contact-us.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/home/sections/contact-us.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="/views/assets/css/home/sections/contact-us.css?v=<?= $cssVersion; ?>">

<section class="section_contact_us">
  <div class="contact-heading">
    <span class="section-kicker">Talk to our team</span>
    <h2>Tell us what you need</h2>
    <p class="section-intro">Share the basics of your project and we will help you find the right lanyard setup.</p>
  </div>
  <div class="container_contact_us">
    <form class="box_contact_us contact-form" id="homeContactForm" novalidate>
      <label for="nameContactUsHome">Name</label>
      <input type="text" name="name" id="nameContactUsHome" autocomplete="name" placeholder="Your name" required>
      <label for="emailContactUsHome">Email address</label>
      <input type="email" name="email" id="emailContactUsHome" autocomplete="email" placeholder="you@company.com" required>
      <label for="phoneContactUsHome">Contact number</label>
      <input type="tel" name="phone" id="phoneContactUsHome" autocomplete="tel" inputmode="tel" placeholder="Your phone number" required>
      <label for="messageContactUsHome">How can we help?</label>
      <textarea name="message" id="messageContactUsHome" placeholder="Tell us about your lanyards, quantity and deadline..." rows="5" required></textarea>
      <button class="button_contact_us" id="button_contact_us_from_home" type="submit">Send enquiry</button>
      <p id="contactFormStatus" class="contact-form-status" role="status" aria-live="polite"></p>
    </form>
    <div class="box_contact_us">
      <div id="map3" aria-label="Map showing our location"></div>
      <div class="contact-details">
        <strong>Hamble, Southampton</strong>
        <span>United Kingdom</span>
      </div>
    </div>
  </div>
</section>

<!-- JavaScript para el mapa -->
<script type="text/javascript">
  var map = L.map('map3').setView([50.859644, -1.320230], 10);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    tileSize: 256
  }).addTo(map);

  var marker = L.marker([50.859644, -1.320230]).addTo(map);

  window.addEventListener('load', function () {
    window.setTimeout(function () { map.invalidateSize(); }, 0);
  });

  if ('ResizeObserver' in window) {
    new ResizeObserver(function () { map.invalidateSize(); }).observe(document.getElementById('map3'));
  }
</script>

<!-- JavaScript -->
<script src="/views/assets/js/home/sections/contact-us.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
