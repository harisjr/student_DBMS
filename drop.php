<?php
if (isset($_POST['submit'])) 
{
  	$state=$_POST['state'];
  	echo "you live in: " .$state."state";

  } 
  ?>

   <form action="" method="post" name="myform" id="myform">
  	<table>
  		<tr>
  			<td>state:</td>
  		<td>
  			<select name="state">
  				<option>select one</option>
  				<option value="wb">wb</option>
  				<option value="ll">ll</option>
  				<option value="sd">sd</option>

  			</select>

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