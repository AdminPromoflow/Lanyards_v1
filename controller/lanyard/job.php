<?php
// 📦 Importaciones necesarias antes de declarar la clase
require_once '../config/database.php';
require_once '../../models/orders.php';
require_once '../../models/jobs.php';
require_once '../../models/amount.php';


class Job {
    // 📥 Maneja la solicitud POST
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data !== null && isset($data->action)) {
                $action = $data->action;

                switch ($action) {
                    case "createJob":
                        $this->createJob($data);
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

    // 🛠️ Crea un nuevo trabajo (job)
    private function createJob($data) {
        $idOrder = $this->verifyOrden($data);


        $connection = new Database();
        $job_model = new Job_Model($connection);

        // Asignar los valores usando setters
       $job_model->setName($data->product);

        // Convertir la descripción a JSON string para guardarla como texto
        $descriptionJson = json_encode($data->description, JSON_UNESCAPED_UNICODE);
        $job_model->setDescription($descriptionJson);

         $job_model->setPricePerUnit($data->price_per_unit);
        $job_model->setAmount($data->amount);
        $job_model->setTotal($data->total);

        // Recuperar el idOrder desde la sesión
        $job_model->setIdOrder($idOrder);

        $connection = new Database();
        $amount_Models = new Amount_Models($connection);

        $amount_Models->setDescription($data->description);


        $idAmount = $amount_Models->getIdAmountForJob($data->amount);
        $idAmount = $idAmount[0]['idPriceAmount'];


        // Extras pueden ser null o string vacío
          $job_model->setIdPriceAmount($idAmount); // Cambiar si hay valor

        // Crear el job en la base de datos
        $success = $job_model->createJob();

        if ($success) {
            echo json_encode([
                "message" => "Job created successfully",
                "order_id" => $_SESSION['orden_in_process']
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                "message" => "Failed to create job"
            ]);
        }
    }

    // 🔍 Verifica o crea una orden en sesión
    public function verifyOrden($data) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }


        if ($order_in_process) {


            $connection = new Database();
            $order_model = new Order_Model($connection);
            $order_model->setEmail($_SESSION['email']);
            $order_model->setStatus('pending');
            $dateTime = date('Y-m-d H:i:s');

            $order_model->setOrderDate($dateTime);

            $order_model->setTotal($data->total);

            $_SESSION['orden_in_process'] = $order_model->createOrder();

        }

        return $_SESSION['orden_in_process'];
    }

}

// 🚀 Ejecuta el manejador
$job = new Job();
$job->handleRequest();

?>
