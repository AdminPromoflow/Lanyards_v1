<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../views/assets/img/home/favicon.ico" type="image/x-icon">

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
  <title>Lanyards for you</title>

  <!-- Add the CSS files with versioning -->
  <link rel="stylesheet" type="text/css" href="../assets/css/home/style.css?v=<?php echo filemtime('../assets/css/home/style.css'); ?>">

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
          <?php  include "../../views/global/customize-lanyard/customize-lanyard.php" ?>

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

  <!-- Add the JS files with versioning -->
  <script src="../assets/js/home/app.js?v=<?php echo filemtime('../assets/js/home/app.js'); ?>"></script>
  <script src="../assets/js/global/login.js?v=<?php echo filemtime('../assets/js/global/login.js'); ?>"></script>
  <script src="../assets/js/global/register.js?v=<?php echo filemtime('../assets/js/global/register.js'); ?>"></script>

</body>
</html>
