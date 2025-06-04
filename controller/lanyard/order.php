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
        try {
            // Validar sesión
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Validar datos de entrada
            if (!isset($data->total) || !isset($data->currency) || !isset($data->idOrder)) {
                throw new Exception('Missing required parameters');
            }

            // Validar formato de datos
            if (!is_numeric($data->total) || !is_string($data->currency) || !is_numeric($data->idOrder)) {
                throw new Exception('Invalid data format');
            }

            // Validar moneda
            $validCurrencies = ['usd', 'eur', 'gbp'];
            if (!in_array(strtolower($data->currency), $validCurrencies)) {
                throw new Exception('Invalid currency');
            }

            // Validar orden existente
            $connection = new Database();
            $orderModel = new Order_Model($connection);
            $order = $orderModel->getOrderById($data->idOrder);
            if (!$order) {
                throw new Exception('Order not found');
            }

            // Validar estado de la orden
            if ($order['status'] !== 'pending') {
                throw new Exception('Order is not in pending state');
            }

            $amount = floatval($data->total); // Convertir a centavos
            $currency = strtolower($data->currency);
            $orderId = intval($data->idOrder);

            // Cargar configuración de Stripe
            $stripeConfig = require_once '../../config/stripe.php';
            \Stripe\Stripe::setApiKey($stripeConfig['stripe']['secret_key']);

            // Crear sesión de pago
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Order #' . $orderId,
                            'description' => 'Lanyards Order Payment - ' . date('Y-m-d H:i:s')
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $stripeConfig['stripe']['success_url'] . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $stripeConfig['stripe']['cancel_url'],
                'metadata' => [
                    'order_id' => $orderId,
                    'user_id' => $_SESSION['user_id'] ?? null,
                    'created_at' => time()
                ],
                'client_reference_id' => $orderId,
                'allow_promotion_codes' => true,
                'customer_email' => $_SESSION['email'] ?? null
            ]);

            // Actualizar estado de la orden
            $orderModel->updateOrderStatus($orderId, 'processing');

            // Guardar información de la sesión en la base de datos
        //    $this->savePaymentSession($orderId, $session->id, $session->url);

            // Responder con la URL de la sesión
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'data' => [
                    'url' => $session->url,
                    'sessionId' => $session->id,
                    'orderId' => $orderId
                ]
            ]);

        } catch (\Stripe\Exception\ApiErrorException $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getStripeCode(),
                    'type' => $e->getError()->type
                ]
            ]);

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'type' => 'validation_error'
                ]
            ]);
        }
    }

    // Método para guardar la sesión de pago
    private function savePaymentSession($orderId, $sessionId, $sessionUrl) {
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
