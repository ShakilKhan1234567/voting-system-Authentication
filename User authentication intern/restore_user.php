<?php 
    include 'db.php';
    $user_id = $_GET['id'];
    
    $update = "UPDATE users SET status=0 WHERE id=$user_id";
    mysqli_query($db_connect, $update);
    header("location:restore.php?id=<?=$user_id?>");

?>