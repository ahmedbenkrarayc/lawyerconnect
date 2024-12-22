<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/../env.php';
require __DIR__.'/../vendor/autoload.php';

$mail = new PHPMailer(true);

function sendMail($username, $to, $subject, $body){
    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                     
        $mail->Username   = $mail_user;                 
        $mail->Password   = $mail_password;                    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port       = 587;                                      
    
        //Recipients
        $mail->setFrom($mail_user, 'LawyerConnect');
        $mail->addAddress($to, $username);
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>
