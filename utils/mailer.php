<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'./../env.php';


function sendMail($username, $to, $subject, $body){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                     
        $mail->Username   = "ahmed.benkrara12@gmail.com";                 
        $mail->Password   = "cgidqganvckpgtch";                    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port       = 587;                                      
    
        //Recipients
        $mail->setFrom("ahmed.benkrara12@gmail.com", 'LawyerConnect');
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
