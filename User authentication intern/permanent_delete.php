<?php
include 'db.php';
$user_id = $_GET['id']; 

$update = "DELETE FROM users WHERE id=$user_id";
mysqli_query($db_connect, $update);
header("location:restore.php?id=<?=$user_id?>");
?>