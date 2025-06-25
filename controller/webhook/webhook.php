<?php
require '../../vendor/autoload.php';
require_once '../config/database.php';
require_once '../../models/orders.php';
require_once '../../models/users.php';


require_once '../../controller/users/send-emails.php';


// The library needs to be configured with your account's secret key.
// Ensure the key is kept out of any version control system you might be using.
$stripe = new \Stripe\StripeClient('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');

// This is your Stripe CLI webhook secret for testing your endpoint locally.
$endpoint_secret = 'whsec_p4j0DvnkuyYC4M1uqZLMI9LguWLDtTj1';

$payload = @file_get_contents('php://input');

$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];


$event = null;



try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
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
    case 'checkout.session.async_payment_succeeded':
    case 'checkout.session.completed':
        $session = $event->data->object;

        if (isset($session->metadata) && isset($session->metadata->order_id)) {
            $orderId = $session->metadata->order_id;

            $connection = new Database();
            $orderModel = new Order_Model($connection);
            $orderModel->setIdOrder($orderId);

            // Determinar estado según tipo de evento
            $newStatus = ($event->type === 'checkout.session.async_payment_failed') ? "canceled" : "processing";
            $orderModel->setStatus($newStatus);

            $stateStatus = $orderModel->updateOrderStatus();





                $connection = new Database();
                $userModel = new Users($connection);
                $userModel->setIdOrder($orderId); // Asegúrate de tener $orderId definido
                $userInfo = $userModel->getEmailAndNameByIdOrder();


                $emailSender = new EmailSender();
                $emailSender->setRecipientEmail($userInfo['email']);
                $emailSender->setRecipientName($userInfo['name']);
                $emailSent = $emailSender->sendEmailSuccesssfullOrder();












        } else {
            file_put_contents('log.txt', "❌ Metadata 'order_id' not found for event: {$event->type}\n", FILE_APPEND);
        }

        file_put_contents('log.txt', "🎯 Evento procesado: {$event->type}\n", FILE_APPEND);
        break;

    case 'checkout.session.expired':
        $session = $event->data->object;

        if (isset($session->metadata) && isset($session->metadata->order_id)) {
            $orderId = $session->metadata->order_id;

            $connection = new Database();
            $orderModel = new Order_Model($connection);
            $orderModel->setIdOrder($orderId);
            $orderModel->setStatus("canceled");

            $stateStatus = $orderModel->updateOrderStatus();
            file_put_contents('log.txt', $stateStatus . "\n", FILE_APPEND);
        } else {
            file_put_contents('log.txt', "❌ Metadata 'order_id' not found for event: checkout.session.expired\n", FILE_APPEND);
        }

        file_put_contents('log.txt', "🎯 Evento procesado: checkout.session.expired\n", FILE_APPEND);
        break;

    default:
        file_put_contents('log.txt', "⚠️ Evento desconocido: {$event->type}\n", FILE_APPEND);
        break;
}

http_response_code(200);
?>
