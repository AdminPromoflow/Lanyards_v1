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
        $amount = $data->total;
        $currency = $data->currency;
        $orderId = $data->idOrder;

    /*    \Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P'); // Tu clave secreta

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => 'Order',
                    ],
                    'unit_amount' => $amount, // en centavos
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
            'cancel_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',

            // 👇 Aquí envías el ID de tu orden (o lo que necesites rastrear)
            'metadata' => [
                'order_id' => $orderId
            ]
        ]);
*/


      //  echo json_encode(['url' => $session->url]);



        \Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P');
        header('Content-Type: application/json');


        $checkout_session = \Stripe\Checkout\Session::create([
          'line_items' => [[
            'price_data' => [
              'currency' => 'gbp',
              'unit_amount' => 2499, // $24.99 en centavos
              'product_data' => [
                'name' => 'Lanyard personalizado'
              ]
            ],
            'quantity' => 1
          ]],
          'mode' => 'payment',
          'success_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
          'cancel_url' => 'https://www.lanyardsforyou.com/views/success_payment/index.php',
        ]);


        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
      //  echo json_encode(['url' => $checkout_session->url]);

    }


}

// 🚀 Ejecuta el manejador
$order = new Order();
$order->handleRequest();
?>
