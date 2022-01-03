<?php
session_start();
include 'conn.php';
$id=$_POST['id'];
if ($_SESSION['power']>200&&$id!=$_SESSION['adminid']) 
{
	$selectpro="SELECT * FROM product WHERE  seller = $id";
	$resultpro=$conn->query($selectpro);
	while ($rowpro=$resultpro->fetch_assoc()) {
		$imagenames=explode("/",$rowpro['images']);
 	

 	foreach ($imagenames as $value) 
 	{
 		unlink("imgs/$value");
 		
 	}
 	$covername=$rowpro['cover'];
 	unlink("imgs/$covername");
 	$deletepro = "DELETE FROM `product` WHERE seller=$id" ; 
 	$conn->query($deletepro);
	}
	$selectadmin="SELECT * FROM admin WHERE  id = $id";
	$resultadmin=$conn->query($selectadmin);
	$rowadmin=$resultadmin->fetch_assoc();
	$name=$rowadmin['name'];
	$email=$rowadmin['email'];
	$password=$rowadmin['password'];
	$gender=$rowadmin['gender'];
	$insertuser="INSERT INTO user(name,email,password,gender) VALUES ('$name','$email','$password','$gender')";
	$conn->query($insertuser);
	$deleteadmin = "DELETE FROM `admin` WHERE id=$id" ; 
	$query=$conn->query($deleteadmin);
	if ($query) {
		echo true;
	}
	else
		echo false;

	
	

}







?>