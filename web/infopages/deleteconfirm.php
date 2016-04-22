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
  echo "*This page will be completely unrecoverable, there is no undo.";
  echo "<hr>";
  
  $page_to_del = $_GET["id"];
  $_POST['id'] = $page_to_del;
  $con = get_connection();
  $query = "SELECT title FROM pages WHERE id =".$page_to_del.";";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_assoc($result)) {
	  echo "<h4>Page Selected: \"".$row['title']."\"</h4>";
  }
  $query = "SELECT COUNT(*) AS c FROM pages WHERE parent_id = ".$page_to_del.";";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_assoc($result)) {
	  echo "<h4>There are ".$row['c']." pages that are the children of the page selected to be deleted</h4>";
  }

  
  if (isset($_POST['Submit'])) {
	  error_log("deleting page with id".$_POST['id']);
	  $query = "CALL Delete_page(".$_POST['id'].")";
	  
  }
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?id=".$page_id;?>"> 
	<input type="hidden">
	<input type="submit" name="Submit" value="Confirm Delete"></input>
</form>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>