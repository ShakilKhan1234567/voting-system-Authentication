<?php
session_start();
include 'db.php';

$voter_id = $_GET['id'];
$photo = $_FILES['photo'];
$after_explode = explode('.',$photo['name']);
$extension = end($after_explode);

$select = "SELECT * FROM voters WHERE id=$voter_id";
$result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['photo'] == null){
    $file_name = $voter_id.'.'.rand(50000, 10000).'.'.$extension;
    $new_location = "uploads/users/".$file_name;
    move_uploaded_file($photo['tmp_name'],$new_location);

    $update = "UPDATE voters SET photo='$file_name' WHERE id=$voter_id";
    mysqli_query($db_connect, $update);
    $_SESSION['success'] = "Successfully Updated!";
    header('location:profile.php');
}
else{
    $old_photo = "uploads/users/".$after_assoc['photo'];
    unlink($old_photo);

    $file_name = $voter_id.'.'.rand(50000, 10000).'.'.$extension;
    $new_location = "uploads/users/".$file_name;
    move_uploaded_file($photo['tmp_name'],$new_location);

    $update = "UPDATE voters SET photo='$file_name' WHERE id=$voter_id";
    mysqli_query($db_connect, $update);
    $_SESSION['success'] = "Successfully Updated!";
    header('location:profile.php');
}
?>