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
	<div>
		<form name="selectform" action="infopages.php" class="centerform" method="GET">
			<div class="centered">
				
			</div>
			<div class="centered">
				<select name="pageselector" style="max-width:400px">
				<option value="-1">New Page</option>
				<?php
					$con = get_connection();
					// this is the important query
					$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
					printf("selected returned %d rows.\n", mysqli_num_rows($result));
					
					if ($result->num_rows > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							// replace the 'a' and 'b' with the column names
							if ($row["id"] != 1) {
								echo "<option value=".$row["id"].">".$row["title"]."</option>";
							}
						}
					} 
					
					mysqli_close($con);
				?>
				</select>
			</div>
			<input type="submit" value="Select">
		</form>
	</div>
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