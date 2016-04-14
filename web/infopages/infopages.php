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
		$title = $row['title'];
		$text = $row['text'];
		$detailtext = $row['detail'];
		$linktext = $row['link_text'];
	}
  }
  
  // empty variable holders
  $parent_id = 0;
  $title    = $text    = $detailtext = $linktext   = "";
  $titleErr = $textErr = $textDetErr = $linkTextErr = "";
  
  
  
if ($_SERVER["Submit"] == "POST") {
	// handle the title
	if (empty($_POST["title"])) {
		$titleErr = "Title is required for an article";
	} else {
		$title = clean_input($_POST["title"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$title)) {
			$titleErr = "Only letters, numbers and white space allowed in the title";
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
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$linktext)) {
		$linkTextErr = "Only letters, numbers and white space allowed in the subtitle";
	}
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page: *</div>
		<div class="InputColumn">
			<select name="ParentSelect" style="max-width:400px">
				<option value="-1">Select A Parent Page</option>
				<?php 
					$con = get_connection();
					// this is the important query
					$result = mysqli_query($con, "SELECT id, title FROM pages") or die(mysqli_error($con));
					
					if ($result->num_rows > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							// replace the 'a' and 'b' with the column names
							if ($row["id"] != 1) {
								echo "<option value=".$row["id"].">".$row["title"]."</option>";
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
			<input type="text" name="TitleInput" value="<?php echo $title;?>"></input>
		</div> 
		<br>
		<div class="LabelColumn">Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" name="MainTextArea" value="<?php echo $text;?>"></textarea>
		</div>
		<br>
		<div class="LabelColumn">Detail Text:</div>
		<div class="InputColumn">
			<textarea rows="5" cols="50" name="DetailTextArea" value="<?php echo $detailtext;?>"></textarea>
		</div>
		<br>
		<div class="LabelColumn">Link Text:</div>
		<div class="InputColumn">
			<input type="text" name="LinkTextInput" value="<?php echo $linktext;?>"></input>
		</div>
	</div>
</div>
<input type="submit" name="Submit" value="Submit">
</form>

<?php
if ($_SERVER["Submit"] == "POST") {
	if ($titleErr == "" and $textErr == "" and $textDetErr == "" and $linktextErr == "") {
		echo "All clear";
	}
	echo $titleErr;
	echo $textErr;
	echo $textDetErr;
	echo $linktextErr;
}
?>


<style>

</style>

</body>
<?php
  include '../views/footer.html';
?>

</html>