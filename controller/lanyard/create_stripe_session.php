<?php
// ✅ Carga Stripe y clases necesarias
require_once '../../vendor/autoload.php';

// ✅ Verifica que el método sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método no permitido');
}

// ✅ Sanitiza y valida entradas
$action = $_POST['action'] ?? '';
$total = $_POST['total'] ?? '';
$currency = $_POST['currency'] ?? 'gbp';
$idOrder = $_POST['idOrder'] ?? null;

if ($action !== 'setOrder' || !is_numeric($total) || !$idOrder) {
    http_response_code(400);
    exit('Datos inválidos');
}

// ✅ Clave secreta de Stripe (usa variable de entorno en producción)
\Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');

// ✅ Crea sesión de pago en Stripe
try {
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => $currency,
                'product_data' => [
                    'name' => 'Order #' . $idOrder,
                ],
                'unit_amount' => (int)$total, // en centavos
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
        'cancel_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
        'metadata' => [
            'order_id' => $idOrder
        ]
    ]);

    // ✅ Redirige al usuario a Stripe
    header('Location: ' . $session->url);
    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo 'Error al crear sesión de pago: ' . $e->getMessage();
    exit;
}
