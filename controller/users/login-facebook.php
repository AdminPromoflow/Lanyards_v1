<?php
class ApiHandlerLoginFacebook
{
    public function handleRequest() {
        // Check if the request is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the "action" parameter exists in the POST request
            if (isset($_POST['action'])) {
                $action = $_POST['action'];

                // Perform actions based on the "action" parameter
                switch ($action) {
                    case "validationLoginFacebook":
                        $this->validateFacebookLogin();
                        break;

                    default:
                        // Unknown action
                        http_response_code(400); // Bad Request
                        $response = array("message" => "Unknown action");
                        echo json_encode($response);
                        break;
                }
            } else {
                // Missing "action" parameter in the request
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Missing 'action' parameter"));
            }
        } else {
            // The request is not POST
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    private function validateFacebookLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is already authenticated
        if ($_SESSION['logged_in']) {
            echo json_encode(array("facebook_login" => true, "message" => "The user has logged in"));
            exit;
        }

        // Receive the data from the POST request (name and email)
        if (isset($_POST['email']) && isset($_POST['name'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];

            // Save the data in the session
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;

            // Validate if the user exists in the database
            $security = new Security();
            $validatedData = ($security->usernameExistsInDatabase($email) == 1) ? true : false;

            if ($validatedData == false) {
                // User does not exist, proceed with registration
                $data = new stdClass();
                $data->nameRegister = $name;
                $data->emailRegister = $email;
                $data->passwordRegister = "zQ8@r*W9vJp2#bL!"; // Default password
                $data->signupCategory = "facebook";

                $apiHandlerEx = new ApiHandlerRegister();

                if ($apiHandlerEx->handleRegistration($data)) {
                    $_SESSION['logged_in'] = true;
                    header('Content-Type: application/json');
                    echo json_encode(array("facebook_login" => true, "message" => "The user has successfully registered and logged in"));
                    exit;
                }
            } elseif ($validatedData) {
                // User is already registered
                $_SESSION['logged_in'] = true;
                header('Content-Type: application/json');
                echo json_encode(array("facebook_login" => true, "message" => "The user has successfully logged in"));
                exit;
            }
        } else {
            // If the parameters email and name are not present in the request
            header('Content-Type: application/json');
            echo json_encode(array("facebook_login" => false, "message" => "Missing 'email' or 'name' parameter"));
            exit;
        }
    }
}

// Load necessary files
require_once '../../controller/users/register.php';
require_once '../../controller/config/security.php';

// Call the handler
$apiHandlerLoginFacebook = new ApiHandlerLoginFacebook();
$apiHandlerLoginFacebook->handleRequest();
?>
