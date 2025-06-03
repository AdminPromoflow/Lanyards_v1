<?php
require '../../vendor/autoload.php';
require_once '../../models/orders.php';
require_once '../../controller/config/database.php';

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

// Manejo del evento específico
if ($event->type === 'checkout.session.completed') {
    $session = $event->data->object;

    // Extracción del order_id desde metadata
    $orderId = $session->metadata->order_id ?? null;

    // Validación de order_id
    if (!$orderId || !is_numeric($orderId)) {
        file_put_contents(__DIR__ . '/stripe_webhook.log', date('Y-m-d H:i:s') . " | Error: order_id no válido o ausente\n", FILE_APPEND);
        http_response_code(400);
        exit('ID de orden no válido');
    }

    try {
        $connection = new Database();
        $orderModel = new Order_Model($connection);
        $orderModel->setIdOrder($orderId);
        $orderModel->setStatus("processing");

        $status = $orderModel->updateOrderStatus();

        $logMsg = date('Y-m-d H:i:s') . " | Order ID: $orderId | Status actualizado: " . ($status ? 'true' : 'false') . PHP_EOL;
        file_put_contents(__DIR__ . '/stripe_webhook.log', $logMsg, FILE_APPEND);

        if (!$status) {
            http_response_code(500);
            exit('No se pudo actualizar el estado de la orden');
        }

    } catch (Exception $e) {
        file_put_contents(__DIR__ . '/stripe_webhook.log', date('Y-m-d H:i:s') . " | Error de servidor: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
        http_response_code(500);
        exit('Error de servidor');
    }
}

// Siempre responder 200 OK a Stripe si no hubo errores
http_response_code(200);
