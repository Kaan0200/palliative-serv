<?php




$servername = "l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
$username = "blwusy6p9r16bm03";
$password = "z0j9g1st5u43bf3g";

function test_connection() {
  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  // "Connected successfully";
  return True;
}

function get_connection() {
	$conn = new mysqli($servername, $username, $password);
	
	  // Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	 
	
	return $conn;
}

function select_star($table) {
	// create connection
	$conn = new mysqli($servername, $username, $password);
	
	if (test_connection()) {
		
		$query = "SELECT * FROM ".$table;
		echo $query;
		
		if ($result = $mysqli->query($query)) {
			return $result;
			}
		}
	}
	
	$conn-> close();
}
?>