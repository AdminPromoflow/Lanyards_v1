<?php
function asset_version($filePath) {
    $realPath = realpath(__DIR__ . $filePath);
    return ($realPath && file_exists($realPath)) ? filemtime($realPath) : time();
}

$basePath = "../../views/assets/";
$cssFile_accessories = "{$basePath}css/global/customize-lanyard/sections/accessories.css";
$jsFile_accessories = "{$basePath}js/customize-lanyard/sections/accessories.js";

$imgFiles = [
    "none" => "{$basePath}img/global/customize-lanyard/sections/accessories/none.png",
    "arrow" => "{$basePath}img/global/customize-lanyard/sections/accessories/arrow_top.png",
    "6" => "{$basePath}img/global/customize-lanyard/sections/accessories/6.png",
    "2" => "{$basePath}img/global/customize-lanyard/sections/accessories/2.png",
    "1" => "{$basePath}img/global/customize-lanyard/sections/accessories/1.png",
    "7" => "{$basePath}img/global/customize-lanyard/sections/accessories/7.png",
    "12" => "{$basePath}img/global/customize-lanyard/sections/accessories/12.png",
    "9" => "{$basePath}img/global/customize-lanyard/sections/accessories/9.png",
    "11" => "{$basePath}img/global/customize-lanyard/sections/accessories/11.png",
];

function get_image($key) {
    global $imgFiles;
    return $imgFiles[$key] . "?v=" . asset_version($imgFiles[$key]);
}
?>

<link rel="stylesheet" href="<?= $cssFile_accessories ?>?v=<?= asset_version($cssFile_accessories) ?>">

<section class="accessoriesSection section">
    <h2 class="name-section-customize-lanyard">Accessories 3</h2>
    <p>Select one accessories</p>

    <div id="containers_boxes_accessories" class="containers_boxes_accessories">

        <div class="container_boxes_accessories">
            <h3 class="dataAccessories">None</h3>
            <img class="imgaccessories" src="<?= get_image('none') ?>" alt="">
            <div class="arrow_accessories">
                <img class="hideArrowAccessories" src="<?= get_image('arrow') ?>" alt="">
            </div>
        </div>

        <div class="container_boxes_accessories">
            <h3 class="dataAccessories">Rigid Card Holder</h3>
            <div class="arrow_accessories">
                <img src="<?= get_image('arrow') ?>" alt="">
            </div>
        </div>

        <div class="subcontainers_boxes_accessories">
            <?php
            $accessories = [
                ["Clear Plastic (closed face)", "6", "£0.3"],
                ["Coloured Plastic (closed face)", "2", "£0.3"],
                ["Coloured Plastic (open face)", "1", "£0.25"]
            ];
            foreach ($accessories as [$name, $img, $price]) : ?>
                <div class="subcontainer_boxes_accessories">
                    <h3 class="dataAccessories"><?= $name ?></h3>
                    <img class="imgaccessories" src="<?= get_image($img) ?>" alt="">
                    <h4 class="priceDataAccessories">+<?= $price ?> per unit</h4>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="container_boxes_accessories">
            <h3 class="dataAccessories">Plastic Wallet</h3>
            <div class="arrow_accessories">
                <img src="<?= get_image('arrow') ?>" alt="">
            </div>
        </div>

        <div class="subcontainers_boxes_accessories">
            <?php
            $walletSizes = [
                ["86 x 56mm", "7", "£0.12"],
                ["103 x 70mm", "7", "£0.13"],
                ["138 x 88mm", "7", "£0.14"]
            ];
            foreach ($walletSizes as [$size, $img, $price]) : ?>
                <div class="subcontainer_boxes_accessories">
                    <h3 class="dataAccessories"><?= $size ?></h3>
                    <img class="imgaccessories" src="<?= get_image($img) ?>" alt="">
                    <h4 class="priceDataAccessories">+<?= $price ?> per unit</h4>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="container_boxes_accessories">
            <h3 class="dataAccessories">Retractable Reel</h3>
            <div class="arrow_accessories">
                <img src="<?= get_image('arrow') ?>" alt="">
            </div>
        </div>

        <div class="subcontainers_boxes_accessories">
            <?php
            $reels = [
                ["Plastic", "12", "£0.5"],
                ["Round", "12", "£0.85"],
                ["Oval", "12", "£0.85"],
                ["Metal", "12", "£1.10"],
                ["Printing (per screen)", "12", "£25.0"]
            ];
            foreach ($reels as [$name, $img, $price]) : ?>
                <div class="subcontainer_boxes_accessories">
                    <h3 class="dataAccessories"><?= $name ?></h3>
                    <img class="imgaccessories" src="<?= get_image($img) ?>" alt="">
                    <h4 class="priceDataAccessories">+<?= $price ?> per unit</h4>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="container_boxes_accessories">
            <h3 class="dataAccessories">Other</h3>
            <div class="arrow_accessories">
                <img src="<?= get_image('arrow') ?>" alt="">
            </div>
        </div>

        <div class="subcontainers_boxes_accessories">
            <?php
            $others = [
                ["Cord Lock", "9", "£0.08"],
                ["Whistle", "11", "£0.1"]
            ];
            foreach ($others as [$name, $img, $price]) : ?>
                <div class="subcontainer_boxes_accessories">
                    <h3 class="dataAccessories"><?= $name ?></h3>
                    <img class="imgaccessories" src="<?= get_image($img) ?>" alt="">
                    <h4 class="priceDataAccessories">+<?= $price ?> per unit</h4>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script src="<?= $jsFile_accessories ?>?v=<?= asset_version($jsFile_accessories) ?>" type="text/javascript"></script>
