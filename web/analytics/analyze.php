<html>
<head>
	<?php 
	include '../views/header.html';
	include '../sql_connection.php';
	
	session_start();
	//if($_SESSION['valid'] == false){ header("Location: ../index.php"); }
	
	?>
</head>
<body>
<?php 
	sql_connection();
  
	if ($_GET['view'] == 1) {
		echo "selected view 1";
	} else if ($_GET['view'] == 2) {
		echo "selected view 2";
	} else {
	  	echo "Select a type of analysis";
	}
?>
<div>
	<div class="squircleButton">Top Used Pages</div>
	<div class="squircleButton">Pages by Certification</div>
	<div class="squircleButton">User Statistics</div>
</div>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>