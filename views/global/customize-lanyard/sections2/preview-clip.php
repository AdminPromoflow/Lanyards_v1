<?php
function preview_clip_asset_version($relativePath) {
  $filePath = $_SERVER['DOCUMENT_ROOT'] . $relativePath;
  if (file_exists($filePath)) {
    return $relativePath . '?v=' . filemtime($filePath);
  }
  return $relativePath;
}
?>

<!-- HTML con los archivos versionados -->
<link rel="stylesheet" href="<?php echo preview_clip_asset_version('/views/assets/css/global/customize-lanyard/sections2/preview-clip.css'); ?>">

<section class="preview-clip-class" id="preview-clip-class">
  <div class="container-preview-clip">
    <div class="clip_one_end_10mm clip" id="clip">
      <img src="<?php echo preview_clip_asset_version('/views/assets/img/global/customize-lanyard/sections2/clips/one-end/dog_clip.png'); ?>" alt="">
    </div>
    <div class="clip_two_ends_30mm_left clips" >
      <img src="<?php echo preview_clip_asset_version('/views/assets/img/global/customize-lanyard/sections2/clips/one-end/dog_clip.png'); ?>" alt="">
    </div>
    <div class="clip_two_ends_30mm_right clips" >
      <img src="<?php echo preview_clip_asset_version('/views/assets/img/global/customize-lanyard/sections2/clips/one-end/dog_clip0.png'); ?>" alt="">
    </div>


  </div>
</section>

<script src="<?php echo preview_clip_asset_version('/views/assets/js/customize-lanyard/sections2/preview-clip.js'); ?>" type="text/javascript"></script>
