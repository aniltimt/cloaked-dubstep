<?php
	$server = 'tmouser2.db.3092577.hostedresource.com';
	$database = 'tmouser2';
	$username = 'tmouser2';
	$password = 'Tmo5807';




	// GET REQUEST ATTRIBUTES
	$user = $_REQUEST["user"];
	$pwd = $_REQUEST["pwd"];

echo $user;
echo $pwd;

echo "testing-2";
/*	
  $con = mssql_connect($server, $username, $password);
  mssql_select_db($database, $con);


$sql = "INSERT INTO TMO3_USER_MASTER (USERNAME, PASSWORD)
VALUES ('neo')";

  
  $res = mssql_query($sql,$con);
  if (!$res) {
    print("SQL statement failed with error:\n");
    print("   ".mssql_get_last_message()."\n");
  } else {
    print("One data row inserted.\n");
  }  
echo $res;
  mssql_close($con); */
?>