<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_GET['id'];

$update = "UPDATE voters SET name='$name', email='$email', phone='$phone' WHERE id=$id";
mysqli_query($db_connect, $update);
$_SESSION['update'] = "Successfully Updated!";
header("location:voter_list.php");
?>