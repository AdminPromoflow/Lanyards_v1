<?php
// 📦 Importaciones necesarias antes de declarar la clase
require_once '../config/database.php';
require_once '../../models/orders.php';
require_once '../../models/jobs.php';
require_once '../../models/amount.php';
require_once '../../models/clips.php';
require_once '../../models/addresses.php';

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

        // Ejemplo de respuesta simulada
        echo json_encode([
            "message" => "Shipping information updated successfully",
            "input" => $data,
            "status" => true
        ]);
    }
}

// 🚀 Ejecuta el manejador
$order = new Order();
$order->handleRequest();
?>
