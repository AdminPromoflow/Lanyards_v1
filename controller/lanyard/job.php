<?php
require_once '../config/database.php';
//require_once '../../models/jobs.php';

class Job {
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    private function createJob($data) {
        // Aquí puedes manejar la creación del job
        // Por ahora solo devolvemos lo que recibimos para probar
        echo json_encode([
            "message" => "Job created successfully",
            "received" => $data
        ]);
    }
}

$job = new Job();
$job->handleRequest();
?>
