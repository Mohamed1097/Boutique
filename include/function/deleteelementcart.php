<?php
include '../../admin/include/function/conn.php';
session_start();
$userid="";
$cookie="";
if (isset($_SESSION['userid']))
 {
 	$userid=$_SESSION['userid'];
}
if (isset($_COOKIE['randomId'])) 
{
	$cookie=$_COOKIE['randomId'];
}

$proid=$_POST['id'];
$selectpro="SELECT name FROM product WHERE  id = $proid";
$resultpro=$conn->query($selectpro);
$rowpro=$resultpro->fetch_assoc();
$name=$rowpro['name'];
$delete="DELETE FROM cart WHERE userid = '$userid' or userid = '$cookie' and proid = '$proid'";
$query=$conn->query($delete);
if ($query) {
	echo '<div class="alert alert-success added" role="alert">
				 '.$name.' deleted from Your cart
				</div>+1';
	# code...
}
else
{
	echo '<div class="alert alert-success added" role="alert">
				 There Is Something Wrong Try Again Later
				</div>+0';
}
?>