<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$voter_id = $_GET['id'];

$update = "UPDATE voters SET name='$name', email='$email', phone='$phone' WHERE id=$voter_id";
mysqli_query($db_connect, $update);
$_SESSION['success'] = "Successfully Updated!";
header('location:profile.php');
?>