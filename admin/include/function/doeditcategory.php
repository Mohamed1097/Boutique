<?php
include 'conn.php';
session_start();
if($_SESSION['power']>200)
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	if (strlen($name)==0) {
		header('location:../../tables.php?do=editcat&msg=You Must Enter The Name Of The Category&id='.$id);
		exit();
		# code...
	}
	$update="UPDATE cat SET name ='$name' WHERE  id =  $id";
	$conn->query($update);
	header("location:../../tables.php?show=categories");
}
?>