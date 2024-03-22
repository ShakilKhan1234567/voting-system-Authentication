<?php
session_start();
include 'db.php';

$role_name = $_POST['role_name'];
$all_user = $_POST['all_user'];

$update = "UPDATE users SET role='$role_name' WHERE id=$all_user";
mysqli_query($db_connect, $update);
header('location:switch_user.php');
?>