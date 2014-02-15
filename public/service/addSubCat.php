<?php

$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
$status="no";

$v1 = $_POST["pinName"];
$v2 = $_POST["CATID"];


if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
   // echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	$status="Failed!";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../catlib/" . $_FILES["file"]["name"]))
      {
  //    echo $_FILES["file"]["name"] . " already exists. ";
	  	$status="This file name Pin Already Exists!";

      }
    else
      {
      	
				$destination = "../catlib/". $_FILES["file"]["name"];		  
			//	echo $destination;
				move_uploaded_file($_FILES["file"]["tmp_name"], $destination);		  
				$status="Uploaded%20Successfully";		
				
				 
				$iconURL = "http://www.ziparama.com/catlib/".$_FILES["file"]["name"];
	//			echo 'Created URL '.$iconURL;
				
				$con = mysql_connect("localhost","root","root");
				mysql_select_db("zip1133605010042", $con);
				
				$sql="INSERT INTO ZIP_SUB_CATEGORY_MASTER (CAT_ID, SUB_CAT_NAME,ICON)
				VALUES('$v2','$v1','$iconURL')";
		
						echo $sql;
		if (!mysql_query($sql,$con)){
		
		
		}
		
		$uid = mysql_insert_id();
	//	echo $uid;
		//mysql_close($con)
      }
    }
  }
else	
  {
  echo "Invalid file";
  }
 header("Location: http://ziparama.com/addsubcat?msg=".$status);
?>