<?php
	$catID = $_GET['PIN_ID'];
	$con = mysql_connect("localhost","root","root");

	if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
  }

	mysql_select_db("zip1133605010042", $con);
	
	
	
	$query = "SELECT ZIP_COMMENT_MASTER.PID, ZIP_COMMENT_MASTER.PIN_ID, ZIP_COMMENT_MASTER.COMMENT, ZIP_COMMENT_MASTER.COMMENT_TIME, ZIP_COMMENT_MASTER.FB_ID, ZIP_COMMENT_MASTER.FB_NAME, COUNT(ZIP_LIKE_MASTER.PINID) AS LK FROM ZIP_COMMENT_MASTER LEFT JOIN ZIP_LIKE_MASTER ON ZIP_COMMENT_MASTER.PID = ZIP_LIKE_MASTER.PINID WHERE ZIP_COMMENT_MASTER.PIN_ID='".$catID."' GROUP BY ZIP_COMMENT_MASTER.PID ORDER BY COMMENT_TIME ASC";
	
	$result = mysql_query($query);

	$count = mysql_num_rows($result);
	header('Content-type: application/json');
        
    $posts = array();
          
    while($post = mysql_fetch_assoc($result)){ 
        $posts[] = $post;
    } 	
 
	print json_encode(array('data'=>$posts));
	
	// Clean up
	mysql_free_result($res);
	mysql_close($con); 
?>
