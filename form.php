<?php
if(isset($_POST['username']))
{
	$usr=$_POST['username'];
	echo "username is: ".$usr;
	}
   ?>

   <form action="" method="post" name="" id="" >
   <table>
   	<tr>
   		<td>name:</td>
   		<td><input type="text" name="username" required="1"></td>
   	</tr>
   	<tr>
   		<td></td>
   		<td>
   			<input type="submit" value="submit"/>
   			<input type="reset" value="clear"/>

   		</td>
   	</tr>
   </table>
   </form>