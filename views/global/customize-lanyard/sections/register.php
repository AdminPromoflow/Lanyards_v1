<?php
$cssPath = '../../views/assets/css/global/customize-lanyard/sections/register.css';
$jsPath = '../../views/assets/js/customize-lanyard/sections/register.js';
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

<section class="register2" id="register2">
  <h2 class="name-section-customize-lanyard">Register</h2>
  <div id="containers_boxes_register2" class="containers_boxes_register2">
    <label for="">Please provide your registration information:</label>
    <input id="register2Name" type="text" name="" value="" placeholder="Please provide your name">
    <input id="register2Email" type="text" name="" value="" placeholder="Please provide your email">
    <input id="register2Password" type="text" name="" value="" placeholder="and your password">
    <button id="enterRegister2" type="button" name="button">
      <strong class="containers_boxes_register_button">Register</strong>
    </button>

    <div class="register2OptionsContainer">
      <div id="registerWithGoogle2" class="register2Options">
        <img src="<?= $imgGoogle ?>?v=<?= $googleVersion ?>" alt="">
      </div>
    <!--  <div id="registerWithFacebook2" class="register2Options">
        <img src="<?= $imgFacebook ?>?v=<?= $facebookVersion ?>" alt="">
      </div>
      <div id="registerWithApple2" class="register2Options">
        <img src="<?= $imgApple ?>?v=<?= $appleVersion ?>" alt="">
      </div>-->
    </div>
    <p id="openLogin2">Already have an account? Log in here.</p>
  </div>
</section>

<script src="<?= $jsPath ?>?v=<?= $jsVersion ?>"></script>
