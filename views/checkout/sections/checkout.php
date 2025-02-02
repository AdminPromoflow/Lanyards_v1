<!-- Link to the checkout section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/checkout/sections/checkout.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/checkout/sections/checkout.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/checkout/sections/checkout.css') : time()); ?>">
<section class="section_checkout">
  <h1>Checkout</h1>
  <p>Hello, these are the products that you have added to your shopping cart.</p>
  <div class="container_checkout">

    <div class="boxes_checkout">
      <div class="form_boxes_checkout">
        <div class="items_form_boxes_checkout ">
          <label for="">First name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout ">
          <label for="">Last name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Company name (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Phone *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Country/Region *</label>
          <input type="text" name="" value="United Kingdom (UK)">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Street address *</label>
          <input type="text" name="" value="">
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Town / City *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">County (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Postcode *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Email address *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Where did you find us? (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Order notes (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout_checkbox">
          <label>
              <input type="checkbox" id="button_deliver_different_address">
              Deliver to a different address?
          </label>
        </div>
      </div>
      <div id="form_boxes_checkout_2" class="form_boxes_checkout active_form_boxes_checkout">
        <div class="items_form_boxes_checkout ">
          <label for="">First name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout ">
          <label for="">Last name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Company name (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Phone *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Country/Region *</label>
          <input type="text" name="" value="United Kingdom (UK)">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Street address *</label>
          <input type="text" name="" value="">
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Town / City *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">County (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Postcode *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Email address *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Where did you find us? (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_checkout">
          <label for="">Order notes (optional)</label>
          <input type="text" name="" value="">
        </div>
      </div>
    </div>
    <div class="boxes_checkout">
      <h3 class="title_boxes_checkout">You Orden</h3>
      <div class="boxes_container_checkout">
        <div class="items2_checkout">
          <h3>Product</h3>
          <h3>Subtotal</h3>
        </div>

        <div class="elements_boxes_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
      </div>
      <div class="boxes2_container_checkout">

        <div class="elements_boxes2_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes2_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes2_container_checkout">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
      </div>
      <div class="boxes3_container_checkout">
        <label>
            <input type="checkbox" name="option3" value="Option3">
            By clicking 'Place Order,' I confirm that I have read and agree to the website's terms and conditions.
        </label>
        <button type="button" name="button">Place Order</button>
      </div>

    </div>
  </div>

</section>
<!-- Link to the checkout section stylesheet with a timestamp to force cache refresh -->
<!-- JavaScript file with timestamp to ensure the latest version is always loaded -->
<script src="<?php echo '../../views/assets/js/checkout/sections/checkout.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/checkout/sections/checkout.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/checkout/sections/checkout.js') : time()); ?>" type="text/javascript"></script>
