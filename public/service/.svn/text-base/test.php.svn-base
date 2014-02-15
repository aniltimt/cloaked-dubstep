<?php
$to = $_POST["TO"];
$subject = $_POST["SUBJECT"];
$replyTo = $_POST["REPLYTO"];
$msg = $_POST["MESSAGE"];


$to = "neo@ziparama.com";
$subject = "testing";
$replyTo = "neo@ziparama.com";
$msg = "this is a testing testing \n Paragraph";


$message = $msg;


$headers .= 'From: <donotreply@ziparama.com>' . "\r\n";
$headers .= "Reply-To: ". $replyTo . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$mailStatus = mail($to,$subject,$message,$headers);
echo $mailStatus;
?>