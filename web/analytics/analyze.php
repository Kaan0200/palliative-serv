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
	get_connection();
  
	if ($_GET['view'] == 1) {
		echo "selected view 1";
	} else if ($_GET['view'] == 2) {
		echo "selected view 2";
	} else if ($_GET['view'] == 3) {
		echo "selected view 3";
	} else {
	  	echo "<h3>Select a type of analysis</h3>";
	}
?>
<div style="text-align:center; margin:10px;">
	<a style="text-decoration:none;" href="analyze.php?view=1">
		<div class="squircleButton">Top Used Pages</div>
	</a>
	<a style="text-decoration:none;" href="analyze.php?view=2">
		<div class="squircleButton">Pages by Certification</div>
	</a>
	<a style="text-decoration:none;" href="analyze.php?view=3">
		<div class="squircleButton">User Statistics</div>
	</a>
</div>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>