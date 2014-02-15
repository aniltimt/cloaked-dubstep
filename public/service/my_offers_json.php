<?php
    
    $fbid= $_REQUEST['FBID'];
    
	//$con = mysql_connect("118.139.168.39","zip1133605010042","Hlgd6#6");
	$con = mysql_connect("localhost","root","root");
    
    
	if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    
	mysql_select_db("zip1133605010042", $con);
	
	/*$query = "SELECT ID, TITLE, DESCRIPTION, PRICE, CURRENCY, CAT_ID,CAT_NAME, ICON, WEBSITE, EMAIL, PHONE, LAT, LONGITUDE, FB_ID, DATE_FORMAT(onDate, '%d %b %Y') as onDate, FB_NAME FROM ZIP_AD_MASTER WHERE IS_REPORTED_ABUSED = 0 AND IS_REVOKED = 0";*/
	
    
    $query = "SELECT ID, TITLE, DESCRIPTION, PRICE, CURRENCY, CAT_ID, ICON, WEBSITE, EMAIL, PHONE, LAT, LONGITUDE, FB_ID, DATE_FORMAT(onDate, '%d %b %Y') as onDate, FB_NAME  FROM ZIP_AD_MASTER WHERE IS_REPORTED_ABUSED = 0 AND IS_REVOKED = 0 AND FB_ID='".$fbid."'";
    
	
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