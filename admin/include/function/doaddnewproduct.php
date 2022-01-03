<?php
include 'conn.php';
session_start();
if (isset($_SESSION['power'])) {
	$email=$_SESSION['login'];
	$proname = $_POST['name'];
	$price = $_POST['price'];
	$count = $_POST['count'];
	$cat = $_POST['cat'];
	$content = $_POST['content'];

if (!isset($_FILES['cover'])||!isset($_FILES['imgs']))
{
	header("location:../../tables.php?do=addpro&msg=you Must Add Cover And Images To Each Product");
	exit();

}
elseif (count($_FILES['imgs']['name'])!=4)
 {
 	header("location:../../tables.php?do=addpro&msg=you must Enter 4 Photo To Each Product");
	exit();
		# code...
	}
if (strlen($proname)==0||strlen($price)==0||strlen($count)==0||strlen($content)==0) {
	header("location:../../tables.php?do=addpro&msg=you must fill all of this");
	exit();

	# code...
}

$file_name =$_FILES['cover']['name'];
$file_size= $_FILES['cover']['size'];
$tmp_name= $_FILES['cover']['tmp_name'];
$file_ext=explode('.', $file_name);
$file_ext_updated=strtolower(end($file_ext));
$ext_allow=array("jfif","gif","jpg","png");
if (!in_array($file_ext_updated, $ext_allow)) 
{
	header("location:../../tables.php?do=addpro&msg=this Cover is not image");
	exit();
}
if($file_size>2000000)
{
	header("location:../../tables.php?do=addpro&msg=The Cover should be less than 2 MB");
	exit();
}
$newimgname=rand(1,10000000000).time().rand(1,100000000000).".".$file_ext_updated;
move_uploaded_file($tmp_name, "imgs/".$newimgname);
$imgsname=$_FILES['imgs']['name'];
 	$tmp_name= $_FILES['imgs']['tmp_name'];
 	$error= $_FILES['imgs']['error'];
 	$size= $_FILES['imgs']['size'];
 	
 	$newname=array();
 	foreach ($imgsname as $value) {
 		$ext=strtolower(end(explode('.', $value)));
 				if (!in_array($ext, $ext_allow)){
 					eader("location:../../tables.php?do=addpro&msg=You can only update images");
 					exit();	
 				}

 	}
 foreach ($error as $err)
 {
 	if ($err==0) {
 		foreach ($tmp_name as $val){
 			foreach ($imgsname as $value){
 				$ext=strtolower(end(explode('.', $value)));
 				if (in_array($ext, $ext_allow)) {
 					foreach($size as $siz)
 					{
 						if ($siz<2000000) {
 							$value=md5(rand(1,10000000000).time().rand(1,100000000000)).".".$ext;
 							$ext="";
							array_push($newname,$value);
							move_uploaded_file($val, "imgs/".$value);
							array_shift($imgsname);
							array_shift($size);
							array_shift($tmp_name);
 							
 						}else{
 								header("location:../../tables.php?do=addpro&msg=The photo should be less than 2 MB");

 							exit();
 						}
 						break;
 					}
 					
 					
 				}
 				else{
 						header("location:../../tables.php?do=addpro&msg=You can only update images");

 					exit();
 				}
 				break;
 			}
 			break;
 		}
 		
 	}
 	else{
 		header("location:../../tables.php?do=addpro&msg=there something with updating these Photos,try again later");
 		exit();

 	}

 }
	$fullname=implode("/", $newname);

	$sql1 = "SELECT * FROM admin WHERE email = '$email'";
	$result = $conn->query($sql1);

    $row = $result->fetch_assoc();

    $id=$row['id'];




$sql="INSERT INTO product( name, price, content, seller, cover, count, cat, images) VALUES ('$proname','$price','$content','$id','$newimgname','$count','$cat','$fullname')";
$conn->query($sql);
$selectadmin="SELECT name FROM admin WHERE id = $id";
$rowadmin=$conn->query($selectadmin)->fetch_assoc();
$adminname=$rowadmin['name'];
$selectcat="SELECT name FROM cat WHERE id = $cat";
$rowcat=$conn->query($selectcat)->fetch_assoc();
$catname=$rowcat['name'];
$selectlast="SELECT id FROM product ORDER BY id desc limit 1";
$rowlast=$conn->query($selectlast)->fetch_assoc();
$lastid=$rowlast['id'];


echo $lastid."/".$proname."/".$price."/".$catname."/".$adminname."/".$count;
}



?>