<?php
function accessories_home_file_version($file_path) {
    return file_exists($file_path) ? filemtime($file_path) : time();
}

$accessories_home_css = "../../views/assets/css/home/sections/accessories.css";
$accessories_home_js = "../../views/assets/js/home/sections/accessories.js";
?>

<link rel="stylesheet" href="<?php echo $accessories_home_css . '?v=' . accessories_home_file_version($accessories_home_css); ?>">
<section id="accessories_home" class="accessories_home">
  <h1>Accessories</h1>
  <div class="container_accessories_home">
    <!-- Container for the accessories home box -->

    <div class="box_accessories_home">

      <!-- Title of the accessory -->
      <h2>Rigid Card Holder</h2>

      <!-- Image of the accessory -->
      <img src="../../views/assets/img/home/accessories/1.png" alt="Rigid Card Holder">

      <!-- Container for selecting the quantity -->
      <div class="subcontainer_accessories_home_quantity">
        <!-- Dropdown section to label quantity selection -->
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <!-- Input field for entering the quantity -->
        <input type="text" name="" value="">
      </div>

      <!-- Container for the product description -->
      <div class="subcontainer_accessories_home_description">
        <!-- Each description box contains details about the product and price -->
        <div class="box_accessories_home_description box_accessories_home_rigid_card_holder">
          <h3>Clear Plastic (closed face)</h3>
          <h3>+£0.3 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_rigid_card_holder">
          <h3>Coloured Plastic (closed face)</h3>
          <h3>+£0.3 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_rigid_card_holder">
          <h3>Coloured Plastic (open face)</h3>
          <h3>+£0.25 per unit</h3>
        </div>
      </div>

      <!-- Container for the buying options -->
      <div class="subcontainer_accessories_home_buy_section">
        <!-- Button to directly buy the item -->
        <button type="button" name="button">Buy</button>
        <!-- Button to add the item to the shopping cart -->
        <button type="button" name="button">Add to cart</button>
      </div>

    </div>
    <div class="box_accessories_home">

      <!-- Title of the accessory -->
      <h2>Plastic Wallet</h2>

      <!-- Image of the accessory -->
      <img src="../../views/assets/img/home/accessories/7.png" alt="Rigid Card Holder">

      <!-- Container for selecting the quantity -->
      <div class="subcontainer_accessories_home_quantity">
        <!-- Dropdown section to label quantity selection -->
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <!-- Input field for entering the quantity -->
        <input type="text" name="" value="">
      </div>

      <!-- Container for the product description -->
      <div class="subcontainer_accessories_home_description">
        <!-- Each description box contains details about the product and price -->
        <div class="box_accessories_home_description box_accessories_home_plastic_wallet">
          <h3>86 x 56mm</h3>
          <h3>+£0.12 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_plastic_wallet">
          <h3>103 x 70mm</h3>
          <h3>+£0.13 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_plastic_wallet">
          <h3>138 x 88mm</h3>
          <h3>+£0.14 per unit</h3>
        </div>
      </div>

      <!-- Container for the buying options -->
      <div class="subcontainer_accessories_home_buy_section">
        <!-- Button to directly buy the item -->
        <button type="button" name="button">Buy</button>
        <!-- Button to add the item to the shopping cart -->
        <button type="button" name="button">Add to cart</button>
      </div>

    </div>
    <div class="box_accessories_home">

      <!-- Title of the accessory -->
      <h2>Retractable Reel</h2>

      <!-- Image of the accessory -->
      <img src="../../views/assets/img/home/accessories/12.png" alt="Rigid Card Holder">

      <!-- Container for selecting the quantity -->
      <div class="subcontainer_accessories_home_quantity">
        <!-- Dropdown section to label quantity selection -->
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <!-- Input field for entering the quantity -->
        <input type="text" name="" value="">
      </div>

      <!-- Container for the product description -->
      <div class="subcontainer_accessories_home_description">
        <!-- Each description box contains details about the product and price -->
        <div class="box_accessories_home_description box_accessories_home_retractable_reel">
          <h3>Plastic</h3>
          <h3>+£0.5 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_retractable_reel">
          <h3>Round</h3>
          <h3>+£0.85 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_retractable_reel">
          <h3>Oval</h3>
          <h3>+£0.85 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_retractable_reel">
          <h3>Metal</h3>
          <h3>+£1.10 per unit</h3>
        </div>
        <div class="box_accessories_home_description box_accessories_home_retractable_reel">
          <h3>Printing (per screen)</h3>
          <h3>+£25.0 per unit</h3>
        </div>
      </div>

      <!-- Container for the buying options -->
      <div class="subcontainer_accessories_home_buy_section">
        <!-- Button to directly buy the item -->
        <button type="button" name="button">Buy</button>
        <!-- Button to add the item to the shopping cart -->
        <button type="button" name="button">Add to cart</button>
      </div>

    </div>

    <div class="box_accessories_home">

      <!-- Title of the accessory -->
      <h2>Cord Lock</h2>

      <!-- Image of the accessory -->
      <img src="../../views/assets/img/home/accessories/9.png" alt="Rigid Card Holder">

      <!-- Container for selecting the quantity -->
      <div class="subcontainer_accessories_home_quantity">
        <!-- Dropdown section to label quantity selection -->
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <!-- Input field for entering the quantity -->
        <input type="text" name="" value="">
      </div>

      <!-- Container for the product description -->
      <div class="subcontainer_accessories_home_description">
        <!-- Each description box contains details about the product and price -->
        <div class="box_accessories_home_description box_accessories_home_cord_lock">
          <h3>Cord Lock</h3>
          <h3>+£0.08 per unit</h3>
        </div>

      </div>

      <!-- Container for the buying options -->
      <div class="subcontainer_accessories_home_buy_section">
        <!-- Button to directly buy the item -->
        <button type="button" name="button">Buy</button>
        <!-- Button to add the item to the shopping cart -->
        <button type="button" name="button">Add to cart</button>
      </div>

    </div>
    <div class="box_accessories_home">

      <!-- Title of the accessory -->
      <h2>Whistle</h2>

      <!-- Image of the accessory -->
      <img src="../../views/assets/img/home/accessories/11.png" alt="Rigid Card Holder">

      <!-- Container for selecting the quantity -->
      <div class="subcontainer_accessories_home_quantity">
        <!-- Dropdown section to label quantity selection -->
        <div class="dropbox_accessories_home">
          <h3>Quantity</h3>
        </div>
        <!-- Input field for entering the quantity -->
        <input type="text" name="" value="">
      </div>

      <!-- Container for the product description -->
      <div class="subcontainer_accessories_home_description">
        <!-- Each description box contains details about the product and price -->
        <div class="box_accessories_home_description box_accessories_home_whistle">
          <h3>Whistle</h3>
          <h3>+£0.1 per unit</h3>
        </div>

      </div>

      <!-- Container for the buying options -->
      <div class="subcontainer_accessories_home_buy_section">
        <!-- Button to directly buy the item -->
        <button type="button" name="button">Buy</button>
        <!-- Button to add the item to the shopping cart -->
        <button type="button" name="button">Add to cart</button>
      </div>

    </div>

  </div>
</section>
<script src="<?php echo $accessories_home_js . '?v=' . accessories_home_file_version($accessories_home_js); ?>" type="text/javascript"></script>
