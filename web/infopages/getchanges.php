<?php
	include "../sql_connection.php";

	// we want to retrieve the following updates from the version that is given.
	$mobile_version = $_GET['v'];

	$con   = get_connection();
	$query = "SELECT id, type, statement FROM updates WHERE id >= ".$mobile_version;
	$result = mysqli_query($con, $query);
	
	// create empty array
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data = array(
			'id'        => $row['id'],
			'type'      => $row['type'],
			'statement' => $row['statement']
		);
	}
	
	echo json_encode($updates);
	
	mysqli_close($con);
	
?>