<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];


$email_exist = "SELECT COUNT(*) as  total FROM users WHERE email = '$email'";
$email_exist_result = mysqli_query($db_connect, $email_exist);
$email_after_assoc = mysqli_fetch_assoc($email_exist_result);


if($email_after_assoc['total'] == 1){
    $pass_exist = "SELECT * FROM users WHERE email = '$email'";
    $pass_exist_result = mysqli_query($db_connect, $pass_exist);
    $pass_after_assoc = mysqli_fetch_assoc($pass_exist_result);

    if($password == $pass_after_assoc['password']){
        if($pass_after_assoc['role'] == 'super admin' || $pass_after_assoc['role'] == 'admin'){
            $_SESSION['id'] = $pass_after_assoc['id'];
            $_SESSION['login_check'] = "Successfully Login";
            header('location:dashboard.php');
        }
        else{
            $_SESSION['deny'] = "You are Not Admin Thats Why You Can not log in!";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['pass'] = "Password Does Not Matched";
        header('location:login.php');
    }

}
else{
    $_SESSION['exist'] = "Email Does Not Exist";
    header('location:login.php');
}













?>