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
	<?php
		$errText  = "";
 		$new_name = $_POST['username'];
		$pass1    = $_POST['password1'];
		$pass2    = $_POST['password2'];
		
		// check that username is alphanumeric
		if (empty($new_name)) {
			$errText = "Username cannot be empty. \n";
		}
		if (!preg_match("^[a-zA-Z0-9]*", $new_name)){
			$errText = $errText."Username must be alphanumeric. \n";
		}
		//check that we are doing password1
		if (!empty($pass1)){
			if (!preg_match("^[a-zA-Z0-9]*",$pass1)){
				$errText = $errText."Password must be alphanumeric. \n";
			}
			if (!strcmp($pass1, $pass2)){
				$errText = $errText."Passwords are not the same. \n";
			}
		}
		
		// completely clean so submit
		if ($errText == ""){
			$con = get_connection();
			error_log("submitted new username");
			mysqli_query($con, "UPDATE settings SET value =\"".$new_name."\" WHERE id = 0");
			echo "<h3 style=\"color:green\">Changed Username</h3>";
			if (!empty($pass1)) {
				error_log("submitted new password");
				mysqli_query($con, "UPDATE settings SET value =\"".$pass1."\" WHERE id = 1");
				echo "<h3 style=\"color:green\">Changed Password</h3>";
			}
		} else {
			echo "<h3 style=\"color:red\">".$errText."</h3>";
		}
	?>

</body>
<?php
	include '../views/footer.html';
?>
</html>