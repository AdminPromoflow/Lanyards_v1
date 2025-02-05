<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lanyards for you</title>

  <?php
  // Validar el favicon antes de usarlo
  $faviconPath = '../../views/assets/img/contact_us/favicon.ico';
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
  // Validar archivos CSS antes de usarlos
  $cssHome = '../../views/assets/css/home/style.css';
  $cssLogin = '../../views/assets/css/global/login.css';
  $cssRegister = '../../views/assets/css/global/register.css';

  $cssHomeVersion = file_exists($cssHome) ? filemtime($cssHome) : time();
  $cssLoginVersion = file_exists($cssLogin) ? filemtime($cssLogin) : time();
  $cssRegisterVersion = file_exists($cssRegister) ? filemtime($cssRegister) : time();
  ?>
  <link rel="stylesheet" type="text/css" href="<?= $cssHome ?>?v=<?= $cssHomeVersion; ?>">
  <link rel="stylesheet" href="<?= $cssLogin ?>?v=<?= $cssLoginVersion; ?>">
  <link rel="stylesheet" href="<?= $cssRegister ?>?v=<?= $cssRegisterVersion; ?>">

</head>
<body>
  <section>
    <?php // include "../../views/global/test_alert.php" ?>
    <?php include "../../views/global/charging.php"; ?>

    <!-- Background section -->
    <div class="background">

      <!-- Container for content -->
      <div class="container" id="dad-customize-lanyard">

        <!-- Content section -->
        <div class="content">
          <?php include "../../views/global/customize-lanyard/customize-lanyard.php"; ?>

          <!-- Include the menu component -->
          <?php include "../../views/global/menu.php"; ?>
          <div class="bgLanyards">

            <!-- Include the contact us section -->
            <?php include "../../views/contact_us/sections/contact-us.php"; ?>
            <?php include "../../views/global/footer.php"; ?>

          </div>
        </div>

        <!-- Include the login component -->
        <?php include "../../views/global/login.php"; ?>

        <!-- Include the register component -->
        <?php include "../../views/global/register.php"; ?>

      </div>
    </div>
  </section>

  <?php
  // Validar archivos JS antes de usarlos
  $jsLogin = '../../views/assets/js/global/login.js';
  $jsApp = '../../views/assets/js/home/app.js';

  $jsLoginVersion = file_exists($jsLogin) ? filemtime($jsLogin) : time();
  $jsAppVersion = file_exists($jsApp) ? filemtime($jsApp) : time();
  ?>

  <!-- Add the JS file -->
  <script src="<?= $jsLogin ?>?v=<?= $jsLoginVersion; ?>"></script>
  <script src="<?= $jsApp ?>?v=<?= $jsAppVersion; ?>"></script>

</body>
</html>
