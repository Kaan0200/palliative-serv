<html>
<head>
  <?php include 'views/header.html'; ?>
</head>
<body>
<?php
  include("sql_connection.php");
  session_start();
  $connection = get_connection();
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	
	$sql = "SELECT id FROM settings WHERE name = 'username' and value = '".$username."' UNION SELECT id from settings WHERE name = 'password' and value = '".$password."'";
	
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	
	if ($count == 2) {
		$_SESSION['login_user']=$username;
		$_SESSION['valid'] = true;
		header("location: menu.php");
	} else {
		$error = "Username or Password is invalid";
		$_SESSION['valid'] = false;
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
  <?php echo $error ?>
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