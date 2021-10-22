<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once './phpmailer/Exception.php';
require_once './phpmailer/PHPMailer.php';
require_once './phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'mail.thedreamer.website';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@thedreamer.website'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'J2x(3m!a'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = '465';

    $mail->setFrom('contact@thedreamer.website'); // Gmail address which you used as SMTP server
    $mail->addAddress('joseph.deluna97@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = "(TheDreamer) Message from: $name";
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    
    header('Location: ./success.html');
    
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <h3>'.$e->getMessage().'</h3>
              </div>';
  }
}
?>
