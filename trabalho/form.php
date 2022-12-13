<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try
{
    if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
                        $assunto = $_POST['assunto'];
              }
           if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                         $mensagem = $_POST['mensagem'];
               }

    $mail->isSMTP();       
    $mail->SMTPAuth = true; 
    $mail->Username   = 'ruanschneider04@gmail.com';
    $mail->Password   = 'bpcofichnokpfrcb';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPDebug = 2;

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->setFrom('ruanschneider04@gmail.com', 'eu');
    $mail->addAddress('ruanschneider04@gmail.com', 'Destinatário');

    $mail->isHTML(true);  
    $mail->Subject = $assunto;
    $mail->Body  = nl2br($mensagem);
    $mail->AltBody = nl2br(strip_tags($mensagem));
    // Enviar
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}