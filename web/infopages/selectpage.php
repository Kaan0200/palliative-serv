<html>
<head>
<link rel="stylesheet" type="text/css" href="/stylesheets/FormStyle.css" />
<?php 
	include '../views/header.html';
	include '../sql_connection.php';
?>
</head>
<body>
<h2>Select an existing page to edit or create a new info page.</h2>
<hr>

<div>
	<div>
		<form name="selectform" action="infopages.php" class="centerform" method="post">
			<div class="centered">
				Select Page:
			</div>
			<div class="centered">
				<select name="pageselector">
				<?php
					$con = get_connection();
					
					$result = mysqli_query($con, "SELECT a, b FROM test") or die(mysqli_error($con));
					
					printf("selected returned %d rows.\n", mysqli_num_rows($result));
					
					if ($result->num_rows > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option value=".row["b"].">".$row["a"]."</option>";
						}
					} 
					
					mysqli_close($con);
				?>
				</select>
			</div>
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