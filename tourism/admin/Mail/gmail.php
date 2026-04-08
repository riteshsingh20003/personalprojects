<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
function gmail($receiver,$subject,$description){


$mail = new PHPMailer;

$mail->isSMTP();                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;               // Enable SMTP authentication
$mail->Username = "solankiujash280204@gmail.com";   // SMTP username
$mail->Password = "Pr@#l@d1305@Uj@$#";   // SMTP password
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                    // TCP port to connect to

// Sender info
$mail->setFrom("solankiujash280204@gmail.com", 'Tourism System');
// Add a recipient
$mail->addAddress($receiver);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
$mail->isHTML(true);

// Mail subject
$mail->Subject = $subject;

// Mail body content
$bodyContent = '<h1>Tourism Management System</h1>';
$bodyContent = '<p>'.$description.'</p>';
$mail->Body    = $bodyContent;

$mail->send();

}

?>