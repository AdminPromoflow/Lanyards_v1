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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['logging_with_google'] = true;

        echo $client->createAuthUrl();
    }

    private function validateGoogleLogin() {

      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }

      if ($_SESSION['logged_in']) {
        echo json_encode(array("google_login" => true, "message" => "The user has logged in", "logging_with_google" => $_SESSION['logging_with_google']));
        exit;
      }

      elseif (isset($_SESSION['logging_with_google']) && $_SESSION['logging_with_google'] === true) {


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
                    header('Content-Type: application/json');
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

                      $_SESSION['email'] = $email;
                      $_SESSION['name'] = $name;



                //      $_SESSION['logging_with_google'] = false;
                      // Enviar respuesta exitosa con los datos del usuario

                      $security = new Security();
                      $validatedData = $security->validateUserData(
                          $data->nameRegister,
                          $data->emailRegister,
                          $data->passwordRegister
                      );



                      if (!$validatedData) {
                        //false
                        $data = new stdClass();
                        $data->nameRegister = $_SESSION['name'];
                        $data->emailRegister = $_SESSION['email'];
                        $data->passwordRegister = "zQ8@r*W9vJp2#bL!";
                        $data->signupCategory = "google";
                        // Crear una instancia de ApiHandlerRegister
                          $apiHandlerEx = new ApiHandlerRegister();


                          if ($apiHandlerEx->handleRegistration($data)) {
                            $_SESSION['logged_in'] = true;
                            header('Content-Type: application/json');
                            echo json_encode(array("google_login" => true, "message" => "The user has successfully registered and logged in", "logging_with_google" => $_SESSION['logging_with_google']));
                            unset($_SESSION['logging_with_google']);
                            exit;
                          }
                      }
                      elseif ($validatedData) {
                        // true
                          $_SESSION['logged_in'] = true;
                          header('Content-Type: application/json');
                          echo json_encode(array("google_login" => true, "message" => "The user has successfully logged in", "logging_with_google" => $_SESSION['logging_with_google']));
                          unset($_SESSION['logging_with_google']);
                          exit;
                      }


                  } catch (Exception $e) {
                      // Enviar respuesta de error con detalles
                      header('Content-Type: application/json');
                      echo json_encode([
                          "google_login" => false,
                          "error" => $e->getMessage()
                      ]);
                      exit;
                  }

                }
            }
            else {
              header('Content-Type: application/json');
              echo json_encode(array("google_login" => false));
              exit;
            }
        }
        else {
          header('Content-Type: application/json');
          echo json_encode(array("google_login" => false));
          exit;
        }
      }


      else {
        header('Content-Type: application/json');
        echo json_encode(array("google_login" => false, "message" => "The user is not logged in", "logging_with_google" => $_SESSION['logging_with_google']));
        exit;
      }

    }


}

require_once '../../controller/assets/lib/composer/vendor/autoload.php';
require_once '../../controller/users/register.php';
require_once '../../controller/config/security.php';




//controller/assets/lib/vendor/autoload.php
$apiHandlerLoginGoogle = new ApiHandlerLoginGoogle();
$apiHandlerLoginGoogle->handleRequest();
?>
