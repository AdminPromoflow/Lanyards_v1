<!-- Link to the payment_confirmation section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/payment_confirmation/sections/payment_confirmation.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/payment_confirmation/sections/payment_confirmation.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/payment_confirmation/sections/payment_confirmation.css') : time()); ?>">
<section class="section_payment_confirmation">
  <h1>Checkout</h1>
  <p>Hello, these are the products that you have added to your shopping cart.</p>
  <div class="container_payment_confirmation">

    <div class="boxes_payment_confirmation">
      <div class="form_boxes_payment_confirmation">
        <div class="items_form_boxes_payment_confirmation ">
          <label for="">First name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation ">
          <label for="">Last name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Company name (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Phone *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Country/Region *</label>
          <input type="text" name="" value="United Kingdom (UK)">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Street address *</label>
          <input type="text" name="" value="">
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Town / City *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">County (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Postcode *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Email address *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Where did you find us? (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Order notes (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation_checkbox">
          <label>
              <input type="checkbox" id="button_deliver_different_address">
              Deliver to a different address?
          </label>
        </div>
      </div>
      <div id="form_boxes_payment_confirmation_2" class="form_boxes_payment_confirmation active_form_boxes_payment_confirmation">
        <div class="items_form_boxes_payment_confirmation ">
          <label for="">First name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation ">
          <label for="">Last name *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Company name (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Phone *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Country/Region *</label>
          <input type="text" name="" value="United Kingdom (UK)">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Street address *</label>
          <input type="text" name="" value="">
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Town / City *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">County (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Postcode *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Email address *</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Where did you find us? (optional)</label>
          <input type="text" name="" value="">
        </div>
        <div class="items_form_boxes_payment_confirmation">
          <label for="">Order notes (optional)</label>
          <input type="text" name="" value="">
        </div>
      </div>
    </div>
    <div class="boxes_payment_confirmation">
      <h3 class="title_boxes_payment_confirmation">You Orden</h3>
      <div class="boxes_container_payment_confirmation">
        <div class="items2_payment_confirmation">
          <h3>Product</h3>
          <h3>Subtotal</h3>
        </div>

        <div class="elements_boxes_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
      </div>
      <div class="boxes2_container_payment_confirmation">

        <div class="elements_boxes2_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes2_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
        <div class="elements_boxes2_container_payment_confirmation">
          <h3>Material</h3>
          <h3>hola2</h3>
        </div>
      </div>
      <div class="boxes_card_container_payment_confirmation">
        <label>
            <input type="radio" name="options_card_payment_confirmation" value="Stripe">
              <h4>Stripe</h4>
              <img src="../../views/assets/img/payment_confirmation/sections/amex.svg" alt="">
              <img src="../../views/assets/img/payment_confirmation/sections/mastercard.svg" alt="">
              <img src="../../views/assets/img/payment_confirmation/sections/visa.svg" alt="">
        </label>
        <div id="form_card_container_payment_confirmation" class="form_card_container_payment_confirmation">
          <p>Secure payment via Stripe.</p>
          <label for="">Card Number *</label>
          <input type="text" name="" value="">
          <label for="">Expiry Date *</label>
          <input type="text" name="" value="">
          <label for="">Card Code (CVC) *</label>
          <input type="text" name="" value="">
        </div>

        <label>
            <input type="radio" name="options_card_payment_confirmation" value="PayPal">
            <h4>PayPal</h4>
            <img src="../../views/assets/img/payment_confirmation/sections/paypal.png" alt="">
        </label>
      </div>
      <div class="boxes3_container_payment_confirmation">
        <label>
            <input type="checkbox" name="option3" value="Option3">
            I have read and agree to the website terms and conditions *
        </label>
        <button id="button_place_order" type="button" name="button">Place Order</button>
        <button id="button_payment_confirmation_paypal" class="button_payment_confirmation_paypal">
          <img src="../../views/assets/img/payment_confirmation/sections/paypal.svg" alt="Icon">
        </button>

      </div>

    </div>
  </div>


</section>
<!-- Link to the payment_confirmation section stylesheet with a timestamp to force cache refresh -->
<!-- JavaScript file with timestamp to ensure the latest version is always loaded -->
<script src="<?php echo '../../views/assets/js/payment_confirmation/sections/payment_confirmation.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/payment_confirmation/sections/payment_confirmation.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/payment_confirmation/sections/payment_confirmation.js') : time()); ?>" type="text/javascript"></script>
