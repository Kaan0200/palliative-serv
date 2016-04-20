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
	$con = get_connection();
  
	if ($_GET['view'] == 1) {
		echo "<h3>This table shows which pages in the application users most often view.</h3>";
		echo "<table border=\"1\">";
			echo "<tr><td>Page Title</td><td>Views</td></tr>";
			$result = mysqli_query($con, "SELECT pages.title, SUM(count) AS c FROM stats JOIN pages WHERE page_id = pages.id GROUP BY page_id ORDER BY c DESC;");
			if ($result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>".substr($row['title'],0, 40)."</td><td>".$row['c']."</td></tr>";
				}
			}
		echo "</table>";
	}
	else if ($_GET['view'] == 2) {
		echo "<h3>These tables show various collected demographic information regarding who uses the mobile application.</h3>";
	}
	else if ($_GET['view'] == 3) {
		echo "selected view 3";
	}
	else {
	  	echo "<h3>Select a type of analysis</h3>";
	}
	mysqli_close($con);
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
<style>
 table {
	 border: 2px solid;
	 margin: auto;
 }
</style>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>