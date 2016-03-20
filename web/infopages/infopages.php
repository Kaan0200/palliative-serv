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

<div>
	<div>
		<div class="LabelColumn">Parent Page:</div>
		<div class="InputColumn"><select name="ParentSelect"> </select> </div>
		<br>
		<div class="LabelColumn">Title:</div>
		<div class="InputColumn"><input type="text" name="TitleInput"></input></div> 
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



</body>
<?php
  include '../views/footer.html';
?>

<style>
  .LabelColumn {
	  
	  float: left;
  }
  .InputColumn {
	  float: right;
  }
</style
</html>