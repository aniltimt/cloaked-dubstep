<?php

// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
			  $adid= $_REQUEST['ADID'];
			  $fbID= $_REQUEST['FB_ID'];

			
				$con = mysql_connect("localhost","root","root");
				
				mysql_select_db("zip1133605010042", $con);
				
				$sql="UPDATE ZIP_AD_MASTER SET IS_REPORTED_ABUSED = 1, ABUSE_REPORT_FB_ID =".$fbID."  WHERE ID = ".$adid;

				$result=mysql_query($sql,$con);
				if (!$result)
				  {
				
				
				  }
				
				
			
				mysql_close($con);
			
				echo $result;
				
				// Report to Admin by Email
							
				//$to = "reportabuse@ziparama.com";
				$to = "reportabuse@ziparama.com";
				$subject = "Ad # ".$adid." is reported as abuse";				
				
				echo "A";
				
				$message = "
				<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				Dear Admin,<br>
				One advertise with Ad # ".$adid." is reported as abuse. Please execute the SQL query to see and take action \"SELECT * FROM ZIP_AD_MASTER WHERE ID = ".$adid."\"
				</br>
				</body>
				</html>
				";
				
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				
				// More headers
				$headers .= 'From: <donotreply@ziparama.com>' . "\r\n";

				
				$mailStatus = mail($to,$subject,$message,$headers);
				
				echo $mailStatus;
				
		
?>