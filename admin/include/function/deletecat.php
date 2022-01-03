<?php
session_start();
include 'conn.php';
$id=$_POST['id'];
if ($_SESSION['power']>200) {
	$selectpro="SELECT * FROM product WHERE  cat = $id";
	$resultpro=$conn->query($selectpro);
	while ($rowpro=$resultpro->fetch_assoc()) {
		$imagenames=explode("/",$rowpro['images']);
 	print_r($imagenames);

 	foreach ($imagenames as $value) 
 	{
 		unlink("imgs/$value");
 		
 	}
 	$covername=$rowpro['cover'];
 	unlink("imgs/$covername");
 	$deletepro = "DELETE FROM `product` WHERE cat=$id" ; 
 	$conn->query($deletepro);
 	


	}
	$deletecat = "DELETE FROM `cat` WHERE id=$id" ; 
	$query=$conn->query($deletecat);
	if ($query) {
		echo "true";
		# code...
	}
	else
		echo "false";

}


?>