<?php
function asset_version_price($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$cssFile_price = "../../views/assets/css/global/customize-lanyard/sections/price.css";
$jsFile_price = "../../views/assets/js/customize-lanyard/sections/price.js";
?>

<link rel="stylesheet" href="<?= $cssFile_price ?>?v=<?= asset_version_price($cssFile_price) ?>">

<section class="price">
  <div class="priceNumber">
    <h3>Cost per Lanyard: </h3>
    <h3 id="pricePerLanyard">£3.45</h3>
  </div>
  <div class="priceAmount">
    <h3>Amount</h3>
    <input id="amountLanyardsRange" min="1" max="25000" type="range" name="" value="1000">
    <input id="amountLanyards" type="text" name="" value="1000">
  </div>
</section>

<script src="<?= $jsFile_price ?>?v=<?= asset_version_price($jsFile_price) ?>" type="text/javascript"></script>
