<?php
$basePath = '../Home/5.Video/';
$cssTime = filemtime($basePath . 'video.css');
$jsTime = filemtime($basePath . 'video.js');
?>

<link rel="stylesheet" href="<?= $basePath ?>video.css?v=<?= $cssTime ?>">

<section class="videoHome">
  <video id="videoHover" src="<?= $basePath ?>video.mp4" controls muted playsinline></video>
</section>

<script src="<?= $basePath ?>video.js?v=<?= $jsTime ?>" type="text/javascript"></script>
