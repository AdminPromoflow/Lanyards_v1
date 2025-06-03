<?php
session_start();

require '../../vendor/autoload.php';


\Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P'); // clave secreta

$endpoint_secret = 'whsec_5966d1384d72bd6d255e3ee1cce732be54436717c95630ac4bcdc96f968f64f1'; // firma del webhook

$payload = @file_get_contents("php://input");
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  exit();
}
$_SESSION['success_payment'] = null;


if ($event->type === 'checkout.session.completed') {

// Guardar datos en sesión
  $_SESSION['success_payment'] = true;
    $session = $event->data->object;

    // 👇 Aquí recuperas el ID de la orden que enviaste antes
    $orderId = $session->metadata->order_id ?? 'no-id';

    // 🔁 Aquí marcas la orden como pagada en tu base de datos
  //  file_put_contents('pagos.txt', "Orden pagada: $orderId\n", FILE_APPEND);
}


http_response_code(200);
