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

  <title>Lanyards for you</title>

  <!-- Add the CSS files with versioning -->
  <link rel="stylesheet" type="text/css" href="../assets/css/home/style.css?v=<?php echo filemtime('../assets/css/home/style.css'); ?>">

</head>
<body>
  <section>
    <?php  include "../../views/global/test_alert.php"; ?>
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
            <?php
            // Slider
            $file_slider = "../../views/home/sections/1-slider.php";
            $timestamp_slider = filemtime($file_slider);
            include $file_slider . "?v=" . $timestamp_slider;
            ?>

            <?php
            // Most Popular Lanyard
            $file_popular = "../../views/home/sections/2-most_popular_lanyard.php";
            $timestamp_popular = filemtime($file_popular);
            include $file_popular . "?v=" . $timestamp_popular;
            ?>

            <?php
            // Materials
            $file_materials = "../../views/home/sections/3-materials.php";
            $timestamp_materials = filemtime($file_materials);
            include $file_materials . "?v=" . $timestamp_materials;
            ?>

            <?php
            // About Us
            $file_about_us = "../../views/home/sections/4-about-us.php";
            $timestamp_about_us = filemtime($file_about_us);
            include $file_about_us . "?v=" . $timestamp_about_us;
            ?>

            <?php
            // Contact Us
            $file_contact = "../../views/home/sections/contact-us.php";
            $timestamp_contact = filemtime($file_contact);
            include $file_contact . "?v=" . $timestamp_contact;
            ?>

            <?php
            // Footer
            $file_footer = "../../views/global/footer.php";
            $timestamp_footer = filemtime($file_footer);
            include $file_footer . "?v=" . $timestamp_footer;
            ?>


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
