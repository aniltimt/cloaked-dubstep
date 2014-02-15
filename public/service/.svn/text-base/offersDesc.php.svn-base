<?php
//simulate a remote connection


//include any libraries you want to use here.

//get the $mode var
$mode = stripslashes($_GET['mode']);
//Set the content-type header to xml
header("Content-type: text/xml");
//echo the XML declaration
echo chr(60).chr(63).'xml version="1.0" encoding="utf-8" '.chr(63).chr(62);
?>

<?php
	$con = mysql_connect("localhost","root","root");
	if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
  }

	mysql_select_db("zip1133605010042", $con);
	$id = $_GET["id"];
	$query = "SELECT * FROM ZIP_AD_MASTER WHERE ID='$id'";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {    
		echo "<offer>";
			echo "<ID>".$row[0]."</ID>";
    	echo "<title>".$row[1]."</title>";
    	echo "<desc>".$row[2]."</desc>";
    	echo "<price>".$row[3]."</price>";
    	echo "<currency>".$row[4]."</currency>";
    	echo "<category>".$row[5]."</category>";
    	echo "<icon>".$row[6]."</icon>";
    	echo "<website>".$row[7]."</website>";
    	echo "<email>".$row[8]."</email>";
    	echo "<phone>".$row[9]."</phone>";
    	echo "<lat>".$row[10]."</lat>";
    	echo "<long>".$row[11]."</long>";
    echo "</offer>";
	}
	
	mysql_close($con);
?>
