<?php
// Include PHPMailer and its dependencies
require '../assets/lib/send-email/PHPMailer/src/Exception.php';
require '../assets/lib/send-email/PHPMailer/src/PHPMailer.php';
require '../assets/lib/send-email/PHPMailer/src/SMTP.php';

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
    private $message;
    private $recipientEmail;
    private $recipientName;
    private $recipientPassword;

    // Setter for recipient email
    public function setRecipientEmail($recipientEmail) {
        $this->recipientEmail = $recipientEmail;
    }

    // Setter for recipient name
    public function setRecipientName($recipientName) {
        $this->recipientName = $recipientName;
    }

    // Setter for recipient password (optional)
    public function setRecipientPassword($recipientPassword) {
        $this->recipientPassword = $recipientPassword;
    }

    // Method to send a registration email
    public function sendEmailRegistration() {

        // Create an instance of PHPMailer
        $mail = new PHPMailer;

        // Configure PHPMailer to use SMTP
        $mail->isSMTP();

        // Enable SMTP debugging (set to 0 in production)
        $mail->SMTPDebug = 0;

        // Set the Hostinger SMTP server
        $mail->Host = 'smtp.hostinger.com';

        // Configure the SMTP port (587 for STARTTLS, 465 for SSL)
        $mail->Port = 587;

        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        // Set your SMTP username and password
        $mail->Username = 'admin@lanyardsforyou.com';
        $mail->Password = '32skiff32!CI';

        // Set the sender's email address and name
        $mail->setFrom('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add a reply-to address
        $mail->addReplyTo('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add recipient's email address and name
        $mail->addAddress($this->recipientEmail, $this->recipientName);

        // Set the email subject
        $mail->Subject = 'Welcome to Lanyards For You';

        // Define the email body in HTML format
        $mail->isHTML(true); // Specify that the content is HTML

        $recipientMessage = "
         <div class='background' style='position: relative; width: 100%;     background: rgb(52,74,98); padding: 2vw 0;'>
            <!-- Background container -->

            <div class='background2' style='width: 70%; overflow-x: hidden; min-width: 300px; margin: 0 auto; position: relative; background: linear-gradient(360deg, rgba(7,12,21,1) 1%, rgba(19,54,84,1) 100%); margin-top: 4vw; margin-bottom: 4vw;'>
              <!-- Secondary background container -->

              <div class='header' style='position: relative; height: calc(3em + 3vw); background: rgba(255,255,255, .4);'>
                <!-- Header with a background image -->
                <img  alt='Image' style='display: block; height: 100%; width: auto; margin-left: 2vw;' src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/logo.png'>
                <!-- Image in the header -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(2.0vw + 1.0em);'>
                <!-- Container for titles -->
                <h1 style='font-family: Oswald, sans-serif; font-size: calc(1.2vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(240,240,240); text-align: center;'>
                  <!-- Main title -->
                  HELLO AND WELCOME TO LANYARDS FOR YOU
                </h1>
                <h2 style='font-family: Oswald, sans-serif; font-weight: 300; font-size: calc(1.1vw + 0.7em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(232,232,232); text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- Subtitle -->
                  $this->recipientName we're glad to have you here
                </h2>
              </div>
              <div class='imgEmail' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(0.8vw + 0.8em);'>
                <!-- Image container -->
                <img style='position: relative; width: 100%;' alt='' src='https://lanyardsforyou.com/controller/assets/img/send-emails/register/register_image.jpg'>
                <!-- Image in the email -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(1.4vw + 0.4em);'>
                <!-- Container for titles -->
                <h3 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 500; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center;'>
                  <!-- Title welcoming to the community -->
                  We welcome you to our community
                </h3>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 200; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; width: 60%;'>
                  <!-- Subtitle about account info -->
                  Please make a note of your account info to access:
                </h4>
                <!-- User Info Section -->
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.3vw + 0.3em);'>
                  <!-- User's username -->
                  email: $this->recipientEmail
                </h4>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- User's password -->
                  password: $this->recipientPassword
                </h4>
                <h3 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 300; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.4vw + 0.4em);'>
                  <!-- Another subtitle -->
                  Your registration is greatly appreciated
                </h3>
              </div>
              <!-- Footer Section -->
              <div class='footer' style='position: relative; background: rgba(106, 123, 141, 1); width: 100%; margin-top: calc(1.8vw + 0.8em); padding: calc(1vw + 1em) 0;'>
                <!-- Footer container -->
                <h2 style='position: relative; font-family: Oswald, sans-serif; color: rgb(250,250,250); font-weight: 600; font-size: calc(0.8vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px; text-align: center;'>
                Thanks for joining our online community!
                </h2>
              </div>
            </div>
        </div>
        ";

        // Set the email body
        $mail->Body = $recipientMessage;

        // Set a plain text backup if HTML content cannot be displayed
        $mail->AltBody = 'If you cannot view the HTML, here is the plain text message.';
        $emailSent = $mail->send();

        // Send the email and check if it was sent successfully
        if (!$emailSent) {

            return 'Sender Error: ' . $mail->ErrorInfo;
        } else {
            return '1';
        }
    }

    // Method to send a recovery password
    public function sendEmailRecoveryPassword($recoveryToken) {
      try {
        // Create an instance of PHPMailer
        $mail = new PHPMailer;

        // Configure PHPMailer to use SMTP
        $mail->isSMTP();

        // Enable SMTP debugging (set to 0 in production)
        $mail->SMTPDebug = 0;

        // Set the Hostinger SMTP server
        $mail->Host = 'smtp.hostinger.com';

        // Configure the SMTP port (587 for STARTTLS, 465 for SSL)
        $mail->Port = 587;

        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        // Set your SMTP username and password
        $mail->Username = 'admin@lanyardsforyou.com';
        $mail->Password = '32skiff32!CI';

        // Set the sender's email address and name
        $mail->setFrom('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add a reply-to address
        $mail->addReplyTo('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add recipient's email address and name
        $mail->addAddress($this->recipientEmail, $this->recipientName);

        // Set the email subject
        $mail->Subject = 'Password recovery for Lanyards For You.';

        // Define the email body in HTML format
        $mail->isHTML(true); // Specify that the content is HTML

        $recipientMessage = "
         <div class='background' style='position: relative; width: 100%;     background: rgb(52,74,98); padding: 2vw 0;'>
            <!-- Background container -->

            <div class='background2' style='width: 70%; overflow-x: hidden; min-width: 300px; margin: 0 auto; position: relative; background: linear-gradient(360deg, rgba(7,12,21,1) 1%, rgba(19,54,84,1) 100%); margin-top: 4vw; margin-bottom: 4vw;'>
              <!-- Secondary background container -->

              <div class='header' style='position: relative; padding: calc(0.3vw + 0.3em); background: rgba(255,255,255, .4);'>
                <!-- Header with a background image -->
                <img  alt='Image' style='display: block; height: calc(2vw + 2em); width: auto; margin-left: 2vw;' src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/logo.png'>
                <!-- Image in the header -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(2.0vw + 1.0em);'>
                <!-- Container for titles -->
                <h1 style='font-family: Oswald, sans-serif; font-size: calc(1vw + 1em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(240,240,240); text-align: center;'>
                  <!-- Main title -->
                  PASSWORD RECOVERY FOR LANYARDS FOR YOU.
                </h1>

              </div>
              <div class='imgEmail' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(0.8vw + 0.8em);'>
                <!-- Image container -->
                <img style='position: relative; width: 100%;' alt='' src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/main4.png'>
                <!-- Image in the email -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(1.4vw + 0.4em);'>

                <h4 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 200; font-size: calc(0.7vw + 0.7em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; width: 60%;'>
                  <!-- Subtitle about account info -->
                  The following link is for password recovery:
                </h4>
                <br>
                <!-- User Info Section -->
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.8vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- Updated link with recovery token -->
                  <a href='https://lanyardsforyou.com/views/recovery_password/index.php?token=$recoveryToken&email=$this->recipientEmail' style='color: rgb(0,123,255); text-decoration: none;'>Recover Your Password</a>
                </h4>
                <br>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 200; font-size: calc(0.6vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: justify; width: 100%;'>
                  <!-- Subtitle about account info -->
                  If you have not requested a password recovery, please let us know by contacting us at admin@lanyardsforyou.com.
                </h4>
              </div>
              <!-- Footer Section -->
              <div class='footer' style='position: relative; background: rgba(106, 123, 141, 1); width: 100%; margin-top: calc(1.8vw + 0.8em); padding: calc(1.2vw + 1.2em) 0;'>
                <!-- Footer container -->
                <h2 style='position: relative; font-family: Oswald, sans-serif; color: rgb(250,250,250); font-weight: 600; font-size: calc(0.8vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px;   text-align: center; width: 90%;'>
                Thank you for being part of our online community.
                </h2>

              </div>
            </div>
        </div>
        ";

        // Set the email body
        $mail->Body = $recipientMessage;

        // Set a plain text backup if HTML content cannot be displayed
        $mail->AltBody = 'The following link is for password recovery:  ' .'https://lanyardsforyou.com/recover-password?token=$recoveryToken' ;

        $mail->send();

        return true;
      } catch (\Exception $e) {
        return false;
      }
    }

    // Method to send a registration email
    public function sendEmailRegistrationToAdmin() {
        // Create an instance of PHPMailer
        $mail = new PHPMailer;

        // Configure PHPMailer to use SMTP
        $mail->isSMTP();

        // Enable SMTP debugging (set to 0 in production)
        $mail->SMTPDebug = 2;

        // Set the Hostinger SMTP server
        $mail->Host = 'smtp.hostinger.com';

        // Configure the SMTP port (587 for STARTTLS, 465 for SSL)
        $mail->Port = 587;

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // Set your SMTP username and password
        $mail->Username = 'admin@lanyardsforyou.com';
        $mail->Password = '32skiff32!CI';

        // Set the sender's email address and name
        $mail->setFrom('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add a reply-to address
        $mail->addReplyTo('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add recipient's email address and name
      //  $mail->addAddress('lonsus30@gmail.com', 'Admin Ale');
      //  $mail->addAddress('ian@kan-do-it.com', 'Ian');
      //  $mail->addAddress('catrina@kan-do-it.com', 'Cat');
          $mail->addAddress('lonsus30@gmail.com', 'Aleja');

        // Set the email subject
        $mail->Subject = 'New customer on Lanyards For You';

        // Define the email body in HTML format
        $mail->isHTML(true); // Specify that the content is HTML

        $recipientMessage = "
         <div class='background' style='position: relative; width: 100%;     background: rgb(52,74,98); padding: 2vw 0;'>
            <!-- Background container -->

            <div class='background2' style='width: 70%; overflow-x: hidden; min-width: 300px; margin: 0 auto; position: relative; background: linear-gradient(360deg, rgba(7,12,21,1) 1%, rgba(19,54,84,1) 100%); margin-top: 4vw; margin-bottom: 4vw;'>
              <!-- Secondary background container -->

              <div class='header' style='position: relative; height: calc(3em + 3vw); background: rgba(255,255,255, .4);'>
                <!-- Header with a background image -->
                <img  alt='Image' style='display: block; height: 100%; width: auto; margin-left: 2vw;' src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/logo.png'>
                <!-- Image in the header -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(2.0vw + 1.0em);'>
                <!-- Container for titles -->
                <h1 style='font-family: Oswald, sans-serif; font-size: calc(1.2vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(240,240,240); text-align: center;'>
                  <!-- Main title -->
                   LANYARDS FOR YOU
                </h1>
                <h2 style='font-family: Oswald, sans-serif; font-weight: 300; font-size: calc(1.1vw + 0.7em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(232,232,232); text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- Subtitle -->
                  Hello Ian and Cat we hope you are well
                </h2>
              </div>
              <div class='imgEmail' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(0.8vw + 0.8em);'>
                <!-- Image container -->
                <img style='position: relative; width: 100%;' alt='' src='https://lanyardsforyou.com/controller/assets/img/send-emails/register/register_image.jpg'>
                <!-- Image in the email -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(1.4vw + 0.4em);'>
                <!-- Container for titles -->
                <h3 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 500; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center;'>
                  <!-- Title welcoming to the community -->
                  New customer
                </h3>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 200; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; width: 60%;'>
                  <!-- Subtitle about account info -->
                  This email is to inform you that a new user has registered on Lanyards For You with the following information:
                </h4>
                <!-- User Info Section -->
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.3vw + 0.3em);'>
                  <!-- User's username -->
                  email: $this->recipientName
                </h4>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- User's password -->
                  password: $this->recipientEmail
                </h4>
                <h3 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 300; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.4vw + 0.4em);'>
                  <!-- Another subtitle -->
                  We greatly appreciate this registration.
                </h3>
              </div>
              <!-- Footer Section -->
              <div class='footer' style='position: relative; background: rgba(106, 123, 141, 1); width: 100%; margin-top: calc(1.8vw + 0.8em); padding: calc(1vw + 1em) 0;'>
                <!-- Footer container -->
                <h2 style='position: relative; font-family: Oswald, sans-serif; color: rgb(250,250,250); font-weight: 600; font-size: calc(0.8vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center;'>
                One more user joining our online community!
                </h2>
              </div>
            </div>
        </div>
        ";

        // Set the email body
        $mail->Body = $recipientMessage;

        // Set a plain text backup if HTML content cannot be displayed
        $mail->AltBody = 'If you cannot view the HTML, here is the plain text message.';

        // Send the email and check if it was sent successfully
        if (!$mail->send()) {
            return 'Sender Error: ' . $mail->ErrorInfo;
        } else {
            return '1';
        }
    }


    public function sendEmailContactUs($data) {
        // Create an instance of PHPMailer
        $mail = new PHPMailer;

        // Configure PHPMailer to use SMTP
        $mail->isSMTP();

        // Enable SMTP debugging (set to 0 in production)
        $mail->SMTPDebug = 2;

        // Set the Hostinger SMTP server
        $mail->Host = 'smtp.hostinger.com';

        // Configure the SMTP port (587 for STARTTLS, 465 for SSL)
        $mail->Port = 587;

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // Set your SMTP username and password
        $mail->Username = 'admin@lanyardsforyou.com';
        $mail->Password = '32skiff32!CI';

        // Set the sender's email address and name
        $mail->setFrom('admin@lanyardsforyou.com', 'Ian Southworth');

        // Add a reply-to address
        $mail->addReplyTo('admin@promoflow.net', 'Ian Southworth');

        // Add recipient's email address and name
      //  $mail->addAddress('lonsus30@gmail.com', 'Admin Ale');
      //  $mail->addAddress('ian@kan-do-it.com', 'Ian');
      //  $mail->addAddress('catrina@kan-do-it.com', 'Cat');
        $mail->addAddress('alerozochiquiza@gmail.com', 'Aleja');

        // Add recipient's email address and name
        $mail->addAddress($this->recipientEmail, $this->recipientName);

        // Set the email subject
        $mail->Subject = 'New customer on Lanyards For You';

        // Define the email body in HTML format
        $mail->isHTML(true); // Specify that the content is HTML

        $recipientMessage = "
         <div class='background' style='position: relative; width: 100%;     background: rgb(52,74,98); padding: 2vw 0;'>
            <!-- Background container -->

            <div class='background2' style='width: 70%; overflow-x: hidden; min-width: 300px; margin: 0 auto; position: relative; background: linear-gradient(360deg, rgba(7,12,21,1) 1%, rgba(19,54,84,1) 100%); margin-top: 4vw; margin-bottom: 4vw;'>
              <!-- Secondary background container -->

              <div class='header' style='position: relative; height: calc(3em + 3vw); background: rgba(255,255,255, .4);'>
                <!-- Header with a background image -->
                <img  alt='Image' style='display: block; height: 100%; width: auto; margin-left: 2vw;' src='https://lanyardsforyou.com/controller/assets/img/send-emails/password-recovery/logo.png'>
                <!-- Image in the header -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(2.0vw + 1.0em);'>
                <!-- Container for titles -->
                <h1 style='font-family: Oswald, sans-serif; font-size: calc(1.2vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(240,240,240); text-align: center;'>
                  <!-- Main title -->
                   LANYARDS FOR YOU
                </h1>
                <h2 style='font-family: Oswald, sans-serif; font-weight: 300; font-size: calc(1.1vw + 0.7em); position: relative; margin: 0 auto; letter-spacing: 0px; color: rgb(232,232,232); text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- Subtitle -->
                  Hello Ian and Cat we hope you are well
                </h2>
              </div>
              <div class='imgEmail' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(0.8vw + 0.8em);'>
                <!-- Image container -->
                <img style='position: relative; width: 100%;' alt='' src='https://lanyardsforyou.com/controller/assets/img/send-emails/register/register_image.jpg'>
                <!-- Image in the email -->
              </div>
              <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(1.4vw + 0.4em);'>
                <!-- Container for titles -->
                <h3 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 500; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center;'>
                  <!-- Title welcoming to the community -->
                  New customer
                </h3>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 200; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; width: 60%;'>
                  <!-- Subtitle about account info -->
                  This email is to inform you that a new user has registered on Lanyards For You with the following information:
                </h4>
                <!-- User Info Section -->
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.3vw + 0.3em);'>
                  <!-- User's username -->
                  email: @
                </h4>
                <h4 style='font-family: Oswald, sans-serif; color: rgb(232,232,232); font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.2vw + 0.2em);'>
                  <!-- User's password -->
                  password: @
                </h4>
                <h3 style='font-family: Oswald, sans-serif; color: rgb(185,185,185); font-weight: 300; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center; margin-top: calc(0.4vw + 0.4em);'>
                  <!-- Another subtitle -->
                  We greatly appreciate this registration.
                </h3>
              </div>
              <!-- Footer Section -->
              <div class='footer' style='position: relative; background: rgba(106, 123, 141, 1); width: 100%; margin-top: calc(1.8vw + 0.8em); padding: calc(1vw + 1em) 0;'>
                <!-- Footer container -->
                <h2 style='position: relative; font-family: Oswald, sans-serif; color: rgb(250,250,250); font-weight: 600; font-size: calc(0.8vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px;  text-align: center;'>
                One more user joining our online community!
                </h2>
              </div>
            </div>
        </div>
        ";

        // Set the email body
        $mail->Body = $recipientMessage;

        // Set a plain text backup if HTML content cannot be displayed
        $mail->AltBody = 'If you cannot view the HTML, here is the plain text message.';

        // Send the email and check if it was sent successfully
        if (!$mail->send()) {
            return 'Sender Error: ' . $mail->ErrorInfo;
        } else {
            return '1';
        }
    }

}
