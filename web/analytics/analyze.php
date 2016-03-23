<html>
<head>
	<?php include '../views/header.html'; ?>
	<?php include '../sql_connection.php'; ?>
</head>
<body>
<?php 
  sql_connect();
  select_star("test");
?>
</body>
</html>