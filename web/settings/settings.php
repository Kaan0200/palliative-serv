<html>
<head>
	<?php 
	include '../views/header.html';
	include '../sql_connection.php';
	
	session_start();
	if($_SESSION['valid'] == false){ header("Location: ../index.php"); }
?>
</head>
<body>
	<h2>Use this page to modify login settings for this website.</h2>
	<hr>
	<form method="post" action="results.php">
		<div>Username (alphanumeric)</div>
		<input type="text" name="username" value="<?php 
			$con = get_connection();
			$result = mysqli_query($con, "SELECT value FROM settings WHERE id = 0");
			if ($result->num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo $row['value'];
				}
			}
		?>"/>
		<div>Password (Leave blank if you don't want to change)</div>
		<input type="password" name="password1"></input>
		<div>Repeat Password</div>
		<input type="password" name="password2"></input>
		<input type="submit" name="Submit" value="Save">
	</form>
</body>
<?php
	include '../views/footer.html';
?>
</html>