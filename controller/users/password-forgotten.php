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
                    $this->verifyParametersPasswordEmailToken($data);
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
          $recoveryToken = bin2hex(random_bytes(32)); // Generate a secure token

          // Establish the database connection
          $connection = new Database();
          if (!$connection) {
              http_response_code(500);
              echo json_encode(array("success" => false, "message" => "Database connection failed"));
              return;
          }

          $user = new Users($connection);
          $user->setEmail($email);
          $user->setRecoveryToken($recoveryToken);
          $insertToken = $user->insertRecoveryToken();


          $emailSender = new EmailSender();
          $emailSender->setRecipientEmail($email);
          $emailAnswer = $emailSender->sendEmailRecoveryPassword($recoveryToken);

            if ($emailAnswer && $insertToken) {
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
        // Función para validar parámetros
        $validationResult = $this->validateParameters($data);
        if ($validationResult !== true) {
            echo json_encode($validationResult);
            return;
        }

        // Crear una nueva conexión a la base de datos
        $connection = new Database();
        if (!$connection) {
            echo json_encode(['success' => false, 'message' => 'Database connection failed']);
            http_response_code(500);
            return;
        }

        // Hashea la contraseña
        $hashed_password = password_hash($data->password, PASSWORD_BCRYPT);

        // Crear usuario e intentar actualizar la contraseña con el token
        $user = new Users($connection);
        $user->setEmail($data->email);
        $user->setRecoveryToken($data->token);
        $user->setPassword($hashed_password);

        $this->updatePassword($user);
    }

    private function validateParameters($data) {
        // Verifica token
        if (empty($data->token)) {
            return ['success' => false, 'message' => 'Token is missing.'];
        }

        // Verifica email
        if (empty($data->email) || !filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Invalid or missing email.'];
        }

        // Verifica contraseña
        if (empty($data->password) || strlen($data->password) < 6) {
            return ['success' => false, 'message' => 'Password must be at least 6 characters long.'];
        }

        // Si todo está bien, retornar verdadero
        return true;
    }

    private function updatePassword($user) {
        // Intentamos actualizar la contraseña
        if ($user->updateUserPasswordWithTokenCheck()) {
            echo json_encode(['success' => true, 'message' => 'Parameters are valid.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'The time has expired, please send the request again.']);
        }
    }


}

require_once '../../controller/config/database.php';
require_once '../../controller/users/send-emails.php';
require_once '../../models/users.php';

$apiHandlerLogin = new ApiHandlerLogin();
$apiHandlerLogin->handleRequest();
?>
