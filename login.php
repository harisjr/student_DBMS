<!DOCTYPE html>
<html>
<head>
	<title>login | folksity</title>
</head>
<body>
<?php
if (isset($_POST['frm1'])) 
{
 try{
 	if (empty($_POST['usr'])) {
 		throw new Exception("username cannot be empty");
 		
 		# code...
 	}
 	if (empty($_POST['pwd'])) {
 		throw new Exception("pass cannot be empty");
 		
 		# code...
 	}
 	include('normal.php');
 	$num=0;
 	$statement=$db->prepare("select * from std_login where username=? and password=?");
 	$statement->execute(array($_POST['usr'],$_POST['pwd']));
 	$num=$statement->rowcount();
 	if($num>0)
 	{
 		session_start();
 		$_SESSION['name']="ahmar";
 		header('location: dashboard.php');
 	}
 	else{
 		throw new Exception('invalid username and/or password');
 		
 	}

 } 
 catch(Exception $e){
 	$error_message=$e->getMessage();
 }
  } ?>
  <label>Log in</label>
<form action="" method="post">
	<input type="username" name="usr" placeholder="username"><br/><br/>
<input type="password" name="pwd" placeholder="password"><br/><br/>
<input type="submit" value="login" name="frm1">
</form>
</body>
</html>