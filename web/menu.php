<html>
<head>
  <?php include 'views/header.html'; ?>
  
</head>
<body>
<?php 
session_start();
if($_SESSION['valid'] == false){ header("Location: index.php"); }
?>

	<div class="mainColumn">
		<div class="leftColumn">
			<h3>Informational Heirachy</h3>
			<p>Use this to access the informational page system. Here you can modify pages, add or remove pages, and change
			the hierarchical structure.</p>
		</div>
		<div class="rightColumn">
			<a href="infopages/selectpage.php?new=1">
				<div class="squircleButton_right">Create New Page</div>
			</a>
			<div style="height:40px"> </div>
			<a href="infopages/selectpage.php?new=0">
				<div class="squircleButton_right">Modify Existing Page</div>
			</a>
		</div>
	</div>
	<hr>
	<div class="mainColumn">
		<div class="leftColumn"> 
			<a href="analytics/analyze.php">
				<div class="squircleButton_left">Application Analytics</div>
			</a>
		</div>
		<div class="rightColumn">
			<p> View the database tables relating to application usage and what type of users use the application. </p>
		</div>
	</div>
	<hr>
	<div class="mainColumn">
		<div class="leftColumn"> 
			<p> Modify settings for the online portal, including login information and password. </p>
			<p> View information regarding the use of the online portal, and more details on the data storage and
			interaction with the mobile application</p>
		</div>
		<div class="rightColumn">
			<a href="settings/settings.php">
				<div class="squircleButton_right">Admin Settings</div>
			</a>
			<div style="height:40px"> </div>
			<a href="settings/admininfo.php">
				<div class="squircleButton_right">Administrative Information</div>
			</a>
		</div>
	</div>
</body>
<footer>
  <?php include 'views/footer.html'; ?>
</footer>