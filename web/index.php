<html>
<head>
  <?php include 'views/header.html'; ?>
</head>
<body>
	<div class="mainColumn">
		<div class="leftColumn">
			<p>Use this to access the informational page system. Here you can modify pages, add or remove pages, and change
			the hierarchical structure.</p>
		</div>
		<div class="rightColumn">
			<a href="infopages/selectpage.php">
				<div class="squircleButton_right">Informational Heirachy</div>
			</a>
		</div>
	</div>
	<div class="mainColumn">
		<div class="leftColumn"> 
			<a href="quizzing/quizzes.php">
				<div class="squircleButton_left">Quizzing System</div>
			</a>
		</div>
		<div class="rightColumn">
			<p> Access the quizzing system to remove modify the applications quizzes and questions.</p>
		</div>
	</div>
	<div class="mainColumn">
		<div class="leftColumn"> 
			<p> View the database tables relating to application usage and what type of users use the application. </p>
		</div>
		<div class="rightColumn">
			<a href="analytics/analyze.php">
				<div class="squircleButton_right">Application Analytics</div>
			</a>
		</div>
	</div>
	<div class="mainColumn">
		<div class="leftColumn"> 
			<a href="settings/settings.php">
				<div class="squircleButton_left">Admin Settings</div>
			</a>
		</div>
		<div class="rightColumn">
			<p> Modify settings for the online portal, including login information and user name info. </p>
		</div>
	</div>
</body>
<footer>
  <?php include 'views/footer.html'; ?>
</footer>