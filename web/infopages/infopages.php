<html>
<head>
	<?php 
	include '../views/header.html';
	include '../sql_connection.php';
	?>
</head>
<body>
<?php

  $page_id = -1;
  // empty variable holders
  $title = $subtitle = $text = $subtext = $linktext = "";
  $parent_id = 0;
  
  
  
?>

<dir>
 Parent Page: <select> </select>
 
 Title: <input type="text"> </input>
 
 Subtitle: <input type="text"> </input>
 
 Text: <input type="text"></input>
 
 Detail Text: <input type="text"></input>
 
 Link Text: <input type="text"></input>
 
</dir>



</body>
<?php
  include '../views/footer.html';
?>
</html>