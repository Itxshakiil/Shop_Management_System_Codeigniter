<?php

function send_mail($reciever_address,$name='',$subject,$message){
    require './vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "itxshakilalam@gmail.com";
    $mail->Password = "Shakil@317";
    $mail->setFrom('admin@acme.com', 'Acme Computers');
    $mail->addAddress($reciever_address,$name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
