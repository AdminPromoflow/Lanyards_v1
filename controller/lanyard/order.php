<?php
// 📦 Importaciones necesarias antes de declarar la clase
require_once '../config/database.php';
require_once '../../models/orders.php';
require_once '../../controller/lanyard/addresses.php';
require '../../vendor/autoload.php';

class Order {
    // 📥 Maneja la solicitud POST
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data !== null && isset($data->action)) {
                $action = $data->action;

                switch ($action) {
                    case "updateShipping":
                        $this->updateShipping($data);
                        break;

                    case "updateOrder":
                        $this->updateOrder($data);
                        break;

                    case "getOrder":
                        $this->getOrder();
                        break;
                    case "setOrder":
                        $addresses = new Addresses();
                        $addresses->updateAddresses($data);

                        $this->setOrder($data);
                        break;

                    default:
                        http_response_code(400);
                        echo json_encode(["message" => "Unknown action"]);
                        break;
                }
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Incomplete JSON data or missing action"]);
            }
        } else {
            http_response_code(405);
            echo json_encode(["message" => "Method not allowed"]);
        }
    }

    // 🚚 Actualiza la información de envío
    private function updateShipping($data) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['email'];

        $connection = new Database();
        $upadateShippingDays = new Order_Model($connection);
        $upadateShippingDays->setEmail($email);
        $upadateShippingDays->setShippingDays($data->shippingDays);
        $status = $upadateShippingDays->updateShippingDays();

        if ($status) {
            echo json_encode([
                "message" => "Shipping information updated successfully",
                "input" => $data,
                "status" => $status
            ]);
        }
    }

    // 🧾 Actualiza la orden completa
    private function updateOrder($data) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['email'];

        $connection = new Database();
        $orderModel = new Order_Model($connection);
        $orderModel->setEmail($email);
        $orderModel->setSubtotal($data->subtotal);
        $orderModel->setTax($data->tax);
        $orderModel->setShippingPrice($data->shippingPrice);
        $orderModel->setShippingDays($data->shippingDays);

        $orderModel->setTotal($data->total);

        $status = $orderModel->updateOrder();

        echo json_encode([
            "message" => "Order updated successfully",
            "input" => $data,
            "status" => $status
        ]);
    }

    // 📄 Obtener detalles de la orden del usuario actual
    private function getOrder() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['email'];

        $connection = new Database();
        $orderModel = new Order_Model($connection);
        $orderModel->setEmail($email);

        $order = $orderModel->getOrderDetails();

        if ($order) {
            echo json_encode([
                "message" => "Order retrieved successfully",
                "order" => $order
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No pending order found for this user"]);
        }
    }

    private function setOrder($data) {
        // $data ya está decodificado como objeto
        $amount = $data->total;
        $currency = $data->currency;

        \Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => 'Tu orden completa',
                    ],
                    'unit_amount' => 10000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://www.google.com',
            'cancel_url' => 'https://www.youtube.com',
        ]);

        header("Location: " . $session->url);

      //  echo json_encode(['id' => $session->id]);
    }

}

// 🚀 Ejecuta el manejador
$order = new Order();
$order->handleRequest();
?>
