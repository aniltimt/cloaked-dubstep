<?php

$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
$status="no";

$v1 = $_POST["pinName"];
$v2 = $_POST["admin"];


if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	$status="Failed!";
    }
  else
    {
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../pinlib/" . $_FILES["file"]["name"]))
      {
//      echo $_FILES["file"]["name"] . " already exists. ";
	  	$status="This file name Pin Already Exists!";

      }
    else
      {
		$destination = "../pinlib/". $_FILES["file"]["name"];		  
		move_uploaded_file($_FILES["file"]["tmp_name"], $destination);		  
		$status="Uploaded%20Successfully";
		echo $v2."         ";
		$isAdmin = -1;
		echo $v2."         ";
		if($v2=="admin"){
			$isAdmin = 1;
		}else{
			$isAdmin = 0;
		}
		
		
		echo $isAdmin;
		 
		$iconURL = "http://www.ziparama.com/pinlib/".$_FILES["file"]["name"];
		  
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("zip1133605010042", $con);		
		$sql="INSERT INTO ZIP_CATEGORY_MASTER (NAME, ICON, PATH, ADMIN)
		VALUES('$v1','$iconURL','$destination','$isAdmin')";
		
						
		if (!mysql_query($sql,$con)){
		
		
		}
		
		$uid = mysql_insert_id();
		//mysql_close($con)
      }
    }
  }
else	
  {
  echo "Invalid file";
  }
 header("Location: http://ziparama.com/addpin?msg=".$status);
?>