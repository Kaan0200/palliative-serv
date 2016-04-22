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
  echo "<h3>Confirm deletion of existing page?</h3>";
  echo "*This page will be completely unrecoverable, there is no undo."
?>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>