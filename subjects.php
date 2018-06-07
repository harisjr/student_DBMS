<?php
ob_start();
session_start();
if($_SESSION['name']!='haris')
{
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Subjects</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
	<div class="top">
		<ul>
			<li><a href="dashboard.php">dashboard</a></li>
			<li><a href="Subjects.php">Subjects</a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</div>
	<div class="userpic">
		<img src="user.png" width="120px" height="120" style="position: fixed; top: 70px;" >
	</div>

</body>
</html>