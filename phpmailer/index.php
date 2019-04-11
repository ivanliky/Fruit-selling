<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require '../classes/Obradaporudzbine.php';

$kontakt = new Kontakt;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions



try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = ' smtp-mail.outlook.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ivan.mitic.10@singimail.rs';                 // SMTP username
    $mail->Password = 'StoMuGromova91';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

   
    //Recipients
    $mail->setFrom('ivan.mitic.10@singimail.rs', $kontakt->ime);
    $mail->addAddress('ivan.mitic.10@singimail.rs');     // Add a recipient
                 
    $mail->addReplyTo($kontakt->imejl, $kontakt->ime);
  
    $body = $kontakt->sadrzajMejla;
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Komentar';
    $mail->Body  = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
  
    Header( 'Location: ../slanjeMejla.php?uspesno=1' );   
    //echo 'Poruka je uspesno poslata';
} catch (Exception $e) {
    echo 'Poruka ne moze biti poslata: ', $mail->ErrorInfo;
}