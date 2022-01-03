<?php
include '../../admin/include/function/conn.php';
session_start();
if (isset($_SESSION['userid']))
 {

$userid=$_SESSION['userid'];
$proid=$_POST['id'];
if (!isset($_POST['quantity'])) 
{
$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
$result = $conn->query($selectcart);
$count = $result->num_rows ;
if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid) VALUES ('$userid','$proid')";
 	$query=$conn->query($insert);
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
 	 					The Prouct Add To Your Cart Successfully
 	 					</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$row['quantity']+1;
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}
}
else
{
	$quantity=$_POST['quantity'];
	$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
	$result = $conn->query($selectcart);
	$count = $result->num_rows ;
	if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid,quantity) VALUES ('$userid','$proid','$quantity')";
 	$query=$conn->query($insert);
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$quantity+$row['quantity'];
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}

  }
}
else
{
	if(isset($_COOKIE['randomId']))
	{
		$userid=$_COOKIE['randomId'];
$proid=$_POST['id'];
if (!isset($_POST['quantity'])) 
{
$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
$result = $conn->query($selectcart);
$count = $result->num_rows ;
if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid) VALUES ('$userid','$proid')";
 	$query=$conn->query($insert);
	 
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
 	 					The Prouct Add To Your Cart Successfully
 	 					</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$row['quantity']+1;
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}
}
else
{
	$quantity=$_POST['quantity'];
	$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
	$result = $conn->query($selectcart);
	$count = $result->num_rows ;
	if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid,quantity) VALUES ('$userid','$proid','$quantity')";
 	$query=$conn->query($insert);
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$quantity+$row['quantity'];
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}

  }
	}
	else
	{
		$rand=mt_rand();
setcookie('randomId',$rand,time()+(60*60*30*24),'/');
$userid=$rand;
$proid=$_POST['id'];
if (!isset($_POST['quantity'])) 
{
$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
$result = $conn->query($selectcart);
$count = $result->num_rows ;
if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid) VALUES ('$userid','$proid')";
 	$query=$conn->query($insert);
	 
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
 	 					The Prouct Add To Your Cart Successfully
 	 					</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$row['quantity']+1;
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}
}
else
{
	$quantity=$_POST['quantity'];
	$selectcart="SELECT * FROM cart WHERE userid = '$userid' and proid = '$proid'";
	$result = $conn->query($selectcart);
	$count = $result->num_rows ;
	if ($count==0)
 {
 	$insert="INSERT INTO cart(userid,proid,quantity) VALUES ('$userid','$proid','$quantity')";
 	$query=$conn->query($insert);
 	if ($query)
 	 {
 	 	echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+1';
 		
 	}
 	else
 	{
 		echo '<div class="alert alert-danger added" role="alert">
 						  there SomeThing Wrong Try Again Later 
 						</div>+0';
 	}
		
}
elseif ($count>0) {
	$row=$result->fetch_assoc();
	$quantity=$quantity+$row['quantity'];
	$update="UPDATE cart SET quantity='$quantity' WHERE userid = '$userid' and proid = '$proid'";
	$query=$conn->query($update);
	if ($query) 
	{
		echo '<div class="alert alert-success added" role="alert">
				There Is '.$quantity.' of this Product in Your Cart Now
				</div>+0';
	}
	else
	{
		echo '<div class="alert alert-danger added" role="alert">
						  there SomeThing Wrong Try Again Later 
						</div>+0';
		}
	}

  }
	}

}
