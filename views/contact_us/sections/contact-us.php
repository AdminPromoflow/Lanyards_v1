<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../../views/assets/css/contact_us/sections/contact-us.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section class="section_contact_us">
  <h1>Contact us</h1>
  <div class="container_contact_us">
    <div class="box_contact_us">
      <input type="text" placeholder="Name">
      <input type="text" placeholder="Email address">
      <input type="text" placeholder="Contact number">
      <textarea placeholder="Tell us how we can assist you..." rows="3"></textarea>
    </div>
    <div class="box_contact_us">
      <div id="map2"></div>
    </div>
  </div>
  <button class="button_contact_us" id="button_contact_us" type="button">Submit</button>
</section>

<script type="text/javascript">
  var map = L.map('map2').setView([50.859644, -1.320230], 10);
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

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../../views/assets/js/contact_us/sections/contact_us.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript"></script>
