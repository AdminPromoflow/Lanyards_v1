<?php
$cssPath = '../../views/assets/css/global/customize-lanyard/sections/register.css';
$jsPath = '../../views/assets/js/customize-lanyard/sections/register.js';
$imgGoogle = '../../views/assets/img/global/login/google-icon.png';

$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
$googleVersion = file_exists($imgGoogle) ? filemtime($imgGoogle) : time();

?>

<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion ?>">

<section class="register2" id="register2">
  <h2 class="name-section-customize-lanyard">Register</h2>
  <div id="containers_boxes_register2" class="containers_boxes_register2">
    <label for="register2Name">Please provide your registration information:</label>
    <input id="register2Name" type="text" name="" value="" placeholder="Please provide your name">
    <input id="register2Email" type="text" name="" value="" placeholder="Please provide your email">
    <input id="register2Password" type="password" name="" value="" placeholder="and your password">
    <label class="label_acept_terms_conditions2">
    <input id="acept_terms_conditions2" type="checkbox" name="terms" required>
      I agree to the <a href="../../views/terms_conditions/index.php" target="_blank">Terms and Conditions</a>.
    </label>
    <button id="enterRegister2" type="button" name="button">
      <strong class="containers_boxes_register_button">Register</strong>
    </button>


    <p id="openLogin2">Already have an account? Log in here.</p>
  </div>
</section>

<script src="<?= $jsPath ?>?v=<?= $jsVersion ?>"></script>
