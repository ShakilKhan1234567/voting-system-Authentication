<?php
session_start();
include 'db.php';
include 'login_check.php';

$vote = $_GET['id'];

$select = "SELECT * FROM candidates WHERE id=$vote";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$total_vote = $after_assoc['vote']+1;

$update = "UPDATE candidates SET vote=$total_vote WHERE id=$vote";
mysqli_query($db_connect, $update);
$_SESSION['vote'] = "Successfully Voted!";
$_SESSION['vote_check'] = "Checking!";
header('location:voter_single_info.php');
?>