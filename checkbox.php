
<?php
if (isset($_POST['submit'])) 
{
  	$sub=$_POST['sub'];
  	echo $sub;

  } 
  ?>

  <form action="" method="post" name="myform" id="myform">
  	<table>
  		<tr>
  			<td>language:</td>
  		<td>
  			<input type="checkbox" name="sub" value="english"/>english
   			<input type="checkbox" name="sub" value="hindi"/>hindi
   			<input type="checkbox" name="sub" value="bengali"/>bengali

  		</td>
  		</tr>
  		<tr>
  		<td></td>
  		<td>
  			<input type="submit" name="submit" value="submit" />
  			<input type="reset" value="clear" />
  		</td>
  		</tr>
  	</table>
  </form>