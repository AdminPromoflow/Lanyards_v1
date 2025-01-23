<?php

class HandlerSessionUser {

    // Function to handle incoming requests
    public function handleRequest() {

        // Check if the request is GET or POST
        if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {

            // For GET request, the data comes from the query parameters
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $data = $_GET; // Get data from URL query parameters
            }

            // For POST request, the data comes from the request body
            elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rawData = file_get_contents("php://input");
                $data = json_decode($rawData, true); // Decode JSON data
            }

            // Check if data contains an "action" field
            if ($data !== null && isset($data['action'])) {

                $action = $data['action']; // Get the action from the data

                // Perform actions based on the action field
                switch ($action) {
                    case "checkSessionLogin":

                        $this->handleCheckSessionLogin();
                        break;
                    case "processUserLogout":
                        $this->processUserLogout();
                        break;
                    default
                    echo json_encode("string");exit;


                }
            }
        } else {
            // Handle requests that are neither GET nor POST
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed. Use GET or POST."));
        }


    }

    // Function to handle check session login
    public function handleCheckSessionLogin() {

        session_start();
        if (isset($_SESSION['logged_in'])) {
            $response = array("message" => true);
            echo json_encode($response);
        } else {
            $response = array("message" => false);
            echo json_encode($response);
        }
    }

    // Function to handle user logout
    public function processUserLogout() {

        session_start();
        session_unset();
        session_destroy();

        echo json_encode(array("message" => "works"));

        exit;
    }

}
// Create an instance of the HandlerSessionUser class and handle the request
$handlerSessionUser = new HandlerSessionUser();
$handlerSessionUser->handleRequest();

?>
