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
			<p>
			This site was created for use with the Palliative Mobile, iOS application.  The
			application was created by a team of students from Case Western Reserve
			University in juction with University Hospitals.
			</p>
		</div>
		<div class="leftColumn">
			<h3>Mobile App Interaction</h3>
		</div>
		<div class="rightColumn">
			<p>
			The webserver has 2 primary interactions with the mobile application.  The first of which
			is it functions as a method of pushing updates from the server to the mobile application without 
			forcing users to go through app store updates.  This allows the application to recieve new 
			information much more quickly.
			The second interaction is from the phone to the server.  The mobile application sends usage data
			regarding which informational pages are being viewed the most, as well as the optionally submitted
			demographic data.  This occures as the same time as the first updates.
			</p>
		</div>
		<div class="rightColumn">
			<h3>Application User Anonimity</h3>
		</div>
		<div class="leftColumn">
			<p>
			Due to the sensative nature of medical information as well as those who provide it, the application
			keeps a minimal amount of identifying information about users.  None of which can be used to specifically
			identify them, and none of which is not volunteered.  When recieving usage and demographical information
			from an application installation, the server uses an ID that is given to each individual install of the
			application.  This allows the data to understand the number of users.  This ID is only tied to the installation
			on the phone and does not contain any specific information about the actual phone identity.
			</p>
		</div>
	</div>
</body>
<?php
	include '../views/footer.html';
?>
</html>