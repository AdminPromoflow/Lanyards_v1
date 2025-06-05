<?php
require '../../vendor/autoload.php';



$stripe = new \Stripe\StripeClient('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');


$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'T-shirt',
      ],
      'unit_amount' => 2000,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
  'cancel_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php'
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);







?>
