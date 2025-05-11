<?php

class ApiHandlerRegister {

    // Function to handle incoming requests
    public function handleRequestRegister() {

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
                    case "register":

                        $this->handleRegistration($data);
                        break;

                    default:
                        // Unknown action
                        http_response_code(400); // Bad Request
                        $response = array("message" => "Unknown action");
                        echo json_encode($response);
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


    // Function to handle user registration
    public function handleRegistration($data) {

        try {

            // Extract and validate user data
            $security = new Security();
            $validatedData = $security->validateUserData(
                $data->nameRegister,
                $data->emailRegister,
                $data->passwordRegister
            );


            if (!$validatedData) {
              header('Content-Type: application/json');
              echo json_encode(array( "messageRegister" => "0"));

              return false;
            }
            exit;

            // Create a database connection and user instance
            $connection = new Database();
            $user = new Users($connection);
            $user->setName($validatedData['username']);
            $user->setEmail($validatedData['email']);
            $user->setPassword($validatedData['password']);
            $user->setSignupCategory($data->signupCategory);
            $userCreated = $user->createUser(); // Insert user into the database
            if ($userCreated) {
              $emailSender = new EmailSender();
              $emailSender->setRecipientEmail($validatedData['email']);
              $emailSender->setRecipientName($validatedData['username']);
              $emailSender->setRecipientPassword($data->passwordRegister);

              $emailSent = $emailSender->sendEmailRegistration();
              if ($data->signupCategory == "normal") {
                header('Content-Type: application/json');
                echo json_encode(array( "messageRegister" => "1"));
              }
              else {
                return true;
              }

            }
            else {
            if ($data->signupCategory == "normal") {
                header('Content-Type: application/json');
                echo json_encode(array( "messageRegister" => "0"));
            }
            else {
              return false;
            }
            }
            // Send registration email

        } catch (Exception $e) {
            echo json_encode(["message" => "-1", "error" => $e->getMessage()]);
        }
    }

}
// Include required files

require_once '../../models/users.php';

require_once '../../controller/users/send-emails.php';

require_once '../../controller/config/database.php';

require_once '../../controller/config/security.php';


// Create an instance of the ApiHandler class and handle the request
if (isset($_GET['ajax']) && $_GET['ajax'] === 'true') {
    // Esto solo se ejecutará si la solicitud es explícitamente desde Ajax o Fetch
    $apiHandler = new ApiHandlerRegister();
    $apiHandler->handleRequestRegister();
}
?>
