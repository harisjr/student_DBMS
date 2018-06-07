<?php
if (isset($_POST['gender'])) 
{
  	$gen=$_POST['gender'];
  	echo $gen;
  } 
  ?>

  <form action="" method="post" name="myform" id="myform">
  	<table>
  		<tr>
  			<td>gender:</td>
  		<td>
  			<input type="radio" name="gender" value="male"/>Male
   			<input type="radio" name="gender" value="female"/>female
   			<input type="radio" name="gender" value="others"/>others

  		</td>
  		</tr>
  		<tr>
  		<td></td>
  		<td>
  			<input type="submit" value="submit" />
  			<input type="reset" value="clear" />
  		</td>
  		</tr>
  	</table>
  </form>