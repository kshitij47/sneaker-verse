<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
 

$mail = new PHPMailer(true);

if (isset($_POST["send"])){
try {
	$mail->isSMTP();										
	$mail->Host	 = 'smtp.gmail.com;';				
	$mail->SMTPAuth = true;							
	$mail->Username = 'shrikhandekshitij@gmail.com';				
	$mail->Password = '';					
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom($_POST['email'], $_POST['name']);		
	$mail->addAddress('shrikhandekshitij@gmail.com', 'Kshitij Shrikhande');
	
	$mail->isHTML(true);								
	$mail->Subject = $_POST['subject'];
	$mail->Body = $_POST['message'];
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>
