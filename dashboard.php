<?php
ob_start();
session_start();
if($_SESSION['name']!='ahmar') {
	header('location:login.php');
  	
  } 
  ?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>php with database connection</title>
 </head>
 <body>
 <h1>select your option</h1>
 <ul>
 	<li>
 	<h2><a href="radio.php">insert data</a></h2>	
 	</li>
 	<li>
 	<h2><a href="insert.php">insert</a></h2>	
 		
 	</li>
 	<li>
 	<h2><a href="logform.php">insert state</a></h2>	
 		
 	</li>

 	<li>
 	<h2><a href="view.php">show data</a></h2>	
 		
 	</li>

 	</li>
 	<li>
 	<h2><a href="logout.php">logout</a></h2>	
 		
 	</li>
 </ul>
 </ul>
 
 </body>
 </html>
