<?php
class ApiHandlerLogin {
    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data === null || !isset($data->action)) {
                http_response_code(400);
                echo json_encode(array("message" => "Invalid or missing JSON data"));
                return;
            }

            $action = $data->action;

            switch ($action) {
                case "login":
                    $this->handleLogin($data);
                    break;
                case "logout":
                    $this->handleLogout($data);
                    break;
                default:
                    http_response_code(400);
                    echo json_encode(array("message" => "Unknown action"));
                    break;
            }
        } else {
            http_response_code(405);
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    private function handleLogin($data) {
        if (!isset($data->emailLogin) || !isset($data->passwordLogin)) {
            http_response_code(400);
            echo json_encode(array("message" => "Email or password missing"));
            return;
        }
//


        $email = $data->emailLogin;
        $password = $data->passwordLogin;

        $connection = new Database();
        if (!$connection) {
            http_response_code(500);
            echo json_encode(array("message" => "Database connection failed"));
            return;
        }
        $user = new Users($connection);
        $user->setEmail($email);
        $storedHash = $user->getPasswordUserByEmail();

        if (!$storedHash) {
          // User not found
          echo json_encode(array("message" => false));
          return;
        }

        if (password_verify($password, $storedHash)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            echo json_encode(array("message" => true));
        } else {
            echo json_encode(array("message" => false));
        }
    }

    private function handleLogout($data) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        echo json_encode(array("message" => "Logged out successfully"));
    }
}

require_once '../config/database.php';
require_once '../../models/users.php';


$apiHandlerLogin = new ApiHandlerLogin();
$apiHandlerLogin->handleRequest();

?>
