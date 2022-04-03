<?php
/**
 *
 * KVS external smtp
 * @Home:  https://github.com/kernel-video-sharing/kvs-external-smtp
 * @version  1.0
 * @Copyright © 2022 PornSir
 * @License GPL
 */


/**
 * @param $email
 * @param $subject
 * @param $body
 * @param $headers
 * @return string
 * @throws \PHPMailer\PHPMailer\Exception
 */

function kvs_mail($email,$subject,$body,$headers){

    global $config;

    include_once "phpmailer/src/Exception.php";
    include_once "phpmailer/src/PHPMailer.php";
    include_once "phpmailer/src/SMTP.php";

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $config['smtp_host'];                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $config['smtp_user'];                   //SMTP username
    $mail->Password   = $config['smtp_pass'];                   //SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = $config['smtp_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom($config['smtp_from'], $config['smtp_name']);
    $mail->addAddress($email);                     //Name is optional
    $mail->addReplyTo($config['replytous']);

    // Attachments
    //    $attchments = "{$config['project_path']}/static/images/logo.png";
    //    $mail->addAttachment($attchments, 'latest.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;
    if(!$mail->Send()) {
        return "Mailer Error: " . $mail->ErrorInfo;
    } else {
        return "Message has been sent";
    }
}


