<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../../views/assets/css/global/test_alert.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<div class="inicio_sesion" id="inicio_sesion">
  <div class="datos">
    <p>This is a trial version; only authorised personnel are allowed to access.</p>
    <label for="email_text_website">Enter your email</label>
    <input id="email_text_website" type="email" placeholder="Enter your email">

    <label for="password_text_website">Enter your password</label>
    <input id="password_text_website" type="password" placeholder="Enter your password">

    <button id="enter_text_website" type="button">Enter</button>
  </div>
</div>

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../../views/assets/js/global/test_alert.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript"></script>
