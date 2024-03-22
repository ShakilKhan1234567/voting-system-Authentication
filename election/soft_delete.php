<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$update = "UPDATE voters SET deleted_at=1 WHERE id=$id";
mysqli_query($db_connect, $update);
$_SESSION['delete'] = "Successfully Deleted!";
header('location:voter_list.php');
?>