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

  // empty variable holders
  $parent_id = 0;
  $title    = $text    = $detailtext = $linktext   = "";
  $titleErr = $textErr = $textDetErr = $linkTextErr = $parenterr = "";
  
    
	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	// get value
	$parent_id = $_GET['id'];
  
?>
<h2>Use this page to add new pages to the application.</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page: *</div>
		<div class="InputColumn">
			<?php
				$con = get_connection();
				// query
				$result = mysqli_query($con, "SELECT title FROM pages WHERE id = ".$parent_id)
				mysqli_close($con);
			?>
		</div>
		<br>
		<div class="LabelColumn">Title: *</div>
		<div class="InputColumn">
			<input type="text" name="title" style="width:100%" value="<?php echo $_POST["title"];?>"></input>
		</div> 
		<br>
		<div class="LabelColumn">Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" style="width:100%" name="text"><?php echo $_POST["text"];?></textarea>
		</div>
		<br>
		<div class="LabelColumn">Detail Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" style="width:100%" name="detailtext"><?php echo $_POST["detailtext"];?></textarea>
		</div>
		<br>
		<div class="LabelColumn">Link Text:</div>
		<div class="InputColumn">
			<input type="text" name="linktext" style="width:100%" value="<?php echo $_POST["linktext"];?>"></input>
		</div>
	</div>
</div>
<input type="submit" name="Submit" value="Submit">
</form>