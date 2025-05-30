<?php
// 📦 Importaciones necesarias antes de declarar la clase
require_once '../config/database.php';
require_once '../../models/orders.php';

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

        // Ejemplo de respuesta simulada
        if ($status) {
            echo json_encode([
                "message" => "Shipping information updated successfully",
                "input" => $data,
                "status" => $status
            ]);
        }
    }

    // 🧾 Actualiza la orden completa (subtotal, tax, shippingPrice, total)
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
        $orderModel->setTotal($data->total);


        $status = $orderModel->updateOrder();


      //  echo json_encode($status);exit;

        echo json_encode([
            "message" => "Order updated successfully",
            "input" => $data,
            "status" => $status
        ]);
    }
}

// 🚀 Ejecuta el manejador
$order = new Order();
$order->handleRequest();
?>
