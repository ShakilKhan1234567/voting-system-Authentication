<?php
session_start();
include 'db.php';

$photo = $_FILES['photo'];
$after_explode = explode('.', $photo['name']);
$img_extension = end($after_explode);
$user_id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['photo'] == null){

  $file_name = $user_id.'.'.rand(5000,6000).'.'.$img_extension;
  $new_location = 'images/users/'.$file_name;
  move_uploaded_file($photo['tmp_name'],$new_location);

  $update = "UPDATE users SET photo='$file_name' WHERE id=$user_id";
  mysqli_query($db_connect, $update);
  header('location:user_profile.php');
}
else{
   $delete = 'images/users/'.$after_assoc['photo'];
   unlink($delete);

    $file_name = $user_id.'.'.rand(5000,6000).'.'.$img_extension;
    $new_location = 'images/users/'.$file_name;
    move_uploaded_file($photo['tmp_name'],$new_location);

    $update = "UPDATE users SET photo='$file_name' WHERE id=$user_id";
    mysqli_query($db_connect, $update);
    header('location:user_profile.php');
    
}
?>
