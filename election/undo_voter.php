<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$update = "UPDATE voters SET deleted_at=0 WHERE id=$id";
mysqli_query($db_connect, $update);
$_SESSION['undo'] = "Successfully Restore!";
header('location:restore_voter.php');
?>