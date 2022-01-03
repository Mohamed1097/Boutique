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
$quantity=$_POST['quantity'];
$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' or userid = '$cookie' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>';
	}



?>