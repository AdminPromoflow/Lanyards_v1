<?php
$cssTime = filemtime('../Home/5.Video/video.css');
$jsTime = filemtime('../Home/5.Video/video.js');
?>

<link rel="stylesheet" href="../Home/5.Video/video.css?v=<?= $cssTime ?>">
<section class="videoHome">
  <video id="videoHover" src="../../UllmanSails/Home/5.Video/videoUpdated.mp4" controls muted playsinline></video>

  <!--
  <video  style="position: relative; left: 50%; transform: translateX(-50%); width: calc(68vw + 20px); height: auto" controls>
      <source src="5.Video/Image/Video.mp4" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
  </video>
  -->
</section>

<script src="../Home/5.Video/video.js?v=<?= $jsTime ?>" type="text/javascript"></script>
