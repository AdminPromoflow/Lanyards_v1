<?php
class ApiHandlerLoginGoogle
{
    public function handleRequest() {
        // Verificar si se recibió una solicitud GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Verificar si "action" existe en los parámetros de la consulta
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                // Realizar acciones basadas en la solicitud
                switch ($action) {
                    case "loginGoogle":
                        $this->handleLoginGoogle();
                        break;
                    case "validationLoginGoogle":
                        $this->validateGoogleLogin();
                        break;

                    default:
                        // Acción desconocida
                        http_response_code(400); // Solicitud incorrecta
                        $response = array("message" => "Acción desconocida");
                        echo json_encode($response);
                        break;
                }
            } else {
                // Falta el parámetro "action"
                http_response_code(400); // Solicitud incorrecta
                echo json_encode(array("message" => "Falta el parámetro 'action'"));
            }
        } else {
            // La solicitud no es un GET válido
            http_response_code(405); // Método no permitido
            echo json_encode(array("message" => "Método no permitido"));
        }
    }

    private function handleLoginGoogle() {
        // Configuración inicial de Google OAuth
        $clientID = '1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = 'https://lanyardsforyou.com/views/home/index.php';

        // Crear cliente de Google
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['logging_with_google'] = true;

        echo $client->createAuthUrl();
    }

    private function validateGoogleLogin() {
      // Generar y enviar el JSON
      header('Content-Type: application/json');
      echo json_encode([
          "google_login" => true,
          "data" => "Estamos empezando a ver qué es lo que pasa"
      ]);

      // Detener la ejecución del script
      exit;

}


}

require_once '../../controller/assets/lib/composer/vendor/autoload.php';
//require_once '../../controller/users/session-user.php';

$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
