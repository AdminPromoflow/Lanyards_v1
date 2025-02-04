<link rel="stylesheet" href="../../views/assets/css/home/sections/contact-us.css?v=<?= filemtime(__DIR__ . '/../../views/assets/css/home/sections/contact-us.css'); ?>">

<!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>-->
<section class="section_contact_us">
  <div class="containers_contact_us">
    <div class="box_contact_us">
       <label for="">Name</label>
       <input type="text" name="" value="">

       <label for="">Email</label>
       <input type="text" name="" value="">

       <label for="">How can we help you?</label>
       <input type="text" name="" value="">

       <button class="button_contact_us" type="button" name="button">Send</button>
    </div>
  </div>
  <div class="containers_contact_us">
    <!--<div id="map"></div>-->
  </div>
</section>

<script src="../../views/assets/js/home/sectons/contact-us.js?v=<?= filemtime(__DIR__ . '/../../views/assets/js/home/sectons/contact-us.js'); ?>" type="text/javascript"></script>



<script type="text/javascript">
    var map = L.map('map').setView([50.859644, -2.320230], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attributionControl: false,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(map);



    var marker1 = L.marker([50.39603448075243, -4.041274087411246]).addTo(map);
    var marker2 = L.marker([50.841011546296706, -1.3502185309655552]).addTo(map);
</script>
