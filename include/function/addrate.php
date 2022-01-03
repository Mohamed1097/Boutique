<?php
include '../../admin/include/function/conn.php';
session_start();
if (isset($_SESSION['userid'])) {
	$userid=$_SESSION['userid'];
	$rate=$_POST['rate'];
	$proid=$_POST['id'];
	$selectrate="SELECT rate FROM rating WHERE userid='$userid' and proid='$proid'";
	$result=$conn->query($selectrate);
	$count = $result->num_rows ;
	if($count==0)
	{
		$query=$conn->query("INSERT INTO `rating`(`userid`, `proid`, `rate`) VALUES ('$userid','$proid','$rate')");
		if($query)
		{
			$res=$conn->query("SELECT AVG(rate) as avg FROM rating WHERE proid='$proid'");
			$data=$res->fetch_assoc();
			$avg= $data['avg'];
			$avg=round($avg*10)/10;
			$q=$conn->query("UPDATE product SET rate='$avg' WHERE id='$proid'");
			if($q)
			{
				echo $avg;
			}
		}
	}
	else
	{
		$query=$conn->query("UPDATE rating SET rate='$rate' WHERE proid='$proid' and userid='$userid'");
		if($query)
		{
			$res=$conn->query("SELECT AVG(rate) as avg FROM rating WHERE proid='$proid'");
			$data=$res->fetch_assoc();
			$avg= $data['avg'];
			$avg=round($avg*10)/10;
			$q=$conn->query("UPDATE product SET rate='$avg' WHERE id='$proid'");
			if($q)
			{
				echo $avg;
			}
		}

	}
	
	
}




?>