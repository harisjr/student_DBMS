<?php
ob_start();
session_start();
if($_SESSION['name']!='ahmar')
{
	header('location:login.php');
}
?>
<?php
include("normal.php");
if(isset($_REQUEST["id"]))
{
	$id=$_REQUEST["id"];

	$statement=$db->prepare("delete from stu_detail where st_id=?");
	$statement->execute(array($id));

	header('location:view.php');
}
else
{
	header("location:view.php");
}
?>