<?php
include 'conn.php';
session_start();
$id=$_GET['id'];
$src=$_GET['src'];
$selectpro="SELECT * FROM product WHERE  id = $id";
$resultpro=$conn->query($selectpro);
$rowpro=$resultpro->fetch_assoc();


if ($_SESSION['adminid']==$rowpro['seller'])
{
	
	header("location:../../tables.php?id=".$id."&do=editpro");	


}

?>