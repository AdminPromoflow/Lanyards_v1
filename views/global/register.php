<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../assets/css/global/register.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section id="register" class="register">
  <div id="containerRegister" class="containerRegister">
    <div class="headRegister">
      <div class="headRegisterContainer">
        <h1>Register</h1>
      </div>
      <?php
      $closeImg = '../assets/img/global/register/close.png';
      $closeImgVersion = file_exists($closeImg) ? filemtime($closeImg) : time();
      ?>
      <img id="closeRegister" src="<?= $closeImg ?>?v=<?= $closeImgVersion; ?>" alt="">
    </div>

    <div class="bodyRegister">
      <label for="nameRegister">Please provide your registration information:</label>
      <input type="text" id="nameRegister" placeholder="Name">
      <input type="text" id="emailRegister" placeholder="Email">
      <input type="password" id="passwordRegister" placeholder="Password">
      <label>
        <input id="acept_terms_conditions" type="checkbox" name="terms" required>
          I agree to the <a href="../../views/terms_conditions/index.php" target="_blank">Terms and Conditions</a>.
        </label>
      <button type="button" id="submitBtnRegister"><strong class="fontWeightButtonRegister">Register</strong></button>
    </div>

    <div class="footerRegister">
      <h3>or register with:</h3>
      <div class="footerLoginOptionsContainer">
        <?php
        $googleIcon = '../../views/assets/img/global/login/google-icon.png';
        $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
        ?>
        <div id="registerWithGoogle1" class="footerLoginOptions">
          <img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="">
        </div>

        <?php
        $facebookIcon = '../../views/assets/img/global/login/facebook-icon.png';
        $facebookIconVersion = file_exists($facebookIcon) ? filemtime($facebookIcon) : time();
        ?>
        <div id="registerWithFacebook1" class="footerLoginOptions">
          <img src="<?= $facebookIcon ?>?v=<?= $facebookIconVersion; ?>" alt="">
        </div>
      </div>
      <h4 id="openLoginFromRegister">Already have an account? Log in here.</h4>
    </div>
  </div>
</section>
