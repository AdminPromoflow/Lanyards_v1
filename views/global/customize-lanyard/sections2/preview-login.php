<?php
$cssPath = '../../views/assets/css/global/customize-lanyard/sections2/preview-login.css';
$jsPath = '../../views/assets/js/customize-lanyard/sections2/preview-login.js';
$imgPath = '../../views/assets/img/global/customize-lanyard/sections2/preview-login/avatars.png';

$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
$jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time();
$imgVersion = file_exists($imgPath) ? filemtime($imgPath) : time();
?>

<link rel="stylesheet" href="<?= $cssPath ?>?v=<?= $cssVersion ?>">

<section id="preview-login-container" class="preview-login-container">
  <div class="preview-login-container-image">
    <img id="preview-login-container-image" src="<?= $imgPath ?>?v=<?= $imgVersion ?>" alt="">
  </div>
</section>

<script src="<?= $jsPath ?>?v=<?= $jsVersion ?>" type="text/javascript"></script>
