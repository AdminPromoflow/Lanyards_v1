<?php
require '../../vendor/autoload.php';


\Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');
header('Content-Type: application/json');


$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'gbp',
      'unit_amount' => 2499, // $24.99 en centavos
      'product_data' => [
        'name' => 'Lanyard personalizado'
      ]
    ],
    'quantity' => 1
  ]],
  'mode' => 'payment',
  'success_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
  'cancel_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
]);


header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);










?>
