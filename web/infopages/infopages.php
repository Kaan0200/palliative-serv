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
  // empty variable holders
  $title = $subtitle = $text = $subtext = $linktext = "";
  $parent_id = 0;
  
  
  
?>

Use this page to edit, add, or delete pages that already exist in the application.
<hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div>
	<div>
		<div class="LabelColumn">Parent Page:</div>
		<div class="InputColumn"><select name="ParentSelect"> </select> </div>
		<br>
		<div class="LabelColumn">Title:</div>
		<div class="InputColumn"><input type="text" name="TitleInput"></input></div> 
		<br>
		<div class="LabelColumn">Subtitle:</div>
		<div class="InputColumn"><input type="text" name="SubtitleInput"></input></div>
		<br>
		<div class="LabelColumn">Text:</div>
		<div class="InputColumn"><textarea rows="5" cols="50" name="MainTextArea"></textarea></div>
		<br>
		<div class="LabelColumn">Detail Text:</div>
		<div class="InputColumn"><textarea rows="5" cols="50" name="DetailTextArea"></textarea></div>
		<br>
		<div class="LabelColumn">Link Text:</div>
		<div class="InputColumn"><input type="text" name="LinkTextInput"></input></div>
	</div>
</div>
<input type="submit" name="submit" value="Submit">


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