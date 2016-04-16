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
  
  // grab the id 
$page_id = $_GET['id'];
	$con = get_connection();
	$result = mysqli_query($con, "SELECT parent_id, title, text, detail, link_text FROM pages WHERE id = ".$page_id) or die(mysqli_error($con));
	// peel off results from query
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		// store the values from the query
		$parent_id  = $row['parent_id'];
		$title      = $row['title'];
		$text       = $row['text'];
		$detailtext = $row['detail'];
		$linktext   = $row['link_text'];
		// push the variables into the post, so we can retreive it
		$_POST['parent_id'] = $parent_id;
		$_POST['title']     = $title;
		$_POST['text']      = $text;
		$_POST['detail']    = $detailtext;
		$_POST['link_text'] = $linktext;
	}
	mysqli_close($con);
  
    
	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
  
?>
<h2>Use this page to add new pages to the application.</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page: </div>
		<div class="InputColumn">
			<?php
				$con = get_connection();
				$result = mysqli_query($con, "SELECT title FROM pages WHERE id = ".$parent_id);
				if ($result->num_rows > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo $row['title'];
					}
				}
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