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
<?php
  $newpage = $_GET['new'];

  if ($newpage == 1) {
	  echo "<h2>Select the parent page for this new info page.</h2>";
  } else if ($newpage == 0) {
	  echo "<h2>Select the info page you want to modify.</h2>";
  } else {
	  echo "<h2 style=\"color:red\">There was an error, please return to the menu and try again.</h2>";
  }
?>
<hr>

<div>
	<table>
	  <?php
	    $con = get_connection();
		// this is the important query
		$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
		printf("<p style=\"color: green\">There are %d pages.</p>\n\n", mysqli_num_rows($result));
					
		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				// replace the 'a' and 'b' with the column names
				
				if ($row["id"] != 1) {
					echo "<tr>";
					echo "<td>".$row['title']."</td>";
					if ($newpage == 1) {
						echo "<td><a href=\"newpages.php?id=".$row["id"]."\"><div class=\"squircleButton_right\">Select Parent</div></a></td>";
					} else if ($newpage == 0) {
						echo "<td><a href=\"modifypages.php?id=".$row["id"]."\"><div class=\"squircleButton_right\">Select Page</div></a></td>";
						echo "<td><a href=\"deleteconfirm.php?id=".$row["id"]."\"\><div class=\"squircleButton_right\">Delete Page</div></a></td>";
					}
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