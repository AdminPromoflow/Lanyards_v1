<?php
require '../../vendor/autoload.php';
require_once '../../models/orders.php';
require_once '../../controller/config/database.php';

// Usa variables de entorno en lugar de claves directamente (recomendado en producción)
\Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');
$endpoint_secret = 'whsec_5966d1384d72bd6d255e3ee1cce732be54436717c95630ac4bcdc96f968f64f1';

$payload = @file_get_contents("php://input");
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
} catch (\UnexpectedValueException $e) {
    http_response_code(400);
    exit('Invalid payload');
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    http_response_code(400);
    exit('Invalid signature');
}

if ($event->type === 'checkout.session.completed') {
    $session = $event->data->object;
    $orderId = $session->metadata->order_id ?? null;

    if (!$orderId || !is_numeric($orderId)) {
        http_response_code(400);
        exit('ID de orden no válido');
    }

    $connection = new Database();
    $updateOrderStatus = new Order_Model($connection);
    $updateOrderStatus->setIdOrder($orderId);
    $updateOrderStatus->setStatus("processing");

    $status = $updateOrderStatus->updateOrderStatus();

    if (!$status) {
        http_response_code(500);
        exit('No se pudo actualizar el estado de la orden');
    }

    // file_put_contents('pagos.txt', "Orden pagada: $orderId\n", FILE_APPEND);
}

http_response_code(200);
