<?php

// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
			$pinid= $_POST['PINID'];
			$comment= $_POST['COMMENT'];
			$fbID = $_POST['FBID'];
			$fbNAME = $_POST['FBNAME'];
  			
			
		$con = mysql_connect("localhost","root","root");

		mysql_select_db("zip1133605010042", $con);
		
		$sql="INSERT INTO ZIP_COMMENT_MASTER (PIN_ID, COMMENT, COMMENT_TIME, FB_ID, FB_NAME)
		VALUES
		('$pinid','$comment',now(),'$fbID','$fbNAME')";
		
						
		if (!mysql_query($sql,$con)){
		
		
		}
		
		$uid = mysql_insert_id();
	/*	
		mysql_close($con)
	*/	

	echo "Insert Record # ".$uid;
    
   

?>