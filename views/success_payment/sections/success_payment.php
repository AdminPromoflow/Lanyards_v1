<!-- Link to the success_payment section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/success_payment/sections/success_payment.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/success_payment/sections/success_payment.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/success_payment/sections/success_payment.css') : time()); ?>">




<section class="section_success_payment">
  <h1>Thank you</h1>
  <p>Thank you for your payment. Your order will be processed shortly, and you will be contacted by email if there are any updates.</p>
  <button class="button_success_payment" id="button_go_home" type="button" name="button">Home</button>
</section>



<script src="<?php echo '../../views/assets/js/success_payment/sections/success_payment.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/success_payment/sections/success_payment.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/success_payment/sections/success_payment.js') : time()); ?>" type="text/javascript"></script>
