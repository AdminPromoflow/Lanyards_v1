<?php
// Function to add file modification timestamp to assets to prevent browser caching issues
function assetShoppingCartSection($path) {
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
    return file_exists($fullPath) ? $path . '?v=' . filemtime($fullPath) : $path;
}
?>

<!-- Link to the shopping cart section stylesheet with file modification timestamp -->
<link rel="stylesheet" href="<?php echo assetShoppingCartSection('../../views/assets/css/shopping_cart/sections/shopping_cart.css'); ?>">

<section class="section_shopping_cart">
  <h1>Shopping Cart</h1>
  <p>Hello, these are the products that you have added to your shopping cart.</p>
  <div class="container_shopping_cart">

    <div class="boxes_shopping_cart">
      <div class="items_shopping_cart">
        <div class="product_items_shopping_cart">
            <h3>hola2</h3>
            <h3>hola3</h3>
            <!-- Product arrow image with timestamp to avoid caching issues -->
            <img class="arrow_products_shopping_cart" src="<?php echo assetShoppingCartSection('../../views/assets/img/shopping_cart/sections/arrow_right.png'); ?>" alt="">
        </div>
        <div class="descriptions_items_shopping_cart">
          <!-- Product details section -->
          <div class="elements_descriptions_items_shopping_cart">
            <h3>Material</h3>
            <h3>hola2</h3>
            <h3>hola3</h3>
          </div>
          <div class="elements_descriptions_items_shopping_cart">
            <h3>Lanyard type</h3>
            <h3>hola2</h3>
            <h3>hola3</h3>
          </div>
          <div class="elements_descriptions_items_shopping_cart">
            <h3>Width</h3>
            <h3>hola2</h3>
            <h3>hola3</h3>
          </div>
          <div class="elements_descriptions_items_shopping_cart">
            <h3>Side printed</h3>
            <h3>hola2</h3>
            <h3>hola3</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="boxes_shopping_cart">
      <h3 class="title_boxes_shopping_cart">Your Order</h3>
      <div class="boxes_container_shopping_cart">
        <div class="items2_shopping_cart">
          <h3>Product</h3>
          <h3>Subtotal</h3>
        </div>
        <div class="elements_boxes_container_shopping_cart">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
      </div>
      <div class="boxes3_container_shopping_cart">
        <label>
            <input type="checkbox" name="option3" value="Option3">
            By clicking 'Place Order,' I confirm that I have read and agree to the website's terms and conditions.
        </label>
        <!-- Checkout button -->
        <button id="open_checkout" type="button" name="button">Proceed to checkout</button>
      </div>
    </div>
  </div>
</section>

<!-- JavaScript file with file modification timestamp to ensure latest updates load -->
<script src="<?php echo assetShoppingCartSection('../../views/assets/js/shopping_cart/sections/shopping_cart.js'); ?>" type="text/javascript"></script>
