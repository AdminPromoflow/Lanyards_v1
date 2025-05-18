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

  <div class="container_accessories_home_arrow_left container_accessories_home_arrow">
    <img src="<?php echo '../../views/assets/img/home/accessories/arrow_top.png?v=' . accessories_home_file_version('../../views/assets/img/home/accessories/arrow_top.png'); ?>" alt="">
  </div>

  <div id="container_accessories_home" class="container_accessories_home">

    <?php
    $accessories = [
        ["Rigid Card Holder", "1.png", [
            ["Clear Plastic (closed face)", "+£0.3 per unit"],
            ["Coloured Plastic (closed face)", "+£0.3 per unit"],
            ["Coloured Plastic (open face)", "+£0.25 per unit"]
        ]],
        ["Plastic Wallet", "7.png", [
            ["86 x 56mm", "+£0.12 per unit"],
            ["103 x 70mm", "+£0.13 per unit"],
            ["138 x 88mm", "+£0.14 per unit"]
        ]],
        ["Retractable Reel", "12.png", [
            ["Plastic", "+£0.5 per unit"],
            ["Round", "+£0.85 per unit"],
            ["Oval", "+£0.85 per unit"],
            ["Metal", "+£1.10 per unit"],
            ["Printing (per screen)", "+£25.0 per unit"]
        ]],
        ["Cord Lock", "9.png", [
            ["Cord Lock", "+£0.08 per unit"]
        ]],
        ["Whistle", "11.png", [
            ["Whistle", "+£0.1 per unit"]
        ]]
    ];

    foreach ($accessories as $accessory) {
        $title = $accessory[0];
        $image = $accessory[1];
        $descriptions = $accessory[2];
        $image_path = "../../views/assets/img/home/accessories/$image";
        ?>

        <div class="box_accessories_home">
          <h2 class="name_accessory_item" ><?php echo $title; ?></h2>
          <img src="<?php echo $image_path . '?v=' . accessories_home_file_version($image_path); ?>" alt="<?php echo $title; ?>">

          <div class="subcontainer_accessories_home_quantity">
            <div class="dropbox_accessories_home">
              <h3>Quantity</h3>
            </div>
            <input class="input_amount_accessories" type="text" name="" value="">
          </div>

          <div class="subcontainer_accessories_home_description">
            <?php foreach ($descriptions as $desc) { ?>
              <div class="box_accessories_home_description">
                <h3><?php echo $desc[0]; ?></h3>
                <h3><?php echo $desc[1]; ?></h3>
              </div>
            <?php } ?>
          </div>

          <div class="subcontainer_accessories_home_buy_section">
            <button class="buy_accessory" type="button">Buy</button>
            <button class="add_to_cart_accessory" type="button">Add to cart</button>
          </div>
        </div>

        <?php
    }
    ?>

  </div>

  <div class="container_accessories_home_arrow_right container_accessories_home_arrow">
    <img src="<?php echo '../../views/assets/img/home/accessories/arrow_top.png?v=' . accessories_home_file_version('../../views/assets/img/home/accessories/arrow_top.png'); ?>" alt="">
  </div>






</section>

<script src="<?php echo $accessories_home_js . '?v=' . accessories_home_file_version($accessories_home_js); ?>" type="text/javascript"></script>
