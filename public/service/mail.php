<?php
//define the receiver of the email
$to = 'theneoenderson@gmail.com';
//define the subject of the email
$subject = 'Test email';
//define the message to be sent. 
$message = "Hello World!\r\nThis is my mail.";
//define the headers we want passed. 
$header = "From: neo@ziparama.com"; // must be a genuine address
//send the email
$mail_sent = mail($to, $subject, $message, $header);
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 

echo $mail_sent ? "Mail sent" : "Mail failed";
?>