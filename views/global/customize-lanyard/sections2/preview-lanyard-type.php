<?php
// Function to get file modification time and append it as a query parameter
function preview_lanyard_type_filemtime($file_path) {
    // Check if the file exists before trying to get its modification time
    if (file_exists($file_path)) {
        return filemtime($file_path);
    }
    return false; // Return false if the file doesn't exist
}
?>

<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-10mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-10mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-15mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-15mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-20mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-20mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-25mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-25mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-30mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-30mm.css'); ?>">


<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-10mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-10mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-15mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-15mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-20mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-20mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-25mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-25mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-30mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/two-side-30mm.css'); ?>">


<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-10mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-10mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-15mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-15mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-20mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-20mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-25mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-25mm.css'); ?>">
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-30mm.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/templates/one-side-with-attachment-30mm.css'); ?>">


<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections2/preview-lanyard-type.css?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/css/global/customize-lanyard/sections2/preview-lanyard-type.css'); ?>">

<section id="preview-lanyard-type-container" class="preview-lanyard-type">


  <?php include "../../views/global/customize-lanyard/sections2/Templates/one-side-10mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/one-side-15mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/one-side-20mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/one-side-25mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/one-side-30mm.php" ?>

  <?php include "../../views/global/customize-lanyard/sections2/Templates/two-side-30mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/two-side-25mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/two-side-20mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/two-side-15mm.php" ?>
  <?php include "../../views/global/customize-lanyard/sections2/Templates/two-side-10mm.php" ?>


</section>

<script src="../../views/assets/js/customize-lanyard/sections2/preview-lanyard-type.js?v=<?php echo preview_lanyard_type_filemtime('../../views/assets/js/customize-lanyard/sections2/preview-lanyard-type.js'); ?>" charset="utf-8"></script>
