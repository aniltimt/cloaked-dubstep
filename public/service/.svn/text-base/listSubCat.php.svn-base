<?php
$catID = $_GET['CAT_ID'];
	//$con = mysql_connect("118.139.168.39","zip1133605010042","Hlgd6#6");
	$con = mysql_connect("localhost","root","root");

	if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
  }

	mysql_select_db("zip1133605010042", $con);
	
	$query = "SELECT ID, CAT_ID, SUB_CAT_NAME, ICON FROM ZIP_SUB_CATEGORY_MASTER WHERE CAT_ID='".$catID."'";
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
