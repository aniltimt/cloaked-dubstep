<?php
echo 'hello email';
mail('adarvinddagar@gmail.com','test api','this is only for testing');
echo '<pre>';
print_r($_POST);
exit();
// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
			$catid= $_POST['CATID'];
			$title= $_POST['TITLE'];
			$desc = $_POST['DESCRIPTION'];
  			$catname = $_POST['CATNAME'];
			$currency = $_POST['CURRENCY'];
			$price= $_POST['PRICE'];
			$web = $_POST['WEBSITE'];
			$email = $_POST['EMAIL'];
			$phone = $_POST['PHONE'];
			$lat = $_POST['locationcordinate'];
			$longitude = $_POST['LONGITUDE'];
            $fromWeb = $_POST['fromWeb'];
    
			
			$imageString = $_POST['IMAGE'];
			
			$fbID= $_POST['FB_ID'];
			$fbName = $_POST['FB_NAME'];
					
			$_SESSION['catid'] = $catid;
			$_SESSION['title'] = $title;
			$_SESSION['description'] = $desc;
			$_SESSION['website'] = $web;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			$_SESSION['location'] = $lat;
				
			$lat = str_replace("(","",$lat);
			$lat = str_replace(")","",$lat);
			$splitted = explode(",",$lat);  			
			
			$lat = $splitted[0];				
			$longitude = $splitted[1];
    
				
		// Image generation starts here		
 			$pathToStore = '../zipimage/';

		  if ($_FILES["file"]["error"] > 0){
		    	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		  }
		  else{
                $fname = $_FILES["file"]["name"];
                $fname = str_replace(" ","-",$fname);
                $_FILES["file"]["name"] = $fname;
              
              /*
			    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			    echo "Type: " . $_FILES["file"]["type"] . "<br />";
			    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			*/
				  if (file_exists($pathToStore . $_FILES["file"]["name"])){
				    //	echo $_FILES["file"]["name"] . " already exists. ";
				  }else{
				      move_uploaded_file($_FILES["file"]["tmp_name"],
				      $pathToStore . $_FILES["file"]["name"]);
				     // echo "Stored in: " . $pathToStore . $_FILES["file"]["name"];
			    }
		  }
    
    // Resize image at this point
    
	// *** Include the class
	include("resize-class.php");
    
	// *** 1) Initialise / load image
	$resizeObj = new resize(($pathToStore . $_FILES["file"]["name"]));
    
	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(200, 200, 'auto');
    
	// *** 3) Save image
	$resizeObj -> saveImage(($pathToStore . $_FILES["file"]["name"]), 100);
    
    
		  	  
	  // Image generation ends here
	
    if(($_FILES["file"]["name"])!=''){
        $imageURL = "http://ziparama.com/zipimage/".$_FILES["file"]["name"];
    }else{
        $imageURL = "";
    }
      echo $imageURL;
      echo "|IMAGE URL ";
				
    
    $datetime = date("Y-m-d");
		$con = mysql_connect("localhost","root","root");

		mysql_select_db("zip1133605010042", $con);
		
		$sql="INSERT INTO ZIP_AD_MASTER (TITLE, DESCRIPTION, PRICE, CURRENCY, CAT_ID, CATEGORY, WEBSITE, EMAIL, PHONE, LAT, LONGITUDE, FB_ID, FB_NAME,ICON, onDate )
		VALUES
		('$title','$desc','$price','$currency','$catid','$catname','$web','$email','$phone','$lat','$longitude', '$fbID', '$fbName', '$imageURL','$datetime')";
		
						
		if (!mysql_query($sql,$con)){
		
		
		}
		
		$uid = mysql_insert_id();
	/*	
		mysql_close($con)
	*/	

	//echo "Insert Record # ".$uid;
    
    if($fromWeb=='YES'){
        header("Location: http://ziparama.com/maputil/addPinPage.php");
    }

?>