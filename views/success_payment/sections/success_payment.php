<!-- Link to the success_payment section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/success_payment/sections/success_payment.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/success_payment/sections/success_payment.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/success_payment/sections/success_payment.css') : time()); ?>">
<section class="section_success_payment">
  <h1>Thank you</h1>
  <p>Thank you for your payment. Your order will be processed shortly, and you will be contacted by email if there are any updates.</p>
  <div class="container_success_payment">

    <div id="boxes_success_payment" class="boxes_success_payment">

    </div>





    <div class="boxes_success_payment">

      <h3 class="title_boxes_success_payment">You Orden</h3>

      <div id="boxes_container_success_payment" class="boxes_container_success_payment">

      </div>

      <!--   <div class="boxes_card_container_success_payment">
        <label>
        <input type="radio" name="options_card_success_payment" value="Stripe">
              <h4>Stripe</h4>
              <img src="../../views/assets/img/success_payment/sections/amex.svg" alt="">
              <img src="../../views/assets/img/success_payment/sections/mastercard.svg" alt="">
              <img src="../../views/assets/img/success_payment/sections/visa.svg" alt="">
        </label>
        <div id="form_card_container_success_payment" class="form_card_container_success_payment">
          <p>Secure payment via Stripe.</p>
          <label for="">Card Number *</label>
          <input type="text" name="" value="">
          <label for="">Expiry Date *</label>
          <input type="text" name="" value="">
          <label for="">Card Code (CVC) *</label>
          <input type="text" name="" value="">
        </div>

     <label>
            <input type="radio" name="options_card_success_payment" value="PayPal">
            <h4>PayPal</h4>
            <img src="../../views/assets/img/success_payment/sections/paypal.png" alt="">
        </label>
      </div>-->
    <!--  <div class="boxes3_container_success_payment">
        <label>
            <input type="checkbox" name="option3" value="Option3">
            I have read and agree to the website terms and conditions *
        </label>-->
        <button class="button_success_payment" id="button_go_home" type="button" name="button">Home</button>
      <!--  <button id="button_success_payment_paypal" class="button_success_payment_paypal">
          <img src="../../views/assets/img/success_payment/sections/paypal.svg" alt="Icon">
        </button>-->
      </div>

    </div>






  </div>


</section>
<!-- Link to the success_payment section stylesheet with a timestamp to force cache refresh -->
<!-- JavaScript file with timestamp to ensure the latest version is always loaded -->
<script src="<?php echo '../../views/assets/js/success_payment/sections/success_payment.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/success_payment/sections/success_payment.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/success_payment/sections/success_payment.js') : time()); ?>" type="text/javascript"></script>
