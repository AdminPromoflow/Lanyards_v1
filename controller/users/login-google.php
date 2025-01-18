<?php
class ApiHandlerLoginGoogle
{
    public function handleRequest() {


        // Check if a GET request was received
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Check if "action" exists in the query parameters
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                // Perform actions based on the request
                switch ($action) {
                    case "loginGoogle":
                        $this->handleLoginGoogle();
                        break;
                    case "loginGoogleSecondPart":

                        $this->handleLoginGoogleSecondPart();

                        break;
                    default:
                        // Unknown action
                        http_response_code(400); // Bad Request
                        $response = array("message" => "Unknown action");
                        echo json_encode($response);
                        break;
                }
            } else {
                // Missing "action" parameter
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Missing 'action' parameter"));
            }
        } else {
            // The request is not a valid GET request
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
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

        echo $client->createAuthUrl();
    }

    private function handleLoginGoogleSecondPart() {

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






        // Check if the HTTP_REFERER is set in the server variables
        if (isset($_SERVER['HTTP_REFERER'])) {
          private function handleLoginGoogleSecondPart() {
      try {
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

          // Verificar si el parámetro 'code' está en la URL
          if (!isset($_GET['code'])) {
              throw new Exception("Authorization code is missing");
          }

          // Obtener el código de autorización de la URL
          $code = $_GET['code'];

          // Intercambiar el código por un token de acceso
          $token = $client->fetchAccessTokenWithAuthCode($code);

          // Verificar si ocurrió un error al obtener el token
          if (isset($token['error'])) {
              throw new Exception("Error fetching access token: " . $token['error_description']);
          }

          // Establecer el token de acceso en el cliente de Google
          $client->setAccessToken($token['access_token']);

          // Obtener información del perfil del usuario
          $google_oauth = new Google_Service_Oauth2($client);
          $google_account_info = $google_oauth->userinfo->get();
          $email = $google_account_info->email;
          $name = $google_account_info->name;

          // Devolver la información del usuario como respuesta JSON
          echo json_encode(array(
              "email" => $email,
              "name" => $name
          ));
      } catch (Exception $e) {
          // Manejar errores y enviar una respuesta de error JSON
          http_response_code(400);
          echo json_encode(array("error" => $e->getMessage()));
      }
  }

        }








    }
}

require_once '../../controller/assets/lib/composer/vendor/autoload.php';

//controller/assets/lib/vendor/autoload.php
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
