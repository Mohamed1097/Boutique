<?php
	include '../../admin/include/function/conn.php';
    session_start();
    $email=$_POST["email"];
    $new_password=md5($_POST["password"]);
    $sql = "SELECT * FROM user WHERE email = '$email' and password = '$new_password'";
	$result = $conn->query($sql);
	$count = $result->num_rows ;
if ($count=="1") {
    $_SESSION['user'] = $email;
    $row = $result->fetch_assoc();
    $id=$row['id'];
    $_SESSION['userid']=$id;
    $_SESSION['username']=$row['name'];
}
	echo $count;    

?>