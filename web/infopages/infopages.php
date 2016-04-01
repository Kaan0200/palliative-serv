<html>
<head>
	<?php 
	include '../views/header.html';
	include '../sql_connection.php';
	?>
</head>
<body>
<?php

  $page_id = -1;
  $parent_id = 0;
  // empty variable holders
  $title = $subtitle = $text = $detailtext = $linktext = "";
  // error holders
  $titleErr = $subtitleErr = $textErr = $textDetErr = linkTextErr = "";
  /*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// handle the title
	if (empty($_POST["title"])) {
		$titleErr = "Title is required for an article";
	} else {
		$title = clean_input($_POST["title"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$title)) {
			$titleErr = "Only letters, numbers and white space allowed in the title";
		}
	}
	  
	// handle the subtitle
	$subtitle = clean_input($_POST["subtitle"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$subtitle)) {
		$titleErr = "Only letters, numbers and white space allowed in the subtitle";
	}
	
	// handle the maintext
	$text = clean_input($_POST["text"]);
	if (preg_match("[^\w\.@-]"), $text) {
		$textErr = "Invalid characters included in text block.  Allowed characters are \n
		            periods, @ symbol, underscore, or hyphen.";
	}
	
	// handle the detail text
	$detailtext = clean_input($_POST["detailtext"]);
	if (preg_match("[^\w\.@-]"), $detailtext) {
		$textDetErr = "Invalid characters included in detail text block.  Allowed characters\n
		            are periods, @ symbol, underscore, or hyphen.";
	}
	
	// handle the link text
	$linktext = clean_input($_POST["linktext"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$linktext)) {
		$linkTextErr = "Only letters, numbers and white space allowed in the subtitle";
	}
  }  */
  
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
		<div class="LabelColumn">Parent Page:</div>
		<div class="InputColumn">
			<select name="ParentSelect"> </select>
		</div>
		<br>
		<div class="LabelColumn">Title:</div>
		<div class="InputColumn">
			<input type="text" name="TitleInput" value="<?php echo $title;?>"></input>
		</div> 
		<br>
		<div class="LabelColumn">Subtitle:</div>
		<div class="InputColumn">
			<input type="text" name="SubtitleInput" value="<?php echo $subtitle;?>"></input>
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
<input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h3>Input:</h3>";
echo $title;
echo "<br>";
echo $subtitle;
echo "<br>";
echo $text;
echo "<br>";
echo $detailtext;
echo "<br>";
echo $linktext;
echo "<br>";
?>


<style>
  .LabelColumn {
	float: left;
	width: 20%;
	padding-top: 2px;
  }
  .InputColumn {
	padding-top: 2px;
  }
</style>

</body>
<?php
  include '../views/footer.html';
?>

</html>