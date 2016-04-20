<?php
	include "../sql_connection.php";

	// we want to retrieve the following updates from the version that is given.
	$mobile_version = $_GET['v'];

	$con   = get_connection();
	$query = "SELECT id, statement FROM updates WHERE id > ".$mobile_version;
	$result = mysqli_query($con, $query);
	
	// create empty array
	$data = array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($data, $row);
	}
	
	echo json_encode($data);
	
	mysqli_close($con);
	
?>