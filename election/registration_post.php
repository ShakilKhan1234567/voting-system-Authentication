
<?php 
session_start();
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


$photo = $_FILES['photo'];
$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$file_name = "voter".'.'.rand(50000, 10000).'.'.$extension;
$new_location = 'uploads/users/'.$file_name;
move_uploaded_file($photo['tmp_name'], $new_location);


// $candidate_select = "SELECT COUNT(*) as total FROM candidates WHERE name='$name' or email='$email' or phone='$phone'";
// $candidate_result = mysqli_query($db_connect, $candidate_select);
// $candidate_user_assoc = mysqli_fetch_assoc($candidate_result);


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

if($flag){
   header('location:registration.php');
}
else{
  if(isset($_SESSION['id'])){
      $_SESSION['exist_kore'] = "Already Exist";
      header('location:registration.php');
  }
   else{
    $insert = "INSERT INTO voters(name, email, father_name, mother_name, date_birth, phone, nid, division, gender, photo)VALUES('$name','$email','$father_name','$mother_name','$date_birth','$phone','$nid','$division','$gender','$file_name')";
    mysqli_query($db_connect, $insert);
    header('location:login.php');
   }
}

?>

    