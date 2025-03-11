<?php
// Validar CSS antes de usar filemtime()
$cssPath = '../../views/assets/css/global/login.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section id="login" class="login">

  <div id="containerLogin" class="containerLogin">
    <div class="headLogin">
      <div class="headLoginContaner">
          <h1>Login</h1>
      </div>
      <?php
      $closeImg = '../../views/assets/img/global/login/close.png';
      $closeImgVersion = file_exists($closeImg) ? filemtime($closeImg) : time();
      ?>
      <img id="closeLogin" src="<?= $closeImg ?>?v=<?= $closeImgVersion; ?>" alt="">
    </div>

    <div class="bodyLogin">
      <label for="emailLogin">Please enter your login details:</label>
      <input id="emailLogin" type="text" placeholder="Email">
      <input id="passwordLogin" type="password" placeholder="Password">
      <h3 id="password_forgotten">Have you forgotten your password?</h3>
      <button id="loginButton" type="button"><strong class="fontWeightButtonLogin">Login</strong></button>
    </div>

    <div class="footerLogin">
      <h3>or login with:</h3>
      <div class="footerLoginOptionsContainer">
        <?php
        $googleIcon = '../../views/assets/img/global/login/google-icon.png';
        $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
        ?>
        <div id="loginWithGoogle1" class="footerLoginOptions">
          <img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="">
        </div>

        <!-- Load the JS SDK asynchronously -->
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

        <?php
        $facebookIcon = '../../views/assets/img/global/login/facebook-icon.png';
        $facebookIconVersion = file_exists($facebookIcon) ? filemtime($facebookIcon) : time();
        ?>
        <div id="loginWithFacebook1" class="footerLoginOptions">
          <img src="<?= $facebookIcon ?>?v=<?= $facebookIconVersion; ?>" alt="">
        </div>
      </div>
      <h4 id="openRegisterFromLogin">No account yet? Register here.</h4>
    </div>
  </div>

</section>
