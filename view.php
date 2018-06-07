<?php
ob_start();
session_start();
if($_SESSION['name']!='ahmar') 
{
	header('location:login.php'); 	
} 
?>
<?php include("normal.php");?>

<!DOCTYPE html>
<html>

<head>
<title>Data View Page</title>
<script>
	function confirm_delete()
	{
		return confirm("Are you sure want to Delete This Data? ");
	}
	
</script>
</head>

<body>


<h2>View All Data Database</h2>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>Serial No:</th>
		<th>Student Id</th>
		<th>Name</th>	
		<th>Email Address</th>	
		<th>Website</th>
		<th>Student Image</th>
		<th>Comments</th>
		<th>state</th>
	</tr>
	<?php
		
	$i=0;
	
	$statement=$db->prepare("select * from stu_detail");
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	
	{
		$i++;
		?>
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $row['id'];?></td>
		<td><?php echo $row['stu_name'];?></td>
		<td><?php echo $row['stu_email'];?></td>
		<td><?php echo $row['stu_web'];?></td>
		<td><img src="uploads/<?php echo $row['stu_image'];?>" alt="" width="100"></td>
		<td><?php echo $row['stu_comment'];?></td>
		<td>
			<?php 
								$statement1=$db->prepare("select * from state where id=?");
								$statement1->execute(array($row['id']));
								$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
								foreach($result1 as $row1)
								{
									echo $row1['stu_state'];
								}
								?>
		</td>
		<td><a href="edit.php?id=<?php echo $row['st_id'];?>">Edit</a>&nbsp;|
		<a onClick="return confirm_delete();" href="delete.php?id=<?php echo $row['st_id'];?>">Delete</a></td>
	</tr>
		<?php
	}
	?>
		
	
</table>

</br>


<a href="dashboard.php">Back to Previous</a>
</body>
</html>
