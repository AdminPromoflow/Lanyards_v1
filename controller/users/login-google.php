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
                    case "validationLoginGoogle":
                        $this->validateGoogleLogin();
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

    private function validateGoogleLogin()
    {
        // Obtener credenciales desde variables de entorno
        $clientID = getenv('1022332881668-587bktseqso57k6m2dmpfao53vasg83b.apps.googleusercontent.com');
        $clientSecret = getenv('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');
        $redirectUri = getenv('https://lanyardsforyou.com/views/home/index.php');

        if (!$clientID || !$clientSecret || !$redirectUri) {
            $this->jsonResponse(500, "Google OAuth credentials are missing");
        }

        // Crear cliente de Google
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);

        // Verificar si el código de autenticación está presente en la URL
        if (!isset($_GET['code']) || empty($_GET['code'])) {
            $this->jsonResponse(400, "Missing 'code' parameter", ["google_login" => false]);
        }

        try {
            // Obtener el token de acceso con el código de autenticación
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

            if (isset($token['error'])) {
                throw new Exception("Invalid token response: " . json_encode($token));
            }

            $client->setAccessToken($token['access_token']);

            // Obtener la información del usuario
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;

            // Iniciar sesión si no está iniciada
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['logged_in'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['session_type'] = "google";

            // Enviar respuesta exitosa
            $this->jsonResponse(200, "Google login successful", [
                "google_login" => true,
                "email" => $email,
                "name" => $name
            ]);

        } catch (Exception $e) {
            $this->jsonResponse(500, "Google authentication failed", [
                "error" => $e->getMessage(),
                "google_login" => false
            ]);
        }
    }



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
        header('Content-Type: application/json');
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

      header('Content-Type: application/json');
      echo json_encode(array("message" => true, "google_login" => true));
      exit;
    }


}*/


}

require_once '../../controller/assets/lib/composer/vendor/autoload.php';
//require_once '../../controller/users/session-user.php';




//controller/assets/lib/vendor/autoload.php
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
