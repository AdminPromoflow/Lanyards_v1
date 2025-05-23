<?php
$cssPath = '../../views/assets/css/global/customize-lanyard/sections/login.css';
$jsPath = '../../views/assets/js/customize-lanyard/sections/login.js';
$imgGoogle = '../../views/assets/img/global/login/google-icon.png';
$imgFacebook = '../../views/assets/img/global/login/facebook-icon.png';
$imgApple = '../../views/assets/img/global/login/apple-icon.png';

$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
$googleVersion = file_exists($imgGoogle) ? filemtime($imgGoogle) : time();
$facebookVersion = file_exists($imgFacebook) ? filemtime($imgFacebook) : time();
$appleVersion = file_exists($imgApple) ? filemtime($imgApple) : time();
?>

<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion ?>">

<section class="login2 section" id="login2">

  <h2 class="name-section-customize-lanyard">Login</h2>

  <div id="containers_boxes_login2" class="containers_boxes_login2">
    <label for="login2Email">Please enter your login details:</label>
    <input id="login2Email" type="text" name="" value="" placeholder="Please provide your email">
    <input id="login2Password" type="password" name="" value="" placeholder="and your password">
    <h3 id="password_forgotten2">Have you forgotten your password?</h3>

    <button id="enterLogin2" type="button" name="button">
      <strong class="containers_boxes_login_button">Login</strong>
    </button>


    <p id="openRegister2">No account yet? Register here.</p>
  </div>

</section>
<script src="<?= $jsPath ?>?v=<?= $jsVersion ?>"></script>
<?php include "../../views/global/customize-lanyard/sections/register.php"; ?>
