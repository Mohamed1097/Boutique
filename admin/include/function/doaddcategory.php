<?php
include 'conn.php';
$name=$_POST['name'];
$insert="INSERT INTO cat(name) VALUES ('$name')";
$conn->query($insert);
 header("location:../../tables.php?show=categories");



?>