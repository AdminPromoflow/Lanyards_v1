<?php
class HandlerSessionUser {

    // Function to handle incoming requests
    public function handleRequest() {
        // Check if the request is GET or POST
        if ($_SERVER["REQUEST_METHOD"] === "GET" || $_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->getRequestData();

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
                    case "checkStripeSession":
                        $this->checkStripeSession();
                        break;

                    default:
                        $this->sendResponse(400, ["message" => "Invalid action specified."]);
                        break;
                }
            } else {
                $this->sendResponse(400, ["message" => "Missing or invalid 'action' field."]);
            }
        } else {
            // Handle requests that are neither GET nor POST
            $this->sendResponse(405, ["message" => "Method not allowed. Use GET or POST."]);
        }
    }



    // Function to get request data from GET or POST
    private function getRequestData() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            return $_GET; // Get data from URL query parameters
        } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rawData = file_get_contents("php://input");
            return json_decode($rawData, true); // Decode JSON data
        }
        return null; // Should not reach here
    }

    // Function to handle check session login
    public function handleCheckSessionLogin() {


      if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
      }
        $this->ensureSessionStarted();

        // Determine if the user is logged in
        $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

        // Send a JSON response
        $this->sendResponse(200, ["message" => $isLoggedIn]);
    }



    // Utility function to start the session safely
    private function ensureSessionStarted() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Utility function to send a JSON response
    private function sendResponse($statusCode, $data) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit; // Ensure no further code is executed
    }
    // Function to handle user logout
    public function processUserLogout(){
        $this->ensureSessionStarted();

        // Destroy the session
        session_unset();
        session_destroy();

        // Send a JSON response
        $this->sendResponse(200, ["message" => "Logout successful."]);
    }
    public function checkStripeSession(){
      \Stripe\Stripe::setApiKey('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P'); // Tu clave secreta


      if (!isset($_GET['session_id'])) {
          echo json_encode(["error" => "Missing session_id"]);
          http_response_code(400);
          exit;
      }
      $session_id = $_GET['session_id'];
      $session = \Stripe\Checkout\Session::retrieve($session_id);
      $orderId = $session->metadata->order_id;

      echo json_encode($orderId);
    }
}
require '../../vendor/autoload.php';

// Create an instance of the HandlerSessionUser class and handle the request
$handlerSessionUser = new HandlerSessionUser();
$handlerSessionUser->handleRequest();

?>
