<!-- CSS with filemtime() to ensure the latest version is always loaded -->
<link rel="stylesheet" href="../../views/assets/css/home/sections/2-most_popular_lanyard.css?v=<?php echo filemtime('../../views/assets/css/home/sections/2-most_popular_lanyard.css'); ?>">

<section class="most_popular_lanyard">
    <!-- Section title and description -->
    <h1>Most Popular Lanyard</h1>
    <p>Discover the best-selling lanyard everyone loves! Designed for durability, comfort, and style, this lanyard is perfect for work, events, or everyday use. Get yours today and enjoy the perfect blend of quality and functionality!</p>

    <!-- Container for customization options and selection -->
    <div class="container_most_popular_lanyard">

        <!-- Left section: Customization options -->
        <div class="subcontainer_most_popular_lanyard">
            <h2>Customization Options</h2>
            <div class="subcontainer_box_information_most_popular_lanyard">
                <div class="box_information_most_popular_lanyard"><h3>Material:</h3> <h3>Dye-sublimation</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Type of Lanyard:</h3> <h3>Single Ended</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Width:</h3> <h3>20mm</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Side Printed:</h3> <h3>Both Sides</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Colour:</h3> <h3>Full Colour</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Clip:</h3> <h3>Standard</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Attachment:</h3> <h3>None</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Accessory:</h3> <h3>None</h3></div>
                <div class="box_information_most_popular_lanyard"><h3>Design Options</h3> <h3>Customization</h3></div>
            </div>
            <!-- Button to select this lanyard -->
            <button type="button" name="button">Select</button>
        </div>

        <!-- Right section: Visual representation of customization options -->
        <div class="subcontainer_most_popular_lanyard">

            <!-- Dynamic image loading with filemtime() to avoid caching issues -->
            <?php
                $images = [
                    "Material-5-Dye-sub-Recycled-PET.jpg" => "Dye-sublimation",
                    "one-end.png" => "Single Ended",
                    "one-end-25mm.png" => "20mm",
                    "two-side.png" => "Both Sides",
                    "colour-coverage.png" => "Full Colour",
                    "dog_clip.png" => "Dog Clip",
                    "none.png" => "None",
                    "design-options.png" => "Artwork or background, text, and logo"
                ];

                foreach ($images as $filename => $title) {
                    echo '
                    <div class="box_display_most_popular_lanyard">
                        <h2>'.$title.'</h2>
                        <img src="../../views/assets/img/home/2-most_popular_lanyard/'.$filename.'?v='.filemtime('../../views/assets/img/home/2-most_popular_lanyard/'.$filename).'" alt="'.$title.'">
                        <h3>'.$title.'</h3>
                        <p>Description for '.$title.'.</p>
                    </div>';
                }
            ?>
        </div>
    </div>
</section>

<!-- JavaScript with filemtime() to ensure the latest version is always loaded -->
<script src="../../views/assets/js/home/sections/2-most_popular_lanyard.js?v=<?php echo filemtime('../../views/assets/js/home/sections/2-most_popular_lanyard.js'); ?>" type="text/javascript"></script>
