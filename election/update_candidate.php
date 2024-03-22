<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$symbol_name = $_POST['symbol_name'];
$id = $_GET['id'];

$update = "UPDATE candidates SET name='$name', email='$email', phone='$phone', symbol_name='$symbol_name' WHERE id=$id";
mysqli_query($db_connect, $update);
$_SESSION['update'] = "Successfully Updated!";
header("location:candidate_list.php");
?>