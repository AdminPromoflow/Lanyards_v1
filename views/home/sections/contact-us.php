<link rel="stylesheet" href="../../views/assets/css/home/sections/contact-us.css?v=<?= filemtime(__DIR__ . '/../../views/assets/css/home/sections/contact-us.css'); ?>">

<style media="screen">


</style>
<section class="section_contact_us">
  <h1 >Contact us</h1>
  <div class="containers_contact_us">
    <div class="box_contact_us">
      <h3>Your contact info</h3>
      <input type="text" name="" placeholder="Name" value="">
      <input type="text" name="" placeholder="Email address" value="">
      <input type="text" name="" placeholder="Contact number" value="">
      <textarea name="name" placeholder="Please share your experiences" rows="3" cols="80"></textarea>
      <button class="button_contact_us" id="button_contact_us_from_home" type="button" name="button">Submit</button>
    </div>
    <div class="box_contact_us">
      <div id="map3"></div>
    </div>
  </div>

</section>

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

<script src="../../views/assets/js/home/sectons/contact-us.js?v=<?= filemtime(__DIR__ . '/../../views/assets/js/home/sectons/contact-us.js'); ?>" type="text/javascript"></script>
