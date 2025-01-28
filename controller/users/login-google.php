<?php
require_once '../../controller/assets/lib/composer/vendor/autoload.php'; // Load Google API dependencies

class ApiHandlerLoginGoogle
{
    // Google OAuth configuration constants
    const CLIENT_ID = '1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com';
    const CLIENT_SECRET = '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';
    const REDIRECT_URI = 'https://lanyardsforyou.com/views/home/index.php';

    // Function to handle incoming requests
    public function handleRequest() {
        // Check if GET request and "action" parameter are present
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action'])) {
            $action = $_GET['action'];

            // Perform actions based on the action parameter
            switch ($action) {
                case "loginGoogle":
                    $this->handleLoginGoogle();
                    break;
                default:
                    $this->sendResponse(400, "Unknown action");
                    break;
            }
        } else {
            // Missing "action" or invalid method
            $this->sendResponse(400, "Missing 'action' parameter or invalid request method");
        }
    }

    // Function to handle Google login
    private function handleLoginGoogle() {
        // Create Google client
        $client = new Google_Client();
        $client->setClientId(self::CLIENT_ID);
        $client->setClientSecret(self::CLIENT_SECRET);
        $client->setRedirectUri(self::REDIRECT_URI);
        $client->addScope("email");
        $client->addScope("profile");

        // Redirect to Google OAuth login URL
        header("Location: " . $client->createAuthUrl());
        exit;
    }

    // Function to send JSON response with status code
    private function sendResponse($statusCode, $message) {
        http_response_code($statusCode);
        echo json_encode(array("message" => $message));
        exit;
    }
}

// Create an instance of the API handler and process the request
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
