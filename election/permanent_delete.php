<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$delete = "DELETE FROM voters WHERE id=$id";
mysqli_query($db_connect, $delete);
$_SESSION['delete'] = "Successfully Deleted!";
header('location:restore_voter.php');
?>