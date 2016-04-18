<?php
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
	$data = json_decode(file_get_contents("php://input"));
	print_r($data);
  }
?>