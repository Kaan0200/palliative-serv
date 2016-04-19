<?php
	include "../sql_connection.php";

	// we want to retrieve the following updates from the version that is given.
	$mobile_version = $_GET['v'];

	$con   = get_connection();
	$query = "SELECT id, type, statement FROM updates WHERE id >= ".$mobile_version;
	$result = mysqli_query($con, $query);
	
	// create empty array
	$updates = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$updates[] = $row
	}
	
	echo json_encode($updates);
	
	mysqli_close($con);
	
?>