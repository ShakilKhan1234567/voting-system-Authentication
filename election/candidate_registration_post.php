<?php 
session_start();

if(!isset($_SESSION['id'])){
  header('location:login.php');
}
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$date_birth = $_POST['date_birth'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$division = $_POST['division'];
$gender = $_POST['gender'];
$symbol_name = $_POST['symbol_name'];

$symbol = $_FILES['symbol'];
$explode = explode('.', $symbol['name']);
$symbol_extension = end($explode);
$symbol_file_name = "symbol".'.'.rand(100000, 200000).'.'.$symbol_extension;
$symbol_new_location = 'uploads/users/'.$symbol_file_name;
move_uploaded_file($symbol['tmp_name'], $symbol_new_location);
                                                                                                            

$photo = $_FILES['photo'];
$candidate_explode = explode('.', $photo['name']);
$candidate_extension = end($candidate_explode);
$candidate_file_name = "candidate".'.'.rand(50000, 10000).'.'.$candidate_extension;
$candidate_new_location = 'uploads/users/'.$candidate_file_name;
move_uploaded_file($photo['tmp_name'], $candidate_new_location);

$candidates_select = "SELECT COUNT(*) as total FROM candidates WHERE name='$name' or email='$email' or phone='$phone'";
$candidates_result = mysqli_query($db_connect, $candidates_select);
$candidates_user_assoc = mysqli_fetch_assoc($candidates_result);


$flag = false;
$validate_email = filter_var($email, FILTER_VALIDATE_EMAIL);

if(!$name){
  $flag = true;
  $_SESSION['name_err'] = "Please Enter Your Name";
}
else{
    $_SESSION['old_name'] = $name;
}
if(!$email){
  $flag = true;
  $_SESSION['email_err'] = "Please Enter Your email";
}
else{
    if(!$validate_email){
        $_SESSION['email_err'] = "Please Enter Valid Email";
    }else{
        $_SESSION['old_email'] = $email;
    }
}
if(!$father_name){
  $flag = true;
  $_SESSION['father_name_err'] = "Please Enter Your Father Name";
}
else{
    $_SESSION['old_father_name'] = $father_name;
}
if(!$mother_name){
  $flag = true;
  $_SESSION['mother_name_err'] = "Please Enter Your Mother Name";
}
else{
    $_SESSION['old_mother_name'] = $mother_name;
}
if(!$date_birth){
  $flag = true;
  $_SESSION['birth_err'] = "Please Enter Your Date of Birth";
}
else{
    $_SESSION['old_birth_name'] = $date_birth;
}
if(!$phone){
  $flag = true;
  $_SESSION['phone_err'] = "Please Enter Your Phone Number";
}
else{
    $_SESSION['old_phone'] = $phone;
}
if(!$nid){
  $flag = true;
  $_SESSION['nid_err'] = "Please Enter Your NID Number";
}
else{
    $_SESSION['old_nid'] = $nid;
}
if(!$division){
  $flag = true;
  $_SESSION['division_err'] = "Please Enter Your Division";
}
else{
    $_SESSION['old_division'] = $division;
}
if(!$symbol_name){
  $flag = true;
  $_SESSION['symbol_name_err'] = "Please Enter Your Symbol Name";
}
else{
    $_SESSION['old_symbol_name'] = $symbol_name;
}
if(!$gender){
  $flag = true;
  $_SESSION['gender_err'] = "Please Select Your gender";
}
else{
    $_SESSION['old_gender'] = $gender;
}
if(!$_FILES['photo']['name']){
  $flag = true;
  $_SESSION['photo_err'] = "Please Select Your photo";
}
if(!$_FILES['symbol']['name']){
  $flag = true;
  $_SESSION['symbol_err'] = "Please Select Your Symbol";
}

if($flag){
   header('location:candidate.php');
}
else{
  if($candidates_user_assoc['total'] == 1){
    $_SESSION['exist'] = "Already Exist";
    header('location:candidate.php');
  }
   else{
    $insert = "INSERT INTO candidates(name, email, father_name, mother_name, date_birth, phone, nid, division, symbol_name, gender, photo, symbol)VALUES('$name','$email','$father_name','$mother_name','$date_birth','$phone','$nid','$division','$symbol_name','$gender','$candidate_file_name','$symbol_file_name')";
    mysqli_query($db_connect, $insert);
    header('location:candidate_list.php');
   }
}

?>