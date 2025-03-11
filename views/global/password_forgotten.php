<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../../views/assets/css/global/password_forgotten.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<div id="password_forgotten_background" class="password_forgotten_background">
  <div class="password_forgotten_container">
    <div class="password_forgotten_head">
      <h3>Reset Your Password</h3>
      <?php
      $closeImg = '../../views/assets/img/global/password_forgotten/close.png';
      $closeImgVersion = file_exists($closeImg) ? filemtime($closeImg) : time();
      ?>
      <img id="password_forgotten_close" src="<?= $closeImg ?>?v=<?= $closeImgVersion; ?>" alt="">
    </div>
    <div class="password_forgotten_body">
      <label for="password_forgotten_email">Please enter your email</label>
      <input id="password_forgotten_email" type="text" placeholder="Email">
      <button id="password_forgotten_button" type="button">Recover password</button>
    </div>
  </div>
</div>

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../../views/assets/js/global/password_forgotten.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript"></script>
