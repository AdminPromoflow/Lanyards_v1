<?php
// 📦 Importaciones necesarias antes de declarar la clase
require_once '../config/database.php';
require_once '../../models/orders.php';
require_once '../../models/jobs.php';
require_once '../../models/amount.php';
require_once '../../models/clips.php';
require_once '../../models/addresses.php';




class Job {
    // 📥 Maneja la solicitud POST
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data !== null && isset($data->action)) {
                $action = $data->action;

                switch ($action) {
                    case "createJob":
                        //$this->verifyExtras($data->description);
                        $this->createJob($data);
                        break;
                    case "getJobsByOrder":
                        //$this->verifyExtras($data->description);
                        $this->getJobsByOrder($data);
                        break;
                    case "deleteJob":
                        //$this->verifyExtras($data->description);
                        $this->deleteJob($data);
                        break;
                    default:
                        http_response_code(400);
                        echo json_encode(["message" => "Unknown action"]);
                        break;
                }
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Incomplete JSON data or missing action"]);
            }
        } else {
            http_response_code(405);
            echo json_encode(["message" => "Method not allowed"]);
        }
    }

    // 🛠️ Crea un nuevo trabajo (job)
    private function createJob($data) {

      echo json_encode($data->productDetails->artworkLeft);exit;

      $newColour = $data->newColour ? 1 : 0;


        $idOrder = $this->verifyOrden($data);


        $connection = new Database();
        $job_model = new Job_Model($connection);

        // Asignar los valores usando setters
        $job_model->setName($data->product);

        // Convertir la descripción a JSON string para guardarla como texto
        $descriptionJson = json_encode($data->description, JSON_UNESCAPED_UNICODE);
        $job_model->setDescription($descriptionJson);


        if (is_array($data->price_per_unit)) {
            $data_price = $data->price_per_unit[0];
        }
        else {
          $data_price = $data->price_per_unit;
        }
        $job_model->setPricePerUnit($data_price);
        $job_model->setAmount($data->amount);

        if (is_array($data->total)) {
            $data_price_total = $data->total[0];
        }
        else {
          $data_price_total = $data->total;
        }

        $job_model->setTotal($data_price_total);


        //$newColour

        // Recuperar el idOrder desde la sesión
        $job_model->setIdOrder($idOrder);

        $connection = new Database();
        $amount_Models = new Amount_Models($connection);

        $amount_Models->setDescription($data->description);


        $idAmount = $amount_Models->getIdAmountForJob($data->amount);
        $idAmount = $idAmount[0]['idPriceAmount'];


        // Extras pueden ser null o string vacío
        $job_model->setIdPriceAmount($idAmount); // Cambiar si hay valor



        if (isset($data->address1) || isset($data->address2)) {

          $connection = new Database();
          $provided = new Addresses_Model($connection);

          if (session_status() === PHP_SESSION_NONE) {
              session_start();
          }
           $email = $_SESSION['email'];
           $provided->setUserEmail($email);
           $provided->deleteAddressesByEmail();


          $connection = new Database();
          $provided = new Addresses_Model($connection);


          if (session_status() === PHP_SESSION_NONE) {
              session_start();
          }
           $email = $_SESSION['email'];
           $provided->setUserEmail($email);


           $address1Array = (array) $data->address1;
           $address2Array = (array) $data->address2;

           $provided->setAddress1($address1Array);

           $provided->setAddress2($address2Array);

          $result = $provided->createProvidedInformation();

        }

        $job_model->setNewColour($data->newColour);


        // Crear el job en la base de datos
        $success = $job_model->createJob();

        if ($success) {
            echo json_encode([
                "message" => "Job created successfully",
                "order_id" => $_SESSION['orden_in_process'],
                "status" => true,
                "data_price"=> "The amount is: ".$data->amount
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                "message" => "Failed to create job",
                "status" => false

            ]);
        }
    }

    public function verifyExtras($data)
    {
        // Check attachment type
        if ($data->attachment->type === "none") {
            echo json_encode("No attachments selected");
        } else {
            // Determine attachment count based on lanyard type
            if ($data->lanyard_type->type === "two-end") {
                echo json_encode("Two attachments");
            } elseif ($data->lanyard_type->type === "one-end") {
                echo json_encode("One attachment");
            }
        }

        // Check accessories type
        if ($data->accessories->type === "none" || $data->accessories->type === "None") {
            echo json_encode("No accessories selected");
        } else {
            echo json_encode("One or more accessories selected");
        }

        // Check clip type and process accordingly
        if ($data->clip->type === "dog_clip") {
            echo json_encode("Default clip: dog clip (no extra charge)");
        } else {
            // Handle clip for two-end lanyard
            if ($data->lanyard_type->type === "two-end") {
                // Process both ends with the selected clip
                echo json_encode("Clip two - end");
                // $this->createJobClip($data); // Uncomment if 2 jobs needed
            }

            // Handle clip for one-end lanyard
            if ($data->lanyard_type->type === "one-end") {
              echo json_encode("Clip one - end");
            }
        }

        // Final debug or confirmation message
      //  echo json_encode($data->accessories->type);
    }


    public function createJobClip($data){
      $connection = new Database();
        $clips_models = new Clips_Models($connection);
        $clips_models->setDescription($data->description);
        $idClip = $clips_models->getClipIdByDescription();
        $job_model->setIdClip($idClip);
        //echo json_encode($idClip);exit;
    }

    public function getJobsByOrder($data){
      if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
      }



      $connection = new Database();
      $order_model = new Order_Model($connection);
      $idOrder = $order_model->getOrderIdByUser();





      $connection = new Database();
      $job_model = new Job_Model($connection);
      $job_model->setIdOrder($idOrder);
      $jobs = $job_model->getJobsByOrder();

      echo json_encode($jobs);


    //  echo json_encode($_SESSION['orden_in_process']."hahah");

    }


    // 🔍 Verifica o crea una orden en sesión
    public function verifyOrden($data) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $connection = new Database();
        $order_model = new Order_Model($connection);
        $_SESSION['orden_in_process'] = $order_model->getOrderIdByUser();

        if ($_SESSION['orden_in_process'] == false) {
        //

            $connection = new Database();
            $order_model = new Order_Model($connection);
            $order_model->setEmail($_SESSION['email']);
            $order_model->setStatus('pending');
            $dateTime = date('Y-m-d H:i:s');

            $order_model->setOrderDate($dateTime);

            $order_model->setTotal($data->total);

            $_SESSION['orden_in_process'] = $order_model->createOrder();

        }

        return $_SESSION['orden_in_process'];
    }

    public function deleteJob($data) {


      $connection = new Database();
      $job_model = new Job_Model($connection);
      $job_model->setIdJob($data->idJob);
      $deleted = $job_model->deleteJobById();


      echo json_encode($deleted);

    }

}

// 🚀 Ejecuta el manejador
$job = new Job();
$job->handleRequest();

?>
