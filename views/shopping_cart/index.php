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

  <?php
  // Validar favicon
  $faviconPath = '../../views/assets/img/home/favicon.ico';
  $faviconVersion = file_exists($faviconPath) ? filemtime($faviconPath) : time();
  ?>

  <link rel="icon" href="<?= $faviconPath ?>?v=<?= $faviconVersion; ?>" type="image/x-icon">


  <!-- Add the CSS file -->
  <link rel="stylesheet" type="text/css" href="../assets/css/home/style.css">

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

          <!-- Include the menu component -->
          <?php include "../../views/global/menu.php" ?>
          <div class="bgLanyards">

          <!-- Include the slider component for the index page -->
            <?php include "../../views/shopping_cart/sections/shopping_cart.php" ?>
            <?php include "../../views/global/footer.php" ?>

          </div>

          <!-- Include the login component -->
          <?php include "../../views/global/login.php"; ?>
          <?php include "../../views/global/password_forgotten.php"; ?>

          <!-- Include the register component -->
          <?php include "../../views/global/register.php"; ?>

        </div>
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

  <!-- Add the JS file -->
  <script src="<?= $jsApp ?>?v=<?= $jsAppVersion; ?>"></script>
  <script src="<?= $jsLogin ?>?v=<?= $jsLoginVersion; ?>"></script>
  <script src="<?= $jsRegister ?>?v=<?= $jsRegisterVersion; ?>"></script>

</body>
</html>
