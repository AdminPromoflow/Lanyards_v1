<?php
session_start();

/*---------------------------------  Imports  --------------------------------*/

require_once('../Config/database.php');
require_once('../Models/Searchs.php');
require_once('SendEmail.php');


/*--------------------------------  CRUD users  ------------------------------*/

  //var_dump($_POST); // Verificar qué se recibe en $_POST
    if ($_POST['module']=="seach") {
      $db = new Database();
      $seach = new Searchs($db);
      $seach->setWord($_POST['word']);
      $pages = json_encode($seach->searchPage());

      echo $pages;
    }
    elseif ($_POST['module'] == "sendEmail") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if a file was uploaded
        if (isset($_FILES["file"])) {
            $file = $_FILES["file"];

            // Check if there were no errors during the upload
            if ($file["error"] === UPLOAD_ERR_OK) {
                // Check if the uploaded file is a PDF
                $allowed_extensions = ["pdf"];
                $file_extension = pathinfo($file["name"], PATHINFO_EXTENSION);

                if (in_array($file_extension, $allowed_extensions)) {
                    // Read the contents of the PDF file into a variable
                    $pdf_contents = file_get_contents($file["tmp_name"]);

                    // Now $pdf_contents contains the PDF file data
                    // You can further process $pdf_contents as needed

                    echo "The PDF file has been uploaded and stored in a variable.";
                } else {
                    echo "Invalid file type. Only PDF files are allowed.";
                }
            } else {
                echo "Error uploading the file: " . $file["error"];
            }
        } else {
            echo "No file was sent.";
        }
    } else {
        echo "Invalid request.";
    }
      $sendEmail = new SendEmail();
      $sendEmail->sendEmailContactUs(); 
    }




 ?>
