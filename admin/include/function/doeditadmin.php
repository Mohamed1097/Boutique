<?php
include 'conn.php';
session_start();

$id=$_POST['id'];
$select="SELECT * FROM admin WHERE id='$id' ";
$result=$conn->query($select);
$row=$result->fetch_assoc();
if ($_SESSION['adminid']==$id) 
{
	$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

if (strlen($password)<8)
 {
 	header("location:../../tables.php?do=editadmin&msg=password should be at least 8 letters&id=".$id);
 	exit();

}
else
{
	if ($password!=$row['password'])
	 {
	 	$password=md5($password);

	}
	$update="UPDATE admin SET name='$name',email='$email',password='$password' WHERE  id =  $id";
	$conn->query($update);
	if ($password!=$row['password']||$email!=$row['email'])
	{
		header("location:../../logout.php");


	}
	else
	{
		header("location:../../tables.php?show=admins");
	}
}
}
elseif ($_SESSION['power']>200)
 {
 	$position=$_POST['position'];
 	$update="UPDATE admin SET position ='$position' WHERE  id =  $id";
	$conn->query($update);
	
	header("location:../../tables.php?show=admins");
	# code...
}

?>