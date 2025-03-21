<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../views/assets/css/terms_conditions/style.css">
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

            <div class="bgLanyards">
              <?php include '../../views/terms_conditions/sections/terms_conditions.php'; ?>


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
  </body>
</html>
