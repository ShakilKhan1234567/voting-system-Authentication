<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$con_pass = $_POST['con_pass'];
$gender = $_POST['gender'];

$user_id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$user_id";
$users = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($users);


// password criteria start
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[!,#,$,%,^,&,*,-,"]@', $password);
// password criteria end

// Email validation start
$valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
// Email validation end

$flag = false;

if(!$name){
    $flag = true;
    $_SESSION['name_err'] = "Please Enter Your Name!";
}
else{
    $_SESSION['old_name'] = $name;
}

if(!$email){
    $flag = true;
    $_SESSION['email_err'] = "Please Enter Your email!";
}
else{
    if(!$valid_email){
        $_SESSION['email_err'] = "Please Enter Your Valid Email!";
    }
    else{
        $_SESSION['old_email'] = $email;
    }
}
if(!$password){
    $flag = true;
    $_SESSION['pass_err'] = "Please Enter Your Password!";
}
else{
    $_SESSION['old_pass'] = $password;

    if(!$upper){
        $flag = true;
        $_SESSION['upper_err'] = "Please Enter UpperCase!";
    }
    if(!$lower){
        $flag = true;
        $_SESSION['lower_err'] = "Please Enter LowerCase!";
    }
    if(!$number){
        $flag = true;
        $_SESSION['number_err'] = "Please Enter Number!";
    }
    if(!$spsl){
        $flag = true;
        $_SESSION['spsl_err'] = "Please Enter Special Character!";
    }
}
// con pass error
if(!$con_pass){
    $flag = true;
    $_SESSION['con_pass_err'] = "Please Enter Confirm Password!";
}
else{
    if($password != $con_pass){
        $_SESSION['old_con_pass'] = $con_pass;
        $flag = true;
        $_SESSION['con_pass_err'] = "Confirm Password Does Not Match!";
    }

    if(!$gender){
        $flag = true;
        $_SESSION['gender_err'] = "Please Select Your Gender!";
    }
    else{
        $_SESSION['old_gender'] = $gender;
    }
}

if($flag){
    header('location:registration_form.php');
}
else{
 if($after_assoc['role'] == 'super admin' || $after_assoc['role'] == 'admin'){
    $insert = "INSERT INTO users(name, email,password, con_pass, gender)VALUES('$name', '$email', '$password', '$con_pass', '$gender')";
    mysqli_query($db_connect, $insert);
    $_SESSION['submit'] = "Successfully Submitted!";
    header('location:registration_form.php');
 }
  else{
    $_SESSION['permission'] = "You do not have permission for registration!";
    header('location:registration_form.php');
  }  

}

?>