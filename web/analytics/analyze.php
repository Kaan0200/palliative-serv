<html>
<head>
	<?php include '../views/header.html'; ?>
	<?php include '../sql_connection.php'; ?>
</head>
<body>
<?php 
  sql_connect();
  $result->select_star("test");
  
  echo '<table cellpadding="0" cellspacing="0" class="db-table">';
  echo '<tr><th>ID</th><th>A</th><th>B</th>';
  while ($row = mysqli_fetch_row($result)) {
	  echo '<tr>';
	  foreach ($row as $key => $value) {
		  echo '<td>',$value,'</td>'; 
	  }
	  echo '</tr>';
  }
  echo '</table><br/>';
?>
</body>
</html>