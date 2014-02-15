<?php
//simulate a remote connection


//include any libraries you want to use here.

//get the $mode var
    $fbid= $_REQUEST['FBID'];
$mode = stripslashes($_GET['mode']);
//Set the content-type header to xml
header("Content-type: text/xml");
//echo the XML declaration

echo chr(60).chr(63).'xml version="1.0" encoding="utf-8" '.chr(63).chr(62);
?>
<offerList>
<?php
	//$con = mysql_connect("118.139.168.39","zip1133605010042","Hlgd6#6");
	$con = mysql_connect("localhost","root","root");

	if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
  }

	mysql_select_db("zip1133605010042", $con);
	
	$query = "SELECT ID, TITLE, DESCRIPTION, PRICE, CURRENCY, CAT_ID, ICON, WEBSITE, EMAIL, PHONE, LAT, LONGITUDE, FB_ID, DATE_FORMAT(onDate, '%d %b %Y') as onDate, FB_NAME  FROM ZIP_AD_MASTER WHERE IS_REPORTED_ABUSED = 0 AND IS_REVOKED = 0 AND FB_ID='".$fbid."'";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {    
		echo "<offer>";
			echo "<ID>".$row['ID']."</ID>";
    	echo "<title>".$row['TITLE']."</title>";
		$desc = $row['DESCRIPTION'];
		$enc = str_replace("&","&amp;",$desc);
    	echo "<desc>".$enc."</desc>";
    	//echo "<price>".$row['PRICE']."</price>";
    	//echo "<currency>".$row['CURRENCY']."</currency>";
    	echo "<category>".$row['CAT_ID']."</category>";
    	echo "<icon>".$row['ICON']."</icon>";
    	echo "<website>".$row['WEBSITE']."</website>";
    	echo "<email>".$row['EMAIL']."</email>";
    	echo "<phone>".$row['PHONE']."</phone>";
    	echo "<lat>".$row['LAT']."</lat>";
    	echo "<long>".$row['LONGITUDE']."</long>";
        echo "<fbid>".$row['FB_ID']."</fbid>";
        echo "<postDate>".$row['onDate']."</postDate>";
        echo "<fbName>".$row['FB_NAME']."</fbName>";
    echo "</offer>";
	
	
	}
	
	mysql_close($con);
?>
</offerList>