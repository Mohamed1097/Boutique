<?php
include 'conn.php';
$id=$_POST['id'];

$select="SELECT name,email,password,gender FROM user WHERE  id = $id";
$result=$conn->query($select);
$row=$result->fetch_assoc();
$values="";
foreach ($row as $key => $value) 
{

	$values=implode('/',$row);
}
echo "$values";


?>