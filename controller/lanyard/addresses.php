<?php
class Addresses {

    // Function to handle incoming requests
    public function handleRequest() {

        // Check if a POST request was received
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the raw JSON data from the request body
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            // Check if JSON data is valid and contains an "action" field
            if ($data !== null && isset($data->action)) {
                // Get the action from the JSON data
                $action = $data->action;

                // Perform actions based on the request
                switch ($action) {
                    case "getAddresses":
                        $this->getAddresses();
                        break;

                    default:
                        http_response_code(400); // Bad Request
                        echo json_encode(array("message" => "Unknown action"));
                        break;
                }
            } else {
                // Incomplete JSON data or missing action
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Incomplete JSON data or missing action"));
            }
        } else {
            // The request is not a valid POST request
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    // Function to handle address retrieval from DB using session email
    private function getAddresses() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['email'])) {
            http_response_code(401); // Unauthorized
            echo json_encode(["message" => "User email not found in session"]);
            return;
        }

        $email = $_SESSION['email'];

        $connection = new Database();
        $addressesModel = new Addresses_Model($connection);
        $addressesModel->setUserEmail($email);

        $addresses = $addressesModel->getAddresses();

        if ($addresses) {
            echo json_encode([
                "message" => "Addresses retrieved successfully",
                "addresses" => $addresses
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No addresses found for this user"]);
        }
    }
}

// Include required files
require_once '../config/database.php';
require_once '../../models/addresses.php';

$addresses = new Addresses();
$addresses->handleRequest();
