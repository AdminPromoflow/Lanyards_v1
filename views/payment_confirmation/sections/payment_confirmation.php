<!-- Link to the payment_confirmation section stylesheet with a timestamp to force cache refresh -->
<link rel="stylesheet" href="<?php echo '../../views/assets/css/payment_confirmation/sections/payment_confirmation.css?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/payment_confirmation/sections/payment_confirmation.css') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/css/payment_confirmation/sections/payment_confirmation.css') : time()); ?>">
<section class="section_payment_confirmation">
  <h1>Current Transaction Status</h1>
  <p>The following status reflects the current state of the transaction for the product you have just purchased.</p>
  <div class="container_payment_confirmation">

    <div class="boxes_payment_confirmation">
      <img src="../../views/assets/img/payment_confirmation/logo.png" alt="">
      <div class="cases_payment_confirmation">
        <h2>PAYMENT SUCCESSFUL!</h2>
        <p>Click the button below to return to the main page.</p>
        <img src="../../views/assets/img/payment_confirmation/ok_icon.png" alt="">
      </div>
      <div class="cases_payment_confirmation">
        <h2>PAYMENT FAILED!</h2>
        <p>Click the button below to return to the main page.</p>
        <img src="../../views/assets/img/payment_confirmation/failed_icon.png" alt="">
      </div>
    <div class="buttons_payment_confirmation">
      <button id="" type="button" name="button">Go Home</button>
      <button type="button" name="button">Refresh Page</button>
    </div>


    </div>
  </div>


</section>
<!-- Link to the payment_confirmation section stylesheet with a timestamp to force cache refresh -->
<!-- JavaScript file with timestamp to ensure the latest version is always loaded -->
<script src="<?php echo '../../views/assets/js/payment_confirmation/sections/payment_confirmation.js?v=' . (file_exists($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/payment_confirmation/sections/payment_confirmation.js') ? filemtime($_SERVER['DOCUMENT_ROOT'] . '/views/assets/js/payment_confirmation/sections/payment_confirmation.js') : time()); ?>" type="text/javascript"></script>
