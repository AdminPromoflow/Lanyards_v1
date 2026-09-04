<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../assets/css/global/register.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section id="register" class="register" role="dialog" aria-modal="true" aria-labelledby="registerTitle" aria-hidden="true">
  <div id="containerRegister" class="containerRegister">
    <div class="headRegister">
      <div class="headRegisterContainer">
        <h1 id="registerTitle">Create account</h1>
      </div>
      <?php
      $closeImg = '../assets/img/global/register/close.png';
      $closeImgVersion = file_exists($closeImg) ? filemtime($closeImg) : time();
      ?>
      <button id="closeRegister" class="dialog-close" type="button" aria-label="Close registration">
        <img src="<?= $closeImg ?>?v=<?= $closeImgVersion; ?>" alt="">
      </button>
    </div>

    <div class="bodyRegister">
      <label for="nameRegister">Please provide your registration information:</label>
      <input type="text" id="nameRegister" autocomplete="name" placeholder="Name">
      <input type="email" id="emailRegister" autocomplete="email" placeholder="Email">
      <input type="password" id="passwordRegister" autocomplete="new-password" placeholder="Password">
      <label>
        <input id="acept_terms_conditions" type="checkbox" name="terms" required>
          I agree to the <a href="../../views/terms_conditions/index.php" target="_blank">Terms and Conditions</a>.
        </label>
      <button type="button" id="submitBtnRegister"><strong class="fontWeightButtonRegister">Register</strong></button>
    </div>

    <div class="footerRegister">
      <h3>or</h3>
      <div class="footerLoginOptionsContainer">
        <?php
        $googleIcon = '../../views/assets/img/global/login/google-icon.png';
        $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
        ?>
        <div id="registerWithGoogle1" class="footerLoginOptions">
          <!--<img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="">-->
        </div>

        <?php
        $facebookIcon = '../../views/assets/img/global/login/facebook-icon.png';
        $facebookIconVersion = file_exists($facebookIcon) ? filemtime($facebookIcon) : time();
        ?>
        <div id="registerWithFacebook1" class="footerLoginOptions">
          <!--<img src="<?= $facebookIcon ?>?v=<?= $facebookIconVersion; ?>" alt="">-->
        </div>
      </div>
      <button class="dialog-text-action" id="openLoginFromRegister" type="button">Already have an account? Log in</button>
    </div>
  </div>
</section>
