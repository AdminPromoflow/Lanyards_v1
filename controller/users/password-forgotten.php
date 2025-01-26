<?php
class ApiHandlerLogin {
    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                http_response_code(400);
                echo json_encode(array("success" => false, "message" => "Invalid JSON format"));
                return;
            }

            if (!isset($data->action)) {
                http_response_code(400);
                echo json_encode(array("success" => false, "message" => "Missing action in request"));
                return;
            }

            $action = $data->action;

            switch ($action) {
                case "verify_password_forgotten":
                    $this->verifyPasswordForgotten($data);
                    break;
            case "updatePassword":
                $verificationResult = $this->verifyParametersPasswordEmailToken($data);
                    break;
            default:
                http_response_code(400);
                echo json_encode(array("success" => false, "message" => "Unknown action"));
                break;
            }
        } else {
            http_response_code(405);
            echo json_encode(array("success" => false, "message" => "Method not allowed"));
        }
    }

    private function verifyPasswordForgotten($data) {
        if (!isset($data->email)) {
            http_response_code(400);
            echo json_encode(array("success" => false, "message" => "Email is required"));
            return;
        }

        $email = $data->email;

        // Establish the database connection
        $connection = new Database();
        if (!$connection) {
            http_response_code(500);
            echo json_encode(array("success" => false, "message" => "Database connection failed"));
            return;
        }

        $user = new Users($connection);
        $user->setEmail($email);

        // Check if the user exists
        $userExists = $user->checkIfUserExistsByEmail();


        if ($userExists) {
          $emailSender = new EmailSender();
          $emailSender->setRecipientEmail($email);
          $recoveryToken = bin2hex(random_bytes(32)); // Generate a secure token

          $emailAnswer = $emailSender->sendEmailRecoveryPassword($recoveryToken);

            if ($emailAnswer) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "User exists"
                ));
            } else {
                http_response_code(404);
                echo json_encode(array("success" => false, "message" => "Message not sent. Please retry, refresh, or contact us."));
            }
        } else {
            http_response_code(404);
            echo json_encode(array("success" => false, "message" => "User not found"));
        }
    }

    private function verifyParametersPasswordEmailToken($data) {

        // Verificar si el token está presente
        if (empty($data['token'])) {
            echo json_encode(['success' => false, 'message' => 'Token is missing.']);
            return;
        }

        // Verificar si el email está presente y es válido
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid or missing email.']);
            return;
        }

        // Verificar si la nueva contraseña está presente y es válida
        if (empty($data['password']) || strlen($data['password']) < 6) {
            echo json_encode(['success' => false, 'message' => 'Password must be at least 6 characters long.']);
            return;
        }

        // Si todo está correcto, retornar éxito
        echo json_encode(['success' => true, 'message' => 'Parameters are valid.']);

    }


}

require_once '../../controller/config/database.php';
require_once '../../controller/users/send-emails.php';
require_once '../../models/users.php';

$apiHandlerLogin = new ApiHandlerLogin();
$apiHandlerLogin->handleRequest();
?>
