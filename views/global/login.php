<?php
// Validar CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/global/login.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section id="login" class="login" role="dialog" aria-modal="true" aria-labelledby="loginTitle" aria-hidden="true">

  <div id="containerLogin" class="containerLogin">
    <div class="headLogin">
      <div class="headLoginContaner">
        <h1 id="loginTitle">Log in</h1>
      </div>
      <?php
      $closeImg = '../../views/assets/img/global/login/close.png';
      $closeImgVersion = file_exists($closeImg) ? filemtime($closeImg) : time();
      ?>
      <button id="closeLogin" class="dialog-close" type="button" aria-label="Close login">
        <img src="<?= $closeImg ?>?v=<?= $closeImgVersion; ?>" alt="">
      </button>
    </div>

    <div class="bodyLogin">
      <label for="emailLogin">Please enter your login details:</label>
      <input id="emailLogin" type="email" autocomplete="email" placeholder="Email">
      <input id="passwordLogin" type="password" autocomplete="current-password" placeholder="Password">
      <button class="dialog-text-action" id="password_forgotten" type="button">Forgot your password?</button>
      <button id="loginButton" type="button"><strong class="fontWeightButtonLogin">Log in</strong></button>
    </div>

    <div class="footerLogin">
      <h3>or </h3>
      <div class="footerLoginOptionsContainer">
        <?php
        $googleIcon = '../../views/assets/img/global/login/google-icon.png';
        $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
        ?>
        <div id="loginWithGoogle1" class="footerLoginOptions">
        <!--  <img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="">-->
        </div>
      </div>
      <button class="dialog-text-action" id="openRegisterFromLogin" type="button">No account yet? Create one</button>
    </div>
  </div>

</section>
