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
      if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
      }

    //  echo json_encode("Bueno");
      $connection = new Database();
      $order_model = new Order_Model($connection);
      $order_model->setIdOrder($_SESSION['orderId']);
      $result = $order_model->getOrderByIdOrder();


      if ($result["status"] == "processing") {

        $html = "
          <h1>Your order has been set.</h1>
          <p>Thank you for your order! We truly appreciate your trust in us.
          Our team is now processing your request, and we’ll keep you updated with any changes.
          If you have any questions, feel free to reach out. We’re here to help!</p>
          <table border=\"1\" cellpadding=\"8\" cellspacing=\"0\">
            <tr><th>Date & Time</th><td>{$result['date_time']}</td></tr>
            <tr><th>Shipping Days</th><td>{$result['shippingDays']} working days</td></tr>
            <tr><th>Status</th><td>{$result['status']}</td></tr>
            <tr><th>Subtotal</th><td>\£{$result['subtotal']}</td></tr>
            <tr><th>Tax</th><td>\£{$result['tax']}</td></tr>
            <tr><th>Shipping Price</th><td>\£{$result['shipping_price']}</td></tr>
            <tr><th>Total</th><td><strong>\£{$result['total']}</strong></td></tr>
          </table>
          <br>
          <button class=\"button_success_payment\" id=\"button_go_home\" type=\"button\" name=\"button\" onclick=\"window.location.href='../../views/home/index.php';\">Home</button>
        ";

      }
      elseif ($result["status"] == "pending") {
        $html = "
          <h1>Processing your order...</h1>
          <p>Your payment is being processed. Please keep refreshing the page to check for updates.</p>
          <button class=\"button_success_payment\" id=\"button_reload_page\" type=\"button\" name=\"button\" onclick=\"location.reload();\">Reload Page</button>
        ";
      }
      elseif ($result["status"] == "canceled") {
        $html = "
          <h1>We're sorry</h1>
          <p>Unfortunately, your order could not be completed. Please try to make the purchase again.</p>
          <button class=\"button_success_payment\" id=\"button_go_home\" type=\"button\" name=\"button\" onclick=\"window.location.href='../../views/home/index.php';\">Home</button>
        ";


      }



      echo json_encode([
          "message" => "Order ID retrieved successfully",
          "html" => $html
      ]);
  }

}
require '../../vendor/autoload.php';
require_once '../config/database.php';
require_once '../../models/orders.php';


// Create an instance of the HandlerSessionUser class and handle the request
$handlerSessionUser = new HandlerSessionUser();
$handlerSessionUser->handleRequest();

?>
