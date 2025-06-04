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
                    case "getPaymentSuccess":
                        $this->getPaymentSuccess();
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




    private function getPaymentSuccess() {
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }

      $idOrder = $_SESSION['idOrder'];

      $connection = new Database();
      $orderModel = new Order_Model($connection);
      $orderModel->setIdUser($idOrder);

      $order = $orderModel->hasProcessingOrder();

      if ($order) {
          echo json_encode([
              "message" => true
          ]);
      }
      else {
        echo json_encode([
            "message" => false
        ]);
      }
    }






    private function setOrder($data) {
        // Validar datos de entrada
        if (!isset($data->total) || !isset($data->currency) || !isset($data->idOrder)) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required parameters']);
            return;
        }

        $amount = $data->total;
        $currency = $data->currency;
        $orderId = $data->idOrder;

        // Cargar configuración de Stripe
        $stripeConfig = require_once '../../config/stripe.php';
        \Stripe\Stripe::setApiKey($stripeConfig['stripe']['secret_key']);

        try {
            // Crear sesión de pago
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Order #' . $orderId,
                            'description' => 'Lanyards Order Payment'
                        ],
                        'unit_amount' => $amount * 100, // Stripe requiere centavos
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $stripeConfig['stripe']['success_url'],
                'cancel_url' => $stripeConfig['stripe']['cancel_url'],
                'metadata' => [
                    'order_id' => $orderId
                ],
                'client_reference_id' => $orderId
            ]);

            // Guardar información de la sesión en la base de datos
            $this->savePaymentSession($orderId, $session->id);

            // Responder con la URL de la sesión
            echo json_encode([
                'url' => $session->url,
                'sessionId' => $session->id
            ]);

        } catch (\Stripe\Exception\ApiErrorException $e) {
            http_response_code(400);
            echo json_encode([
                'error' => $e->getMessage(),
                'error_code' => $e->getStripeCode()
            ]);
        }
    }

    // Método para guardar la sesión de pago
    private function savePaymentSession($orderId, $sessionId) {
        $connection = new Database();
        $orderModel = new Order_Model($connection);
        $orderModel->setIdOrder($orderId);
        $orderModel->setStripeSessionId($sessionId);
        $orderModel->updateStripeSession();
    }


}

// 🚀 Ejecuta el manejador
$order = new Order();
$order->handleRequest();
?>
