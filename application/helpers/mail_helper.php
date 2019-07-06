<?php

function send_mail($message){
    require './vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "username@gmail.com";
    $mail->Password = "Password";
    $mail->setFrom('admin@acme.com', 'Acme Computers');
    $mail->addAddress('itxshakiil@gmail.com', 'Shakil Alam');
    $mail->Subject = 'Reset Password';
    $mail->isHTML(true);
    $mail->Body = $message;
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
