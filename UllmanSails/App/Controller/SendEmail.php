<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require '../PHPMailer-master/src/PHPMailer.php';
  require '../PHPMailer-master/src/Exception.php';
  require '../PHPMailer-master/src/SMTP.php';

  class SendEmail{


    function sendEmailContactUs(){

       $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host = 'hostinger.co.uk';
      $mail->SMTPAuth = true;
      $mail->Username = 'u273173398';
      $mail->Password = '32skiff32!CI';
      $mail->SMTPSecure = 'ssl'; // Puedes usar 'ssl' o 'tls' según la configuración de tu servidor.
      $mail->Port = 25; // Puerto SMTP

      $mail->setFrom('admin@promoflow.net', 'Laura Rozo');
      $mail->addAddress('aleinarossui@gmail.com', 'Aleja');

      $mail->Subject = 'Test';
      $mail->Body = 'Cuerpo del Correo HTML o texto plano';
      $mail->isHTML(true); // Establece a true si el cuerpo del correo es HTML, a false si es texto plano.

      if ($mail->send()) {
          echo 'El correo se ha enviado con éxito.';
      } else {
          echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
      }
    }

  }




 ?>
