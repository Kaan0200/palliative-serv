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
		<div class="LabelColumn">Parent Page:</div>
		<div class="InputColumn">
			<?php
				$con = get_connection();
				$result = mysqli_query($con, "SELECT title FROM pages WHERE id = ".$parent_id);
				if ($result->num_rows > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo $row['title'];
					}
				}
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
<?php
	if (isset($_POST['Submit'])) {
	// handle the title
	if (empty($_POST["title"])) {
		$titleErr = "Title is required for an article";
	} else {
		$title = clean_input($_POST["title"]);
		if (!preg_match("/^[a-zA-Z0-9 \?\!]*$/",$title)) {
			$titleErr = "Only letters, numbers, punctuation, and white space allowed in the title";
		}
	}
	// handle the maintext
	$text = clean_input($_POST["text"]);
	if (preg_match("[^\w\.@-]", $text)) {
		$textErr = "Invalid characters included in text block.  Allowed characters are \n";
		$textErr = $textErr . "periods, @ symbol, underscore, or hyphen.";
	}
	// handle the detail text
	$detailtext = clean_input($_POST["detailtext"]);
	if (preg_match("[^\w\.@-]", $detailtext)) {
		$textDetErr = "Invalid characters included in detail text block.  Allowed characters\n";
		$textDetErr = $textDetErr . "are periods, @ symbol, underscore, or hyphen.";
	}
	// handle the link text
	$linktext = clean_input($_POST["linktext"]);
	if (!preg_match("/^[a-zA-Z0-9 \?\!]*$/",$linktext)) {
		$linkTextErr = "Only letters, numbers, punctuation, and white space allowed in the subtitle";
	}
	error_log("-----------------submitted form--------------------");
	if ($titleErr == "" and $textErr == "" and $textDetErr == "" and $linktextErr == "") {
		// handle form submission
		$con = get_connection();
		error_log("-------".$query."-------");
		
		mysqli_query($con, "CALL Insert_Page(".$parent_id.",\"".$title."\", \"".$text."\", \"".$detailtext."\", \"".$linktext."\");");
		mysqli_close($con);
	} else {
		echo $parenterr;
		echo $titleErr;
		echo $textErr;
		echo $textDetErr;
		echo $linktextErr;
	}
	}
?>
</form>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>