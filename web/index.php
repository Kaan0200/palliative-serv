<html>
<head>
  <?php include 'views/header.html'; ?>
</head>
<body>
<?php
  include("sql_connection.php");
  
  $connection = get_connection();

 session_start();
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	
	$sql = "SELECT id FROM settings WHERE username = '$username' and password = '$password'";
	
	$result = mysqli_query($connection, $sql);
	$rows = mysqli_num_rows($result);
	if ($rows == 2) {
		$_SESSION['login_user']=$username;
		header("location: menu.php");
	} else {
		$error = "Username or Password is invalid";
	}
	mysqli_close($connection);
 }
?>
  <form class="form" method="post">
	<div>
		<div>Username:</div>
		<input type="text" name="username">
	</div>
	<div>
		<div>Password:</div>
		<input type="password" name="password">
	</div>
	<input type="submit" name="submit" value="Login">
  </form>
</body>
<style>
 .form{
	text-align: center;
    padding: 10px;
 }
 input {
	 margin: 5px;
 }
</style>