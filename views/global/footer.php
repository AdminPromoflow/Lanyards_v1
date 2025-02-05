<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../../views/assets/css/global/footer.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<section class="container_footer">
  <div class="box_footer">
    <div class="social_media_footer">
      <?php
      $facebookIcon = '../../views/assets/img/global/login/facebook-icon.png';
      $facebookIconVersion = file_exists($facebookIcon) ? filemtime($facebookIcon) : time();
      ?>
      <div class="box_media">
        <img src="<?= $facebookIcon ?>?v=<?= $facebookIconVersion; ?>" alt="Facebook">
      </div>

      <?php
      $googleIcon = '../../views/assets/img/global/login/google-icon.png';
      $googleIconVersion = file_exists($googleIcon) ? filemtime($googleIcon) : time();
      ?>
      <div class="box_media">
        <img src="<?= $googleIcon ?>?v=<?= $googleIconVersion; ?>" alt="Google">
      </div>

      <?php
      $appleIcon = '../../views/assets/img/global/login/apple-icon.png';
      $appleIconVersion = file_exists($appleIcon) ? filemtime($appleIcon) : time();
      ?>
      <div class="box_media">
        <img src="<?= $appleIcon ?>?v=<?= $appleIconVersion; ?>" alt="Apple">
      </div>
    </div>

    <div class="terms_conditions_footer">
      <p>Terms and conditions.</p>
    </div>
  </div>
</section>

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../../views/assets/js/global/footer.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript"></script>
