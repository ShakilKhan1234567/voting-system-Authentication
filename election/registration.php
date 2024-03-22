<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto mt-5">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3>Registration Form</h3>
                    </div>
                     <!-- exist -->
                        <?php if(isset($_SESSION['exist_kore'])){ ?>
                            <div class="alert alert-success mt-2"><?=$_SESSION['exist_kore']?></div>
                       <?php }unset($_SESSION['exist_kore'])?>
                           <!-- exist -->
                    <div class="card-body">
                        <form action="registration_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['old_name'])?$_SESSION['old_name']:'')?>">
                            </div>
                            <!-- name err -->
                            <?php if(isset($_SESSION['name_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['name_err']?></div>
                            <?php }unset($_SESSION['name_err'])?>
                           <!-- name err -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['old_email'])?$_SESSION['old_email']:'')?>">
                            </div>
                            <!-- email err -->
                            <?php if(isset($_SESSION['email_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['email_err']?></div>
                            <?php }unset($_SESSION['email_err'])?>
                           <!-- email err -->
                            <div class="mb-3">
                                <label class="form-label">Father Name</label>
                                <input type="text" class="form-control" name="father_name" value="<?=(isset($_SESSION['old_father_name'])?$_SESSION['old_father_name']:'')?>">
                            </div>
                            <!-- father err -->
                            <?php if(isset($_SESSION['father_name_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['father_name_err']?></div>
                            <?php }unset($_SESSION['father_name_err'])?>
                           <!-- father err -->
                            <div class="mb-3">
                                <label class="form-label">Mother Name</label>
                                <input type="text" class="form-control" name="mother_name" value="<?=(isset($_SESSION['old_mother_name'])?$_SESSION['old_mother_name']:'')?>">
                            </div>
                            <!-- mother err -->
                            <?php if(isset($_SESSION['mother_name_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['mother_name_err']?></div>
                            <?php }unset($_SESSION['mother_name_err'])?>
                           <!-- mother err -->
                            <div class="mb-3">
                                <label class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" name="date_birth" value="<?=(isset($_SESSION['old_birth_name'])?$_SESSION['old_birth_name']:'')?>">
                            </div>
                            <!-- birth err -->
                            <?php if(isset($_SESSION['birth_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['birth_err']?></div>
                            <?php }unset($_SESSION['birth_err'])?>
                           <!-- birth err -->
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone" value="<?=(isset($_SESSION['old_phone'])?$_SESSION['old_phone']:'')?>">
                            </div>
                            <!-- phone err -->
                            <?php if(isset($_SESSION['phone_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['phone_err']?></div>
                            <?php }unset($_SESSION['phone_err'])?>
                           <!-- phone err -->
                            <div class="mb-3">
                                <label class="form-label">NID Number</label>
                                <input type="number" class="form-control" name="nid" value="<?=(isset($_SESSION['old_nid'])?$_SESSION['old_nid']:'')?>">
                            </div>
                            <!-- nid err -->
                            <?php if(isset($_SESSION['nid_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['nid_err']?></div>
                            <?php }unset($_SESSION['nid_err'])?>
                           <!-- nid err -->
                            <div class="mb-3">
                                <label class="form-label">Division</label>
                                <input type="text" class="form-control" name="division" value="<?=(isset($_SESSION['old_division'])?$_SESSION['old_division']:'')?>">
                            </div>
                            <!-- nid err -->
                            <?php if(isset($_SESSION['division_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['division_err']?></div>
                            <?php }unset($_SESSION['division_err'])?>
                           <!-- nid err -->
                           <h5 style="color:yellowgreen; margin-bottom:10px;">Select Your Gender</h5>
                           <?php
                                $gender = '';
                                if(isset($_SESSION['old_gender'] )){
                                $gender = $_SESSION['old_gender']; 
                                }
                            ?>
                            <div class="mb-3">
                                   <div class="form-check">
                                 <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" <?= $gender == 'male'?'checked':''?>>
                              <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" <?= $gender == 'female'?'checked':''?>>
                                      <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                </div>
                            </div>
                            <!-- gender err -->
                            <?php if(isset($_SESSION['gender_err'])){ ?>
                                <div class="alert alert-success mt-2"><?=$_SESSION['gender_err']?></div>
                            <?php }unset($_SESSION['gender_err'])?>
                           <!-- gender err -->
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <img id="blah" width="150" src="" alt="">
                            </div>
                            <!-- photo err -->
                            <?php if(isset($_SESSION['photo_err'])){ ?>
                                <div class="alert alert-success"><?=$_SESSION['photo_err']?></div>
                            <?php }unset($_SESSION['photo_err'])?>
                           <!-- photo err -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>