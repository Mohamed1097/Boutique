<?php
session_start();
include 'conn.php';
$userid="";
$id=$_POST['id'];
$selectpro="SELECT * FROM product WHERE  id = $id";
$resultpro=$conn->query($selectpro);
$row=$resultpro->fetch_assoc();
if(isset($_SESSION['userid']))
{	
	$userid=$_SESSION['userid'];
	$res=$conn->query("SELECT rate FROM rating WHERE userid='$userid' and proid='$id'");
	$count = $res->num_rows;
	if ($count>0) {
		$rate=$res->fetch_assoc();
		echo $row['images']."/".$row['content']."/".$row['rate']."/".$rate['rate'];
	}
	elseif($count==0)
	{
		echo $row['images']."/".$row['content']."/".$row['rate']."/"."0";	
	}
}
else
{
	echo $row['images']."/".$row['content']."/".$row['rate']."/"."0";	
}

?>