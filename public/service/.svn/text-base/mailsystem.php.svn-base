<?php
$to = $_POST["TO"];
$subject = $_POST["SUBJECT"];
$replyTo = $_POST["REPLYTO"];
$msg = $_POST["MESSAGE"];

$subject = "Ziparama :: ".$subject;
$msg = $msg;

/*$to = "neo@ziparama.com";
$subject = "testing";
$replyTo = "neo@ziparama.com";
$msg = "this is a testing <p> testing Paragraph</p>"*/


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0";
$headers .= "Content-type: text/plain; charset=iso-8859-1";	

// More headers
$headers .= "From: Ziparama Support <donotreply@ziparama.com>"; 
$headers .= "Reply-To: ". $replyTo ;
$headers .= "X-Mailer: PHP/".phpversion();


$mailStatus = mail($to,$subject,$msg, $headers);
echo $mailStatus;
?>