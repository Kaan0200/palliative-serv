<html>
<head>
<link rel="stylesheet" type="text/css" href="/stylesheets/FormStyle.css" />
<?php 
	include '../views/header.html';
	include '../sql_connection.php';
	
	session_start();
	if($_SESSION['valid'] == false){ header("Location: ../index.php"); }
?>
</head>
<body>
<h2>Select an existing page to edit or create a new info page.</h2>
<hr>

<div>
	<table>
	  <?php
	    $con = get_connection();
		// this is the important query
		$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
		printf("selected returned %d rows.\n", mysqli_num_rows($result));
					
		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				// replace the 'a' and 'b' with the column names
				
				if ($row["id"] != 1) {
					echo "<tr>";
					echo "<td>".$row['title']."</td>";
					echo "<td><div class=\"squircleButton_left\">Select Parent</div></td>";
					echo "</tr>";
				}
			}
		} 
		mysqli_close($con);
	  ?>
	</table>
</div>

<style>
  .centered {
	  display: inline;
  }
  .centerform {
	text-align: center;
    margin: auto;
    margin-bottom: 50px;
    margin-top: 50px;
    vertical-align: middle;
  }
</style>

</body>
<?php
	include '../views/footer.html';
?>
</html>