<!-- Link to the shopping cart section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/shopping_cart/sections/shopping_cart.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/shopping_cart/sections/shopping_cart.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/shopping_cart/sections/shopping_cart.css') : time()); ?>">
<section class="section_shopping_cart">
  <h1>Shopping Cart</h1>
  <p>Hello, these are the products that you have added to your shopping cart.</p>
  <div class="container_shopping_cart">

    <div class="boxes_shopping_cart" id="container_draw_items_shopping_cart">



    </div>


    <div class="boxes_shopping_cart" id="boxes_shopping_cart">

      <h3 class="title_boxes_shopping_cart">Your order</h3>


      <div class="boxes_container_shopping_cart" id="boxes_container_shopping_cart">



      </div>


      <div class="boxes2_container_shopping_cart" id="boxes2_container_shopping_cart">

        

      </div>



      <div class="boxes3_container_shopping_cart">
        <label>
            <input type="checkbox" name="option3" value="Option3">
            By clicking 'Place Order,' I confirm that I have read and agree to the website's terms and conditions.
        </label>
        <button id="open_checkout"  type="button" name="button">Proceed to checkout</button>
      </div>




    </div>
  </div>

</section>
<!-- Link to the shopping cart section stylesheet with a timestamp to force cache refresh -->
<!-- JavaScript file with timestamp to ensure the latest version is always loaded -->
<script src="<?php echo '../../views/assets/js/shopping_cart/sections/shopping_cart.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/shopping_cart/sections/shopping_cart.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/shopping_cart/sections/shopping_cart.js') : time()); ?>" type="text/javascript"></script>
