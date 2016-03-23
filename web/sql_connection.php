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

function select_star($table) {
	// create connection
	$conn = new mysqli($servername, $username, $password);
	
	if (test_connection()) {
		
		$query = "SELECT * FROM ".$table;
		echo $query;
		
		if ($result = $mysqli->query($query)) {
			while ($row = $result->fetch_row()) {
				echo ("%s : %s : %s\n", $row[0], $row[1], $row[2]);
			}
		}
		
		$result->close();
	}
	
	$conn-> close();
}
?>