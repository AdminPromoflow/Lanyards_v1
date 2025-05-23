<?php
// Obtener la última fecha de modificación de los archivos
$cssPath = '../../views/assets/css/global/customize-lanyard/sections/accessories.css';
$jsPath  = '../../views/assets/js/customize-lanyard/sections/accessories.js';

$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();
$jsVersion  = file_exists($jsPath)  ? filemtime($jsPath)  : time();
?>
<link rel="stylesheet" href="<?php echo $cssPath . '?v=' . $cssVersion; ?>">

<section class="accessoriesSection  section ">
  <h2 class="name-section-customize-lanyard">Accessories</h2>
  <br>
  <p>Select one accessories</p>
  <br>

  <div id="containers_boxes_accessories" class="containers_boxes_accessories">

    <div class="container_boxes_accessories">
      <h3 class="">None</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/none.png" alt="">
      <div class="arrow_accessories">
        <img class="hideArrowAccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png" alt="">

      </div>
    </div>




    <div class="container_boxes_accessories">
      <h3 class="">Rigid Card Holder</h3>
      <div class="arrow_accessories">
        <img class="" src="../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png" alt="">

      </div>
    </div>


    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">None </h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/none.png" alt="">
      <h4 class="priceDataAccessories">+£0 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Clear Plastic (closed face) </h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/6.png" alt="">
      <h4 class="priceDataAccessories">+£0.3 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Coloured Plastic (closed face)</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/2.png" alt="">
      <h4 class="priceDataAccessories">+£0.3 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Coloured Plastic (open face)</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/1.png" alt="">
      <h4 class="priceDataAccessories">+£0.25 per unit</h4>
    </div>



    <div class="container_boxes_accessories">
      <h3 class="">Plastic Wallet</h3>
      <div class="arrow_accessories">
        <img class="" src="../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png" alt="">

      </div>
    </div>


    <div class="subcontainer_boxes_accessories plastic_wallet_small">
      <h3 class="dataAccessories">86 x 56mm </h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/7.png" alt="">
      <h4 class="priceDataAccessories">+£0.12 per unit</h4>
    </div>

    <div class="subcontainer_boxes_accessories plastic_wallet_medium">
      <h3 class="dataAccessories">103 x 70mm</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/7.png" alt="">
      <h4 class="priceDataAccessories">+£0.13 per unit</h4>
    </div>

    <div class="subcontainer_boxes_accessories plastic_wallet_big">
      <h3 class="dataAccessories">138 x 88mm</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/7.png" alt="">
      <h4 class="priceDataAccessories">+£0.14 per unit</h4>
    </div>





    <div class="container_boxes_accessories">
      <h3 class="">Retractable Reel</h3>
      <div class="arrow_accessories">
        <img class="" src="../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png" alt="">

      </div>
    </div>



    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel Plastic</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/12.png" alt="">
      <h4 class="priceDataAccessories">+£0.5 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel Round</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/12.png" alt="">
      <h4 class="priceDataAccessories">+£0.85 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel Oval</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/12.png" alt="">
      <h4 class="priceDataAccessories">+£0.85 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel Metal</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/12.png" alt="">
      <h4 class="priceDataAccessories">+£1.10 per unit</h4>
    </div>
    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Retractable Reel Printing (per screen)</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/12.png" alt="">
      <h4 class="priceDataAccessories">+£25.0 per unit</h4>
    </div>







    <div class="container_boxes_accessories">
      <h3 class="">Other</h3>
      <div class="arrow_accessories">
        <img class="" src="../../views/assets/img/global/customize-lanyard/sections/accessories/arrow_top.png" alt="">

      </div>
    </div>


    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Cord Lock</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/9.png" alt="">
      <h4 class="priceDataAccessories">+£0.08 per unit</h4>
    </div>

    <div class="subcontainer_boxes_accessories">
      <h3 class="dataAccessories">Whistle</h3>
      <img class="imgaccessories" src="../../views/assets/img/global/customize-lanyard/sections/accessories/11.png" alt="">
      <h4 class="priceDataAccessories">+£0.1 per unit</h4>
    </div>

  </div>

</section>


<script src="<?php echo $jsPath . '?v=' . $jsVersion; ?>"></script>
