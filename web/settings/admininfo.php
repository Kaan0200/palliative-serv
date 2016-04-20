<html>
<head>
	<?php 
	include '../views/header.html';
	
	session_start();
	if($_SESSION['valid'] == false){ header("Location: ../index.php"); }
?>
</head>
<body>
	<h2>Use this page to find more information about the usage and purpose of this web site.</h2>
	<hr>
	<div class="mainColumn">
		<div class="leftColumn">
			<h3>Site Creation</h3>
		</div>
		<div class="rightColumn">
			<p>This site was created by Alan Kaan Atesoglu for use with the Palliative Mobile,
			iOS application.  The application was created by a team of students from Case Western Reserve
			University in juction with University Hospitals.</p>
		</div>
	</div>
</body>
<?php
	include '../views/footer.html';
?>
</html>