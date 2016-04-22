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
		//$_POST['parent_id'] = $parent_id;
		//$_POST['title']     = $title;
		//$_POST['text']      = $text;
		//$_POST['detail']    = $detailtext;
		//$_POST['link_text'] = $linktext;
	}
	mysqli_close($con);
		
	
	
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
	if (!preg_match("^[a-zA-Z .,\-\!\?]*$", $text)) {
		$textErr = "Invalid characters included in text block.  Allowed characters are \n";
		$textErr = $textErr . "punctuation and hyphens.";
	}
	// handle the detail text
	$detailtext = clean_input($_POST["detail"]);
	if (!preg_match("^[a-zA-Z .,\-\!\?]*$", $detailtext)) {
		$textDetErr = "Invalid characters included in detail text block.  Allowed characters\n";
		$textDetErr = $textDetErr . "punctuation and hyphens.";
	}
	// handle the link text
	$linktext = clean_input($_POST["linktext"]);
	if (!preg_match("^[a-zA-Z .,\-\!\?]*$",$linktext)) {
		$linkTextErr = "Only letters, numbers, punctuation, and white space allowed in the subtitle";
	}
	
	$parent_id = $_POST['parent_id'];
	
	error_log("-----------------submitted form--------------------");
	if ($titleErr == "" and $textErr == "" and $textDetErr == "" and $linktextErr == "") {
		// handle form submission
		$con = get_connection();
		$sql = "CALL Modify_Page(".$page_id.", ".$parent_id.",\"".$title."\", \"".$text."\", \"".$detailtext."\", \"".$linktext."\");";
		error_log("-----".$sql."-----");
		mysqli_query($con, $sql);
		mysqli_close($con);
		echo "<h3 style=\"color:green\">Page successfully updated!</h3>";
	} else {
		echo $parenterr;
		echo $titleErr;
		echo $textErr;
		echo $textDetErr;
		echo $linktextErr;
	}
}
    

	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
  
?>
<h2>Use this page to modify pages in application.</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?id=".$page_id;?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page: </div>
			<select name="parent_id" style="max-width:400px">
				<?php 
					$con = get_connection();
					$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
					if ($result->num_rows > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row["id"] != 1) {
								if ($row["id"] == $parent_id) {
									echo "<option selected='true' value=".$row["id"].">".$row["title"]."</option>";
								} else {
									echo "<option value=".$row["id"].">".$row["title"]."</option>";
								}
							}
						}
					} 
					mysqli_close($con);
				?>
			</select>
		</div>
		<br>
		<div class="LabelColumn">Title: *</div>
		<div class="InputColumn">
			<input type="text" name="title" autocomplete="off" style="width:100%" value="<?php echo $title;?>"></input>
		</div> 
		<br>
		<div class="LabelColumn">Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" style="width:100%" name="text"><?php echo $text;?></textarea>
		</div>
		<br>
		<div class="LabelColumn">Detail Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" style="width:100%" name="detailtext"><?php echo $detailtext;?></textarea>
		</div>
		<br>
		<div class="LabelColumn">Link Text:</div>
		<div class="InputColumn">
			<input type="text" name="linktext" autocomplete="off" style="width:100%" value="<?php echo $linktext;?>"></input>
		</div>
	</div>
</div>
<input type="submit" name="Submit" value="Submit">
</form>
</body>
<footer>
<?php
  include '../views/footer.html';
?>
</footer>
</html>