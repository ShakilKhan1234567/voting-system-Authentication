<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_id = $_POST['id'];

$update = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$user_id";
mysqli_query($db_connect, $update);
$_SESSION['success'] = "Successfully Updated!";
header("location:user_profile.php");
?>