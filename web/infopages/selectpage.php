<html>
<head>
	<?php 
	include '../views/header.html';
	?>
</head>
<body>
<h2>Select an existing page to edit or create a new info page.</h2>
<hr>

<div>
	<div>
		<form name="selectform" action="infopages.php" class="centerform">
			<div class="centered">
				Select Page:
			</div>
			<div class="centered">
				<select name="ParentSelect"> </select>
			</div>
		</form>
	</div>
</div>

<style>
  .centered {
	  display: inline;
  }
  .centerform {
	text-align: center;
    margin: auto;
    margin-bottom: 50px;
    margin-top: 50px;
    vertical-align: middle;
  }
</style>

</body>
<?php
  include '../views/footer.html';
  include '../stylesheets/FormStyle.css';
?>
</html>