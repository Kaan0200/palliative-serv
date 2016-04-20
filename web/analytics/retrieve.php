<?php
	include "../sql_connection.php";
  // use this for ingesting json that will be submitted into the server analytics
  /*  EXAMPLE JSON
  
[ “credentials” : [
    “device” : deviceID string
    “age” : number as string
    “postGrad” : bool as string
    “years” : number as string
    “certification” : specialty as string
    “practice” : practice setting as string
  ]
 “page_hits” : [
    page_id (int) : # of hits (int)
 ]
]
  */
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data = json_decode(file_get_contents("php://input"), TRUE);
	error_log("==request method post==");
	
	$con   = get_connection();
	$query = "INSERT INTO app_users (device,  age, postGrad, years, cert, practice) VALUES ";
	$query = $query."(\"".$data['credentials']['device']."\", ".$data['credentials']['age'].", ".$data['credentials']['postGrad'];
	$query = $query.", ".$data['credentials']['years'].", \"".$data['credentials']['certification']."\", \"".$data['credentials']['practice']."\");";
	
	error_log("QUERY: ".$query);
	mysqli_query($con, $query);
	
	foreach($data['page_hits'] as $key => $hit) {
		$query = "Add_Hits(\"".$data['credentials']['device']."\", ".$key.", ".$hit.");";
		error_log("QUERY: ".$query);
		//mysqli_query($con, $query);
	}
	
	mysqli_close($con);
  }
?>