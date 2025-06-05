<?php
// webhook.php
//
// Use this sample code to handle webhook events in your integration.
//
// 1) Paste this code into a new file (webhook.php)
//
// 2) Install dependencies
//   composer require stripe/stripe-php
//
// 3) Run the server on http://localhost:4242
//   php -S localhost:4242

require '../../vendor/autoload.php';

// The library needs to be configured with your account's secret key.
// Ensure the key is kept out of any version control system you might be using.
$stripe = new \Stripe\StripeClient('sk_test_...');

// This is your Stripe CLI webhook secret for testing your endpoint locally.
$endpoint_secret = 'whsec_5966d1384d72bd6d255e3ee1cce732be54436717c95630ac4bcdc96f968f64f1';




$payload = @file_get_contents('php://input');

$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];


$event = null;




try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );

    // Si todo sale bien (firma válida)
    file_put_contents('log.txt', "✅ Bien: Firma verificada correctamente\n", FILE_APPEND);

} catch (\UnexpectedValueException $e) {
    // Error: El payload no es válido (no es JSON, está vacío, etc.)
    file_put_contents('log.txt', "❌ Mal: Payload inválido - " . $e->getMessage() . "\n", FILE_APPEND);
    http_response_code(400);
    exit();

} catch (\Stripe\Exception\SignatureVerificationException $e) {
    // Error: La firma del webhook no es válida (clave errónea o manipulada)
    file_put_contents('log.txt', "🚨 Super Mal: Firma inválida - " . $e->getMessage() . "\n", FILE_APPEND);
    http_response_code(400);
    exit();
}

// Handle the event
switch ($event->type) {
    case 'checkout.session.async_payment_failed':
        $session = $event->data->object;
        file_put_contents('log.txt', "🎯 Evento procesado: async_payment_failed\n", FILE_APPEND);
        break;

    case 'checkout.session.async_payment_succeeded':
        $session = $event->data->object;
        file_put_contents('log.txt', "🎯 Evento procesado: async_payment_succeeded\n", FILE_APPEND);
        break;

    case 'checkout.session.completed':
        $session = $event->data->object;
        file_put_contents('log.txt', "🎯 Evento procesado: checkout.session.completed\n", FILE_APPEND);
        break;

    case 'checkout.session.expired':
        $session = $event->data->object;
        file_put_contents('log.txt', "🎯 Evento procesado: checkout.session.expired\n", FILE_APPEND);
        break;

    default:
        file_put_contents('log.txt', "⚠️ Evento desconocido: {$event->type}\n", FILE_APPEND);
        break;
}


http_response_code(200);
