<?php
include 'conn.php';
session_start();
if ($_SESSION['power']>200) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$position=$_POST['position'];
	$insert="INSERT INTO admin(name,email,password,position,gender) VALUES ('$name','$email','$password','$position','$gender')";
	$query=$conn->query($insert);
	if ($query) {
		echo "true";
	}
	else
		{echo "false";}
	$delete="DELETE FROM `user` WHERE id=$id" ; 
	$conn->query($delete);
	header("location:../../tables.php");
}




  ?>