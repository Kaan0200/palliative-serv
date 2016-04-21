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
		// not currently used
	}
	else if ($_GET['view'] == 3) {
		echo "<h3>These tables show various collected demographic information regarding who uses the mobile application.</h3>";
		
		// execute all age queries
		$age1 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age < 25;");
		$age2 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age >= 25 AND age < 30;");
		$age3 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age >= 30 AND age < 35;");
		$age4 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age >= 35 AND age < 40;");
		$age5 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age >= 40 AND age < 50;");
		$age6 = mysqli_query($con, "SELECT COUNT(id) FROM app_users WHERE age >= 50;");
		// get the result
		$result1 = mysqli_fetch_assoc($age1);
		$result2 = mysqli_fetch_assoc($age2);
		$result3 = mysqli_fetch_assoc($age3);
		$result4 = mysqli_fetch_assoc($age4);
		$result5 = mysqli_fetch_assoc($age5);
		$result6 = mysqli_fetch_assoc($age6);
		// make into a table
		echo "<table border=\"1\"><tr><td>Age Bracket</td><td>User Count</td></tr>";
		echo "<tr><td>Below 25</td><td>".$result1."</td></tr>";
		echo "<tr><td>25 to 30</td><td>".$result2."</td></tr>";
		echo "<tr><td>30 to 35</td><td>".$result3."</td></tr>";
		echo "<tr><td>35 to 40</td><td>".$result4."</td></tr>";
		echo "<tr><td>40 to 50</td><td>".$result5."</td></tr>";
		echo "<tr><td>Above 50</td><td>".$result6."</td></tr>";
		echo "</table>";
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
	<!--<a style="text-decoration:none;" href="analyze.php?view=2">
		<div class="squircleButton">Pages by Certification</div>
	</a> -->
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