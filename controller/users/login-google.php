<?php
require_once '../../controller/assets/lib/composer/vendor/autoload.php'; // Load Google API dependencies
require_once '../../controller/users/session-user.php'; // Load session controller

class ApiHandlerLoginGoogle
{
    // Function to handle incoming requests
    public function handleRequest() {

        // Check if a GET request was received
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Check if "action" exists in the query parameters
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                // Perform actions based on the request
                switch ($action) {
                    case "loginGoogle":
                        $this->handleLoginGoogle(); // Handle Google login
                        break;

                    default:
                        // Unknown action, respond with a bad request
                        http_response_code(400); // Bad Request
                        $response = array("message" => "Unknown action");
                        echo json_encode($response);
                        exit; // Exit after sending the response
                }
            } else {
                // Missing "action" parameter, respond with a bad request
                http_response_code(400); // Bad Request
                $response = array("message" => "Missing 'action' parameter");
                echo json_encode($response);
                exit; // Exit after sending the response
            }
        } else {
            // The request is not a valid GET request
            http_response_code(405); // Method Not Allowed
            $response = array("message" => "Method not allowed");
            echo json_encode($response);
            exit; // Exit after sending the response
        }
    }

    // Function to handle Google login
    private function handleLoginGoogle() {
        // Initial Google OAuth configuration
        $clientID = '1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = 'https://lanyardsforyou.com/views/home/index.php';

        // Create Google client
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        // Generate the Google OAuth URL
        $authUrl = $client->createAuthUrl();

        // Return the URL for Google login
        echo json_encode(array("authUrl" => $authUrl));
        exit; // Exit after sending the response
    }
}

// Create an instance of the API handler and process the request
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
