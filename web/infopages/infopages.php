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

  //populate the parent page selector
  if (empty($_GET['pageselector'])) {
	$page_id = -1;
  } else {
	// grab the id 
	$page_id = $_GET['pageselector'];
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
  }
  
function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
  
?>

<h2>Use this page to edit, add, or delete pages that already exist in the application.</h2>
<hr>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page: *</div>
		<div class="InputColumn">
			<select name="parentselect" style="max-width:400px">
				<option value="-1">Select A Parent Page</option>
				<?php 
					$con = get_connection();
					// this is the important query
					$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
					if ($result->num_rows > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row["id"] != 1) {
								if ($row["id"] == $_POST["parent_id"]) {
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

<?php
if (isset($_POST["Submit"])) {
	// test for errors in the fields
	// handle the parent, it must exist
	if ($_POST["parentselector"] == -1){
		$parenterr = "A parent page is required";
	}
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
	if ($parenterr == "" and $titleErr == "" and $textErr == "" and $textDetErr == "" and $linktextErr == "") {
		// handle form submission
		$con = get_connection();
		$query = "";
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
<style>

</style>

</body>
<?php
  include '../views/footer.html';
?>

</html>