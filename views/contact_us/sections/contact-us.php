<?php
// Corregir rutas absolutas para evitar problemas con __DIR__
$cssFile = realpath(__DIR__ . '/../../views/assets/css/contac_us/sections/contact-us.css');
$jsFile = realpath(__DIR__ . '/../../views/assets/js/contact_us/sections/contact-us.js');

$cssVersion = $cssFile && file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = $jsFile && file_exists($jsFile) ? filemtime($jsFile) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="/views/assets/css/contac_us/sections/contact-us.css?v=<?= $cssVersion; ?>">

<section class="section_contact_us">
  <h1>Contact us</h1>
  <div class="container_contact_us">
    <div class="box_contact_us">
      <input type="text" name="name" id="nameContactUs" placeholder="Name" value="">
      <input type="email" name="email" id="emailContactUs" placeholder="Email address" value="">
      <input type="tel" name="phone" id="phoneContactUs" placeholder="Contact number" value="">
      <textarea name="message" id="messageContactUs" placeholder="Tell us how we can assist you..." rows="3" ></textarea>
    </div>
    <div class="box_contact_us">
      <div id="map3"></div>
    </div>
  </div>
  <button class="button_contact_us" id="button_contact_us" type="button">Submit</button>
</section>

<!-- JavaScript para el mapa -->
<script type="text/javascript">
  var map = L.map('map3').setView([50.859644, -1.320230], 10);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
  }).addTo(map);

  var marker = L.marker([50.859644, -1.320230]).addTo(map);
</script>

<!-- JavaScript -->
<script src="/views/assets/js/contact_us/sections/contact-us.js?v=<?= $jsVersion; ?>" type="text/javascript"></script>
