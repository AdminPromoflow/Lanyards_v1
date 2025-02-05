<?php
require_once '../../controller/assets/lib/composer/vendor/autoload.php';

class ApiHandlerLoginGoogle
{
    public function handleRequest()
    {
        // Check if a GET request was received
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                switch ($action) {
                    case "loginGoogle":
                        $this->handleLoginGoogle();
                        break;
                    case "validationLoginGoogle":
                        $this->validateGoogleLogin();
                        break;
                    default:
                        $this->jsonResponse(400, "Unknown action");
                }
            } else {
                $this->jsonResponse(400, "Missing 'action' parameter");
            }
        } else {
            $this->jsonResponse(405, "Method not allowed");
        }
    }

    private function jsonResponse($statusCode, $message, $extraData = [])
    {
        http_response_code($statusCode);
        echo json_encode(array_merge(["message" => $message], $extraData));
        exit;
    }

    private function handleLoginGoogle()
    {
        // Get credentials from environment variables
        $clientID = getenv('GOOGLE_CLIENT_ID');
        $clientSecret = getenv('GOOGLE_CLIENT_SECRET');
        $redirectUri = getenv('GOOGLE_REDIRECT_URI');

        if (!$clientID || !$clientSecret || !$redirectUri) {
            $this->jsonResponse(500, "Google OAuth credentials are missing");
        }

        // Create Google Client
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $this->jsonResponse(200, "Auth URL generated", ["auth_url" => $client->createAuthUrl()]);
    }

    private function validateGoogleLogin()
    {
        // Get credentials from environment variables
        $clientID = getenv('GOOGLE_CLIENT_ID');
        $clientSecret = getenv('GOOGLE_CLIENT_SECRET');
        $redirectUri = getenv('GOOGLE_REDIRECT_URI');

        if (!$clientID || !$clientSecret || !$redirectUri) {
            $this->jsonResponse(500, "Google OAuth credentials are missing");
        }

        // Create Google Client
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);

        // Verify that 'code' parameter exists
        if (!isset($_GET['code'])) {
            $this->jsonResponse(400, "Missing 'code' parameter", ["google_login" => false]);
        }

        try {
            // Fetch the access token using the authorization code
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (isset($token['error'])) {
                throw new Exception("Invalid token response: " . json_encode($token));
            }

            $client->setAccessToken($token['access_token']);

            // Retrieve the user's profile information
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;

            // Start session if not already started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['logged_in'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['session_type'] = "google";

            $this->jsonResponse(200, "Google login successful", ["google_login" => true, "email" => $email, "name" => $name]);
        } catch (Exception $e) {
            $this->jsonResponse(500, "Google authentication failed", ["error" => $e->getMessage(), "google_login" => false]);
        }
    }
}

// Initialize and handle the API request
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
