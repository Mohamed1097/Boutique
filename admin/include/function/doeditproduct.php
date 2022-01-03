<?php
session_start();
include 'conn.php';
$id=$_POST['id'];
$selectpro="SELECT * FROM product WHERE  id = $id";
$resultpro=$conn->query($selectpro);
$rowpro=$resultpro->fetch_assoc();

if ($_SESSION['adminid']==$rowpro['seller']) {
	//firstcase
	if (isset($_FILES['cover'])&&isset($_FILES['imgs'])) 
	{
$proname = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$cat = $_POST['cat'];
$content = $_POST['content'];
$file_name =$_FILES['cover']['name'];
$file_size= $_FILES['cover']['size'];
$tmp_name_cover= $_FILES['cover']['tmp_name'];
$file_ext=explode('.', $file_name);
$file_ext_updated=strtolower(end($file_ext));
$ext_allow=array("jfif","gif","jpg","png");
$imgsname=$_FILES['imgs']['name'];
$tmp_name= $_FILES['imgs']['tmp_name'];
$error= $_FILES['imgs']['error'];
$size= $_FILES['imgs']['size'];
$deletedimags=array();
$newname=array();
 	
 	foreach ($imgsname as $value) {
 		$ext=strtolower(end(explode('.', $value)));
 				if (!in_array($ext, $ext_allow)){
 					echo "You can only update images";
 					exit();	
 				}

 	}

if (isset($_POST['deletedimages'])) 
{

	if (count($_FILES['imgs']['name'])==count($_POST['deletedimages'])) 
	{
		$addedimgs=$_FILES['imgs']['name'];
		foreach ($addedimgs as $src) 
		{
			$imagenames=explode('/', $rowpro['images']);
			$deletedimg=array_search($src, $imagenames);
			echo "$deletedimg";
			echo "<br>";
			unset($imagenames[$deletedimg]);
			$newimagenames=implode('/', $imagenames);
			echo "$newimagenames";
			unlink("imgs/$src");
			$update="UPDATE product SET images ='$newimagenames' WHERE  id =  $id";
			$conn->query($update);
			$newname=$imagenames;
			# code...
		}
		
		# code...
	}
	else
	{
		header("location:../../tables.php?id=".$id."&do=editpro&msg=you must enter 4 images for each product");
		exit();
	}
}
else
{
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must enter 4 images for each product");
		exit();
}
if (strlen($proname)==0||strlen($price)==0||strlen($count)==0||strlen($content)==0) {
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must fill all of this");
	exit();
	# code...
}

if (!in_array($file_ext_updated, $ext_allow)) 
{
	echo "this file is not img ";
	exit();
}
if($file_size>2000000)
{
	echo "this Photo is Too large";
	exit();
}
$newimgname=md5(rand(1,10000000000).time().rand(1,100000000000)).".".$file_ext_updated;
move_uploaded_file($tmp_name_cover, "imgs/".$newimgname);
unlink("imgs/".$rowpro['cover']);

 		
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
 							echo "This Image is Too Large";
 							exit();
 						}
 						break;
 					}
 					
 					
 				}
 				else{
 					echo "You can only update images";
 					exit();
 				}
 				break;
 			}
 			break;
 		}
 		
 	}
 	else{
 		echo "there something with updating these Photos,try again later";
 		exit();

 	}

 }
	$fullname=implode("/", $newname);
	echo "$fullname";
	$update="UPDATE product SET name='$proname',price='$price',cat='$cat',content='$content',cover='$newimgname',images='$fullname' WHERE  id =  $id";
	$conn->query($update);	
	header("location:../../tables.php?show=products");
	}


	//secendcase
	elseif (isset($_FILES['cover'])&&!isset($_FILES['imgs'])) 
	{
		$proname = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$cat = $_POST['cat'];
$content = $_POST['content'];
$newname=explode("/", $rowpro['images']);
if (isset($_POST['deletedimages'])) 
{
header("location:../../tables.php?do=editpro&msg=you must Enter 4 Photo To Each Product&id=".$id);
	exit();

	# code...
}
if (strlen($proname)==0||strlen($price)==0||strlen($count)==0||strlen($content)==0) {
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must fill all of this");
	exit();
	# code...
}
				if (count($newname)>4||count($newname)<4)
							 {
							 	header("location:../../tables.php?do=editpro&msg=you must Enter 4 Photo To the Product&id=".$id);
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
	echo "this file is not img ";
	exit();
}
if($file_size>2000000)
{
	echo "this Photo is Too large";
	exit();
}
$newimgname=rand(1,10000000000).time().rand(1,100000000000).".".$file_ext_updated;
move_uploaded_file($tmp_name, "imgs/".$newimgname);
unlink("imgs/".$rowpro['cover']);
	$update="UPDATE product SET name='$proname',price='$price',cat='$cat',content='$content',cover='$newimgname' WHERE  id =  $id";
	$conn->query($update);	
	header("location:../../tables.php?show=products");
		# code...
	}
	//thirdcase
	elseif (!isset($_FILES['cover'])&&isset($_FILES['imgs'])) 
	{
		$proname = $_POST['name'];
		$price = $_POST['price'];
		$count = $_POST['count'];
		$cat = $_POST['cat'];
		$content = $_POST['content'];
if (strlen($proname)==0||strlen($price)==0||strlen($count)==0||strlen($content)==0) {
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must fill all of this");
	exit();
	# code...
}
	$imgsname=$_FILES['imgs']['name'];
 	$tmp_name= $_FILES['imgs']['tmp_name'];
 	$error= $_FILES['imgs']['error'];
 	$size= $_FILES['imgs']['size'];
 	$ext_allow=array("jfif","gif","jpg","png");
 	$newname=array();
 	
 	
 	echo "<br>";
 	foreach ($imgsname as $value) {
 		$ext=strtolower(end(explode('.', $value)));
 				if (!in_array($ext, $ext_allow)){
 					echo "You can only update images";
 					exit();	
 				}

 	}
 	if (isset($_POST['deletedimages'])) 
{

	if (count($_FILES['imgs']['name'])==count($_POST['deletedimages'])) 
	{
		$addedimgs=$_FILES['imgs']['name'];
		foreach ($addedimgs as $src) 
		{
			$imagenames=explode('/', $rowpro['images']);
			$deletedimg=array_search($src, $imagenames);
			echo "$deletedimg";
			echo "<br>";
			unset($imagenames[$deletedimg]);
			$newimagenames=implode('/', $imagenames);
			echo "$newimagenames";
			unlink("imgs/$src");
			$update="UPDATE product SET images ='$newimagenames' WHERE  id =  $id";
			$conn->query($update);
			$newname=$imagenames;
			# code...
		}
		
		# code...
	}
	else
	{
		header("location:../../tables.php?id=".$id."&do=editpro&msg=you must enter 4 images for each product");
		exit();
	}
}
else
{
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must enter 4 images for each product");
		exit();
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
							array_push($deletedimags,$value);
							
							move_uploaded_file($val, "imgs/".$value);
							array_shift($imgsname);
							array_shift($size);
							array_shift($tmp_name);
 							
 						}else{
 							echo "This Image is Too Large";
 							exit();
 						}
 						break;
 					}
 					
 					
 				}
 				else{
 					echo "You can only update images";
 					exit();
 				}
 				break;
 			}
 			break;
 		}
 		
 	}
 	else{
 		echo "there something with updating these Photos,try again later";
 		exit();

 	}

 }
	$fullname=implode("/", $newname);

		if (count($newname)>4||count($newname)<4)
							 {
							 	print_r($newname);
							 	if (strlen($fullname)>0) {
							 		
							 		foreach ($deletedimags as $value) 
							 		{
							 			unlink("imgs/".$value);
							 			# code...
							 		}
							 		# code...
							 	}
							 	header("location:../../tables.php?do=editpro&msg=you must Enter 4 Photo To the Product&id=".$id);
								exit();
								# code...
							}
	echo "$fullname";
	$update="UPDATE product SET name='$proname',price='$price',cat='$cat',content='$content',images='$fullname' WHERE  id =  $id";
	$conn->query($update);	
	header("location:../../tables.php?show=products");

	}
	//fourthcase
	elseif (!isset($_FILES['cover'])&&!isset($_FILES['imgs']))
	 {

$proname = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$cat = $_POST['cat'];
$content = $_POST['content'];
$newname=explode("/", $rowpro['images']);
if (isset($_POST['deletedimages'])) 
{
header("location:../../tables.php?do=editpro&msg=you must go Enter 4 Photo To Each Product&id=".$id);
	exit();

	# code...
}



if (strlen($proname)==0||strlen($price)==0||strlen($count)==0||strlen($content)==0) {
	header("location:../../tables.php?id=".$id."&do=editpro&msg=you must fill all of this");
	exit();

	# code...
}
if (count($newname)>4||count($newname)<4)
							 {
							 	header("location:../../tables.php?do=editpro&msg=you must Enter 4 Photo To the Product&id=".$id);
								exit();
								# code...
							}
$update="UPDATE product SET name='$proname',price='$price',cat='$cat',content='$content' WHERE  id =  $id";
	$conn->query($update);	
	header("location:../../tables.php?show=products");
		# code...
	}

	# code...
}
?>