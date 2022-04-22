
<?php
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/Exception.php");
require_once("PHPMailer/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$sendMail=$_POST['mail'];
$userName=$_POST['uname'];
  
try {

    // $mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'waltonusers@gmail.com';                 
    $mail->Password   = 'waltonusers1234';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  


    $email = $sendMail;
    // $email = "otoshijannatul@gmail.com";
    $cname = $userName;

  
    $mail->setFrom('waltonusers@gmail.com', 'From WALTON');   
    
    
    $mail->addAddress('waltonusers@gmail.com', 'WALTON'); // use all other mail here
    // $mail->addAddress("$email", "$cname"); // use all other mail here
    $mail->addAddress("$email", "$userName"); // use all other mail here
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Congratulations!! Your pending ticket was response';
    $mail->Body    = "Hi $userName, <br><br>We have a good news for you.<b>Your support ticket issue status updated</b><br><br>Please visit your Account :Link: http://localhost/iubat/customer_support/login.php <br><br>Regards<br>WALTON";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    // $mail->addAttachment("/c/wamp64/www/customer_support/images/walton.jpg");
    $mail->addAttachment("C:\wamp64\www\iubat\customer_support\images\walton.jpg");
    $mail->send();
    echo "Mail has been sent successfully!";
    return 1;
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  



