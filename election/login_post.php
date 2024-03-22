<?php
session_start();
include 'db.php';

if(!isset($_SESSION['id'])){
    header('location:login.php');
}

$name = $_POST['name'];
$phone = $_POST['phone'];

$select = "SELECT COUNT(*) as total FROM voters WHERE phone='$phone' && name='$name'";
$result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($result);

$voter = "SELECT * FROM voters WHERE phone='$phone'";
$voter_result = mysqli_query($db_connect, $voter);
$after_assoc_voter = mysqli_fetch_assoc($voter_result);

if($after_assoc['total'] == 1){
    $_SESSION['id'] = $after_assoc_voter['id'];
    header('location:dashboard.php');
}
else{
    $_SESSION['exist'] = "Name or Phone does not Exist!";
    header('location:login.php');
}
?>