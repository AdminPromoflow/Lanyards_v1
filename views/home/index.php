<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lanyards for you</title>

  <?php
  // Validar favicon
  $faviconPath = '../../views/assets/img/home/favicon.ico';
  $faviconVersion = file_exists($faviconPath) ? filemtime($faviconPath) : time();
  ?>
  <link rel="icon" href="<?= $faviconPath ?>?v=<?= $faviconVersion; ?>" type="image/x-icon">

  <!-- Include Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

  <?php
  // Validar CSS
  $cssPath = '../../views/assets/css/home/style.css';
  $cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
  ?>
  <link rel="stylesheet" type="text/css" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

</head>
<body>
  <section>
    <?php // include "../../views/global/test_alert.php"; ?>
    <?php include "../../views/global/charging.php"; ?>

    <!-- Background section -->
    <div class="background">

      <!-- Container for content -->
      <div class="container" id="dad-customize-lanyard">

        <!-- Content section -->
        <div class="content">
          <div id="activate-customize-lanyards">
            <?php  include "../../views/global/customize-lanyard/customize-lanyard.php" ?>
          </div>

          <!-- Include the menu component -->
          <?php include "../../views/global/menu.php"; ?>
          <div class="bgLanyards">

            <!-- Include the slider component for the index page -->
            <?php include "../../views/home/sections/1-slider.php"; ?>
            <?php include "../../views/home/sections/2-most_popular_lanyard.php"; ?>
            <?php //include "../../views/home/sections/2-choose-create-lanyard.php"; ?>

            <?php include "../../views/home/sections/3-materials.php"; ?>
            <?php include "../../views/home/sections/4-about-us.php"; ?>
            <?php include "../../views/home/sections/contact-us.php"; ?>
            <?php include "../../views/global/footer.php"; ?>

          </div>
        </div>

        <!-- Include the login component -->
        <?php include "../../views/global/login.php"; ?>
        <?php include "../../views/global/password_forgotten.php"; ?>

        <!-- Include the register component -->
        <?php include "../../views/global/register.php"; ?>

      </div>
    </div>
  </section>

  <?php
  // Validar archivos JavaScript
  $jsApp = '../../views/assets/js/home/app.js';
  $jsLogin = '../../views/assets/js/global/login.js';
  $jsRegister = '../../views/assets/js/global/register.js';

  $jsAppVersion = file_exists($jsApp) ? filemtime($jsApp) : time();
  $jsLoginVersion = file_exists($jsLogin) ? filemtime($jsLogin) : time();
  $jsRegisterVersion = file_exists($jsRegister) ? filemtime($jsRegister) : time();
  ?>

  <!-- Add the JS files with versioning -->
  <script src="<?= $jsApp ?>?v=<?= $jsAppVersion; ?>"></script>
  <script src="<?= $jsLogin ?>?v=<?= $jsLoginVersion; ?>"></script>
  <script src="<?= $jsRegister ?>?v=<?= $jsRegisterVersion; ?>"></script>

</body>
</html>
