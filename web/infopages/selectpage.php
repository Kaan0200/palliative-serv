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
				<?php
				
				$servername = "l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
$username = "blwusy6p9r16bm03";
$password = "z0j9g1st5u43bf3g";
$schema   = "pd7pzy9z4cu7ces1";

					$con = mysqli_connect($servername, $username, $password, $schema);
					
					$result = mysqli_query($con, "SELECT a FROM test") or die(mysqli_error($con));
					
					printf("selected returned %d rows.\n", mysqli_num_rows($result));
					
					//while ($row = mysqli_fetch_assoc($result)) {
					//	echo "{$row['a']}";
					//}
					
					mysqli_close($con);
				?>
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