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
 	
    	if (empty($_POST['name'])) 
 	{
 		throw new Exception("name cannot be empty");
 		
    }
    	if (empty($_POST['email'])) 
 	{
 		throw new Exception("email cannot be empty");
 		
    }
    	if (empty($_POST['web'])) 
 	{
 		throw new Exception("web cannot be empty");
 		
    }


	if (empty($_POST['comment'])) 
 	{
 		throw new Exception("comment cannot be empty");
 		
    }
    $statement=$db->prepare("show table status like 'stu_detail'");
			$statement->execute();
			$result= $statement->fetchAll();
			foreach($result as $row)
			$new_id=$row[10];
		
			$up_filename=$_FILES["stu_image"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename, '.'));//strip extention
			$file_ext=substr($up_filename,strripos($up_filename, '.'));//strip name
			$f1=$new_id. $file_ext;
			
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')){
				throw new Exception("Only jpg,jpeg,png and gif format images are allowed to upload.");
				}
			move_uploaded_file($_FILES["stu_image"]["tmp_name"],"uploads/".$f1);





    $statement=$db->prepare("insert into stu_detail(stu_name,stu_email,stu_web,stu_image,stu_comment,id)values(?,?,?,?,?,?)");

    $statement->execute(array($_POST['name'],$_POST['email'],$_POST['web'],$f1,$_POST['comment'],$_POST['id']));
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
 <form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>name:</td>
			<td><input type="text" name="name" >
			</td>
		</tr>
		<tr>
			<td>email:</td>
			<td><input type="text" name="email" ></td>
		</tr>
		<tr>
			<td>websie:</td>
			<td><input type="text" name="web"></td>
		</tr>
		<tr>
			<td>image:</td>
			<td><input type="file" name="stu_image"></td>
		</tr>
		<tr>
			<td>comment:</td>
		<td><textarea type="text" name="comment"rows="5" cols="40"></textarea></td>


		</tr>
		<tr>
			<
			<td><select name="id">
  				<option value="">select one state</option>
  				<?php
  				$statement=$db->prepare("select * from state order by stu_state ASC");
  				$statement->execute();
  				$result=$statement->fetchAll(PDO::FETCH_ASSOC);
  				foreach($result as $row){
  				 ?>
  				 <option value="<?php echo $row['id'];?>"><?php echo $row['stu_state'];?></option>

  				 <?php
  				 }  ?>

  			</select></td>
		</tr>
		
	</table>
	<input type="submit" value="submit" name="frm1">
</form>
