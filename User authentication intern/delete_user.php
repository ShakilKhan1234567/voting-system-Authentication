<?php

include 'db.php';
$user_id = $_GET['id']; 

$update = "UPDATE users SET status=1 WHERE id=$user_id";
mysqli_query($db_connect, $update);
header('location:user_list.php');
?>