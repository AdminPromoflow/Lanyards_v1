<?php
// Validar el archivo CSS antes de usarlo
$cssPath = '../../views/assets/css/global/footer.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
?>

<!-- CSS -->
<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion; ?>">

<footer class="container_footer">
  <div class="box_footer">
    <div class="footer-brand">
      <strong>Lanyards For You</strong>
      <span>Custom made for the way you work.</span>
    </div>
    <nav class="terms_conditions_footer" aria-label="Footer navigation">
      <a href="../../views/about_us/index.php">About us</a>
      <a href="../../views/contact_us/index.php">Contact</a>
      <a href="../../views/terms_conditions/index.php">Terms and conditions</a>
    </nav>
    <p class="footer-copyright">&copy; <?= date('Y'); ?> Lanyards For You</p>
  </div>
</footer>

<?php
// Validar el archivo JS antes de usarlo
$jsPath = '../../views/assets/js/global/footer.js';
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
?>

<!-- JavaScript -->
<script src="<?= $jsPath ?>?v=<?= $jsVersion; ?>" type="text/javascript"></script>
