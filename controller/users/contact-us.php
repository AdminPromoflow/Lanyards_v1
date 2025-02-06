<?php
class ApiHandlerContactUs {
    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data === null || !isset($data->action)) {
                http_response_code(400);
                echo json_encode(array("message" => "Invalid or missing JSON data"));
                return;
            }

            $action = $data->action;

            switch ($action) {
                case "contactUs":
                    $this->handleContactUs($data);
                    break;
                default:
                    http_response_code(400);
                    echo json_encode(array("message" => "Unknown action"));
                    break;
            }
        } else {
            http_response_code(405);
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    private function handleContactUs($data) {
    /*  echo json_encode(array("message" => true));
      exit;*/
      $emailSender = new EmailSender();


      $emailSent = $emailSender->sendEmailContactUs($data);
      if ($emailSender == '1') {
        echo json_encode(array("message" => true));
      }
      else {
        echo json_encode(array("message" => true));

      }
    }

}

require_once '../config/database.php';
require_once '../../controller/users/send-emails.php';


$apiHandlerContactUs = new ApiHandlerContactUs();
$apiHandlerContactUs->handleRequest();

?>
