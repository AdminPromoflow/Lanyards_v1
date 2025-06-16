<?php
session_start(); // Asegúrate de tener esto al inicio del script

require '../../vendor/autoload.php';



\Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');

$session_id = $_GET['session_id'];
$session = \Stripe\Checkout\Session::retrieve($session_id);

// Guardar el order_id en la sesión
$_SESSION['orderId'] = $session->metadata->order_id;

?>
