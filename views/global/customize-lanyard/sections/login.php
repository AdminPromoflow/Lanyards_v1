<?php
// Validar CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/global/login.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section id="login2" class="login2 section">

  <div id="containerLogin_customize" class="containerLogin">
    <div class="headLogin">
      <div class="headLoginContaner">
          <h1>Login</h1>
      </div>
    </div>

    <div class="bodyLogin">
      <label for="emailLogin">Please enter your login details:</label>
      <input id="emailLogin_customize" type="text" placeholder="Email">
      <input id="passwordLogin_customize" type="password" placeholder="Password">
      <h3 id="password_forgotten_customize">Have you forgotten your password?</h3>
      <button id="loginButton_customize" type="button"><strong class="fontWeightButtonLogin">Login</strong></button>
    </div>

    <div class="footerLogin">
      <h3>or login with:</h3>
      <div class="footerLoginOptionsContainer">
        <?php
        $googleIcon = '../../views/assets/img/global/login/google-icon.png';
        $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
        ?>
        <div id="loginWithGoogle_customize" class="footerLoginOptions">
          <img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="">
        </div>



      </div>
    </div>
  </div>

</section>


<!--<script src="../../views/assets/js/customize-lanyard/sections/login_customize.js"></script>-->
