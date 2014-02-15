<?php

// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
			  $adid= $_REQUEST['ADID'];
			 
			
				$con = mysql_connect("localhost","root","root");
				
				mysql_select_db("zip1133605010042", $con);
				
				$sql="UPDATE ZIP_AD_MASTER SET IS_REVOKED = 1 WHERE ID = ".$adid;

				$result=mysql_query($sql,$con);
				
				mysql_close($con);
			
				echo $result;
				
?>