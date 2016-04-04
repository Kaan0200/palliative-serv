<html>
<head>
	<?php include '../views/header.html'; ?>
</head>
<body>
<h2>Use this page to edit, add, or delete pages that already exist in the application.</h2>
<hr>

<form action="" method="post">
  <div>
    <div class="LabelColumn">Test Input:</div>
	<div class="InputColumn">
		<input type="text" name="testinput" />
	</div> 
  </div>
  <input name="submit" type="submit">
</form>

<hr>

<?php
	if (isset($_POST['submit'])) {
		$test = $_POST['testinput'];
		echo $test . ": this stuff";
	}

</body>
<?php include '../views/footer.html'; ?>
</html>