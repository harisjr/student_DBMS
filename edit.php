<?php
ob_start();
session_start();
if($_SESSION['name']!='ahmar')
{
	header('location:login.php');
}
include("dashboard.php");

?>
<?php
if(!isset($_REQUEST['id']))
{
	header("location:view.php");
}
else
{
	$id=$_REQUEST['id'];
}
?>

<?php
if (isset($_POST['form1']))
{
	try
	{
	
		if(empty($_POST['stu_name']))
			{
			throw new Exception('Name can not be empty');
			}
		if(empty($_POST['stu_email']))
			{
			throw new Exception('email can not be empty');
			}
		
		if(empty($_POST['stu_web']))
			{
			throw new Exception('web can not be empty');
			}
			if(empty($_POST['stu_comment']))
			{
			throw new Exception('comment can not be empty');
			}
			if(empty($_POST['stu_state']))
			{
			throw new Exception('State can not be empty');
			}
			
		if(empty($_FILES["stu_image"]["name"]))
		{
			$statement=$db->prepare("update stu_detail set stu_name=?,stu_email=?,stu_web=?,stu_comment=?,id=? where st_id=?");
			$statement->execute(array($_POST['stu_name'],$_POST['stu_email'],$_POST['stu_web'],$_POST['stu_comment'],$_POST['id'],$id));
		}
		else
		{
			$statement=$db->prepare("show table status like 'stu_detail'");
			$statement->execute();
			$result= $statement->fetchAll();
			foreach($result as $row)
			$new_id=$row[10];
		
			$up_filename=$_FILES["stu_image"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename, '.'));//strip extention
			$file_ext=substr($up_filename,strripos($up_filename, '.'));//strip name
			$f1=$new_id. $file_ext;
			
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
				throw new Exception("Only jpg,jpeg,png and gif format images are allowed to upload.");
				
			$statement=$db->prepare("select * from stu_detail where st_id=?");
				$statement->execute(array($id));
				$result=$statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{
					$real_path="uploads/".$row['stu_image'];
					unlink($real_path);
				}
			
			move_uploaded_file($_FILES["stu_image"]["tmp_name"],"uploads/".$f1);
			$statement=$db->prepare("update stu_detail set stu_name=?,stu_email=?,stu_web=?stu_image=?,stu_comment=?,stu_state=? where st_id=?");
			$statement->execute(array($_POST['stu_name'],$_POST['stu_email'],$_POST['stu_web'],$f1,$_POST['stu_comment'],$_POST['stu_state'],$id));
			
		}	
			
						
			$sucess_message="Data Updated successfully";
	}		
	catch(Exception $e)
	{
	$error_message=$e->getMessage();
	}
}
?>

<?php
	$statement=$db->prepare("select * from stu_detail where st_id=?");
	$statement->execute(array($id));
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$stu_name=$row['stu_name'];
		$stu_email=$row['stu_email'];
		$stu_web=$row['stu_web'];
		$stu_image=$row['stu_image'];
		$stu_comment=$row['stu_comment'];
		$stu_state=$row['id'];
		
					
	}
?>
<h2>Edit New Post</h2>
<?php
	if(isset($error_message)){echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)){echo "<div class='success'>".$success_message."</div>";}
?>
	<form action="edit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
	
		<table>
			<tr><td>Title</td></tr>
			<tr><td><input type="text" name="stu_name" value="<?php echo $stu_name;?>"/></td></tr>
			<tr><td>Description</td></tr>
			<tr>
				<td>
				<input type="text" name="stu_email" value="<?php echo $stu_email;?>"? />
				</td>
			</tr>
			<tr>
				<td>
				<input type="text" name="stu_web" value="<?php echo $stu_web;?>"? />
				</td>
			</tr>
			

			<tr><td>Previous Image Preview</td></tr>
			<tr><td><img src="uploads/<?php echo $stu_image;?>"   alt="" width="200" /></td></tr>
			<tr><td>Featured Image</td></tr>
			<tr><td><input  type="file" name="stu_image" /></td></tr>
			<tr><td>Select a Category</td></tr>

			<tr>
				<td>
				<input type="text" name="stu_comment" value="<?php echo $stu_comment;?>"? />
				</td>
			</tr>
			



			<tr>
			<td>
			<select name="stu_state">
			<option value="">Select a Category</option>
			<?php
			$statement=$db->prepare("select * from state order by stu_state ASC");		
			$statement->execute();
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				if($row['stu_state']==$state_id)
				{
					?><option value="<?php echo $row['stu_state'];?>" selected><?php echo $row['stu_state'];?></option><?php
				}
				else
				{
					?><option value="<?php echo $row['stu_state'];?>"><?php echo $row['stu_state'];?></option><?php

				}
				
			}
			?>
			</select>
			</td>
			</tr>
			
			<tr>
		<td></td>
		<td><input type="submit" value="Update" name="form1"/>
	</tr></table>

</form>

<a href="view.php">Back to Previous</a>
</body>
</html>