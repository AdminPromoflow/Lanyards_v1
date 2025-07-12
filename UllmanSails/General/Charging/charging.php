<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../General/Charging/charging.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<div class="charging_background" id="charging_background">
  <?php
    $chargingGif = '../General/Charging/Img/charge.gif';
    $chargingGifVersion = file_exists($chargingGif) ? filemtime($chargingGif) : time();
  ?>
  <img src="<?= $chargingGif ?>?v=<?= $chargingGifVersion; ?>" alt="Loading...">
  <p>Please wait, we are loading the data.</p>
</div>

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../General/Charging/charging.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript" defer></script>
