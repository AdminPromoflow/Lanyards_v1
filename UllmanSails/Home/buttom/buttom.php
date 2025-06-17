<?php
$cssTime = filemtime('../Home/buttom/buttom.css'); // ejemplo: '../Home/5.Video/video.css'
$jsTime = filemtime('');   // ejemplo: '../Home/5.Video/video.js'
?>
<link rel="stylesheet" href="../Home/buttom/buttom.css?v=<?= $cssTime ?>">
<section class="buttom">
  <div class="flex_items_buttom">
    <a class="link_buttom" href="../New_Sail_Quote/index.php">
      <div class="button_buttom button_buttom1">
        <h3>New Sail Quote</h3>
      </div>
    </a>
  </div>
  <div class="flex_items_buttom">
    <a class="link_buttom" href="../New_Repair_Quote/index.php">
      <div class=" button_buttom button_buttom2">
        <h3>Sail Repair Quote</h3>
      </div>
    </a>
  </div>

</section>
<script type="text/javascript">

</script>
