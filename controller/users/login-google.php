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
      /*  if (isset($_SESSION['logging_with_google']) && $_SESSION['logging_with_google'] === true) {

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

            $refererUrl = $_SERVER['HTTP_REFERER'];

            // Parse the referer URL to get its components
            $urlComponents = parse_url($refererUrl);

            // Check if a query string exists in the URL components
            if (isset($urlComponents['query'])) {

                // Parse the query string into an associative array
                parse_str($urlComponents['query'], $queryParams);

                  if (!isset($queryParams['code'])) {

                    echo json_encode(array( "google_login" => false));
                    exit;
                  }

                // Check if the 'code' parameter exists in the query string
                if (isset($queryParams['code'])) {

                  try {
                      // Obtener el token de acceso usando el código de autorización
                      $token = $client->fetchAccessTokenWithAuthCode($queryParams['code']);

                      // Verificar si hubo un error en la respuesta
                      if (isset($token['error']) || !isset($token['access_token'])) {
                          throw new Exception("Error fetching access token: " . json_encode($token));
                      }

                      // Establecer el token de acceso en el cliente
                      $client->setAccessToken($token['access_token']);

                      // Obtener la información del usuario
                      $google_oauth = new Google_Service_Oauth2($client);
                      $google_account_info = $google_oauth->userinfo->get();
                      $email = $google_account_info->email;
                      $name = $google_account_info->name;

                //      $_SESSION['logging_with_google'] = false;
                      // Enviar respuesta exitosa con los datos del usuario

                      echo json_encode(array("google_login" => true));
                      exit;

                  } catch (Exception $e) {
                      // Enviar respuesta de error con detalles

                      echo json_encode([
                          "google_login" => false,
                          "error" => $e->getMessage()
                      ]);
                      exit;
                  }

                }
            }
            else {

              echo json_encode(array("google_login" => false));
              exit;
            }
        }
        else {

          echo json_encode(array("google_login" => false));
          exit;
        }
      }
      else {

        echo json_encode(array("google_login" => false));
        exit;
      }
    }*/
  /*private function validateGoogleLogin() {
    // Google OAuth initial configuration
    $clientID = '1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'https://lanyardsforyou.com/views/home/index.php';

    // Create Google Client
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // Check if the HTTP_REFERER is set in the server variables
    if (!isset($_SERVER['HTTP_REFERER'])) {
        exit; // Exit if no referer exists
    }

    $refererUrl = $_SERVER['HTTP_REFERER'];
    $urlComponents = parse_url($refererUrl);

    // Check if a query string exists in the referer URL
    if (!isset($urlComponents['query'])) {
        exit; // Exit if no query string in the URL
    }

    // Parse the query string into an associative array
    parse_str($urlComponents['query'], $queryParams);

    // If 'code' is not set, respond with a false login status
    if (!isset($queryParams['code'])) {

        echo json_encode(array("message" => false, "google_login" => false));
        exit;
    }
    else {

      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }
    //  $_SESSION['logged_in'] = true;
    //  $_SESSION['name'] = $name;
    //  $_SESSION['email'] = $email;
      //$_SESSION['session_type'] = "google";


      echo json_encode(array("message" => true, "google_login" => true));
      exit;
    }

*/
}


}

require_once '../../controller/assets/lib/composer/vendor/autoload.php';
//require_once '../../controller/users/session-user.php';

$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
