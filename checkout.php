<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exceptions;

require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPmailer.php';
require 'vendor/phpmailer/src/SMTP.php';
require 'environment.php';

$usrName = $_POST['name'];
$usrEmail = $_POST['email'];
$usrSubject = $_POST['subject'];
$usrMsg = $_POST['message'];

$email_subject = "Enquiry: " . $usrSubject . " from Website.";
$email_body = "Name: " . $usrName . "<br />Email:" . $usrEmail . "<br />Message: " . $usrMsg;

if (isset($_POST["send"])) {
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "shrikhandekshitij@gmail.com"; //our Gmail
  $mail->Password = "d2bei1ng0pu9ne"; // Gmail App Psswords
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom($usrEmail);

  $mail->addAddress($_ENV["SYS_EMAIL"], "noreply"); //Our Gmail

  $mail->isHTML(true);

  $mail->Subject = $email_subject;
  $mail->Body = $email_body;

  $mail->send();

  echo "
    <script>
    alert('Message sent Successfully');
    document.location.href = 'contact.html';
    </script>
    ";
}