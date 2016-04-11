<html>
<head>
  <?php include 'views/header.html'; ?>
</head>
<body>
	<?php
	session_start();
	session_unset();
	session_destroy();
	
	echo "You are now logged out.  You will be redirected to the login in 10 seconds...";
	?>
	<meta http-equiv="refresh" content="10;url=http://palliative-serv.herokuapp.com/index.php">
</body>
