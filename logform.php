<?php
ob_start();
session_start();
if($_SESSION['name']!='ahmar') 
{
	header('location:login.php'); 	
} 
?>
<?php include("normal.php");?>
<?php
if (isset($_POST['frm1'])) 
{
	 try{
 	
    	if (empty($_POST['state'])) 
 	{
 		throw new Exception("comment cannot be empty");
 		
    }



    $statement=$db->prepare("insert into state(stu_state)values(?)");

    $statement->execute(array($_POST['state']));
    $success_message="data inserted successfully";


 }

 	catch(Exception $e)
 {
 	$error_message=$e->getMessage();
 }

 }  
 ?>
<?php
if(isset($error_message)){echo $error_message;}
if(isset($sucess_message)){echo $sucess_message;}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><h1>enter our state:</h1>
 <form action="" method="post">
	<table>
		<tr>
			<td>state:</td>
			<td><input type="text" name="state" >
			</td>
		</tr>
	
		
	</table>
	<input type="submit" value="submit" name="frm1">
</form>

</body>
</html>