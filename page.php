<?php
include("normal.php");
if (isset($_POST[form1]))
{
	try{
		if(empty($_POST['name']))
		{
			throw new Exception('name cannot be empty');
		}
		
		if(empty($_POST['email']))
		{
			throw new Exception('email cannot be empty');
		}
		if(empty($_POST['web']))
		{
			throw new Exception('web cannot be empty');
		}
		if(empty($_POST['comment']))
		{
			throw new Exception('comment cannot be empty');
		}
		if(empty($_POST['gender']))
		{
			throw new Exception('gender cannot be empty');
		}

		$result=mysql_query("insert into stu_detail(stu_name,stu_email,stu_web,stu_comment,stu_gender)value('$_POST[name]','$_POST[email]','$_POST[web]','$_POST[comment]','$_POST[gender]')") ;

		$sucess_message="data inserted";

	}
	catch(Exception $e)
	{
		$error_message=$e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
<form action=""method="post">
	<table>
		<tr>
			<td>name:</td>
			<td><input type="text" name="name" >
			</td>
		</tr>
		<tr>
			<td>email:</td>
			<td><input type="email" name="email" ></td>
		</tr>
		<tr>
			<td>websie:</td>
			<td><input type="text" name="web"></td>
		</tr>
		<tr>
			<td>comment:</td>
		<td><textarea type="text" name="comment"rows="5" cols="40"></textarea></td>

		</tr>
<!--		<tr>
			<td>gender:</td>
			<td><input type="radio" name="gender" value="female"/>female
			<td><input type="radio" name="gender" value="male"/>male</td>
		
		</tr>-->
		
	</table>
	<input type="submit" value="submit" name="form1">
</form>
<a href="ind.php"> back to previous </a>


</body>
</html>