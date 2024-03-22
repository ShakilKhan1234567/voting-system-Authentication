<?php
session_start();
include 'db.php';
if(!isset($_SESSION['id'])){
    header('location:login.php');
}

$id = $_GET['id'];
$delete_candidate = "DELETE FROM candidates WHERE id=$id";
mysqli_query($db_connect, $delete_candidate);
$_SESSION['delete_candidate'] = "Successfully Deleted!";
header('location:candidate_list.php');
?>