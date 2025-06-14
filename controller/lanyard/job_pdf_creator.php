<?php

require_once '../config/database.php';
require_once '../../models/jobs.php';


class JobPDFCreator {
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data !== null && isset($data->action)) {
                $action = $data->action;

                switch ($action) {
                  case "generate_pdf_from_job":
                      $this->generatePDFfromJob($data);
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
    private function generatePDFfromJob($data) {
      
    }


}

// 🚀 Ejecuta el manejador
$jobPDF = new JobPDFCreator();
$jobPDF->handleRequest();
?>
