<?php
include 'conn.php';
session_start();

$id=$_POST['id'];
$selectpro="SELECT * FROM product WHERE  id = $id";
$resultpro=$conn->query($selectpro);
$rowpro=$resultpro->fetch_assoc();

$sellerid=$rowpro['seller'];
$selectseller="SELECT * FROM admin WHERE  id = $sellerid";
$resultseller=$conn->query($selectseller);
$rowseller=$resultseller->fetch_assoc();

$sellerpower=$rowseller['position'];
$selectpower="SELECT power FROM position WHERE  id = $sellerpower";
$resultpower=$conn->query($selectpower);
$rowpower=$resultpower->fetch_assoc();

if ($_SESSION['power']>$rowpower['power']||$_SESSION['login']==$rowseller['email'])
 {
 	$imagenames=explode("/",$rowpro['images']);
 	foreach ($imagenames as $value) 
 	{
 		unlink("imgs/$value");
 		
 	}

 	$covername=$rowpro['cover'];
 	unlink("imgs/$covername");
 	$deletepro = "DELETE FROM `product` WHERE id=$id" ; 
 	$query=$conn->query($deletepro);
 	if ($query) {
 		echo "true";
 		# code...
 	}
 	else
 	{
 		echo "false";
 	}

}
?>