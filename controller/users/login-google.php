<?php
class ApiHandlerLoginGoogle
{
    private $clientID = '1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com';
    private $clientSecret = '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';
    private $redirectUri = 'https://lanyardsforyou.com/views/home/index.php';

    public function handleRequest() {
        // Verificar si es una solicitud GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Validar si se especifica una acción
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                // Ejecutar la acción correspondiente
                switch ($action) {
                    case "loginGoogle":
                        $this->handleLoginGoogle();
                        break;
                    case "loginGoogleSecondPart":
                        $this->handleLoginGoogleSecondPart();
                        break;
                    default:
                        $this->sendErrorResponse("Unknown action", 400);
                        break;
                }
            } else {
                $this->sendErrorResponse("Missing 'action' parameter", 400);
            }
        } else {
            $this->sendErrorResponse("Method not allowed", 405);
        }
    }

    private function handleLoginGoogle() {
        try {
            // Crear cliente de Google
            $client = $this->getGoogleClient();

            // Generar URL de autenticación
            $authUrl = $client->createAuthUrl();

            // Enviar la URL de autenticación al cliente
            echo json_encode(array("authUrl" => $authUrl));
        } catch (Exception $e) {
            $this->sendErrorResponse($e->getMessage(), 500);
        }
    }

    private function handleLoginGoogleSecondPart() {
        try {
            // Crear cliente de Google
            $client = $this->getGoogleClient();

            // Verificar si el parámetro 'code' está presente en la URL
            if (!isset($_GET['code'])) {
                // Si no existe 'code', manejar el caso según lo necesario
                // Opcion 1: Redirigir al login
                header("Location: " . $client->createAuthUrl());
                exit;

                // Opcion 2: Enviar una respuesta clara al cliente
                // http_response_code(400);
                // echo json_encode(array("error" => "Authorization code is missing"));
                // return;
            }

            // Obtener el código de autorización de la URL
            $code = $_GET['code'];

            // Obtener token de acceso usando el código de autorización
            $token = $client->fetchAccessTokenWithAuthCode($code);

            // Verificar si hubo un error al obtener el token
            if (isset($token['error'])) {
                throw new Exception("Error fetching access token: " . $token['error_description']);
            }

            // Establecer el token en el cliente
            $client->setAccessToken($token['access_token']);

            // Obtener información del usuario
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();

            // Preparar y enviar la respuesta
            $response = array(
                "email" => $google_account_info->email,
                "name" => $google_account_info->name
            );
            echo json_encode($response);
        } catch (Exception $e) {
            // Manejar errores y enviar una respuesta de error JSON
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    // Método para configurar el cliente de Google
    private function getGoogleClient() {
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        return $client;
    }

    // Método para enviar respuestas de error
    private function sendErrorResponse($message, $statusCode) {
        http_response_code($statusCode);
        echo json_encode(array("error" => $message));
    }
}

// Incluir dependencias de Composer
require_once '../../controller/assets/lib/composer/vendor/autoload.php';

// Crear instancia de la clase y manejar la solicitud
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
