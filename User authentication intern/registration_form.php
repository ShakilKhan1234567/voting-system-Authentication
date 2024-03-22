<?php include 'dashboard_header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>User Registration</h3>
                    </div>

                    <!-- submit -->
                    <?php if(isset($_SESSION['permission'])){?>
                        <div class="alert alert-success mt-2"><?=$_SESSION['permission']?></div>
                        <?php }unset($_SESSION['permission'])?>
                    <!-- submit -->

                    <!-- submit -->
                    <?php if(isset($_SESSION['submit'])){?>
                        <div class="alert alert-success mt-2"><?=$_SESSION['submit']?></div>
                        <?php }unset($_SESSION['submit'])?>
                    <!-- submit -->
                    <div class="card-body">
                        <form action="registration_post.php?id=<?=$user_id?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['old_name']))?$_SESSION['old_name']: ''?>">
                            </div>
                            <!-- name error -->
                            <?php if(isset($_SESSION['name_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['name_err']?></div>
                            <?php }unset($_SESSION['name_err'])?>
                            <!-- name error -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['old_email']))?$_SESSION['old_email']: ''?>">
                            </div>
                            <!-- email_err -->
                            <?php if(isset($_SESSION['email_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['email_err']?></div>
                            <?php }unset($_SESSION['email_err'])?>
                            <!--  email_err -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="<?=(isset($_SESSION['old_pass']))?$_SESSION['old_pass']: ''?>">
                            </div>
                            <!-- pass_err -->
                            <?php if(isset($_SESSION['pass_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['pass_err']?></div>
                            <?php }unset($_SESSION['pass_err'])?>

                            <?php if(isset($_SESSION['upper_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['upper_err']?></div>
                            <?php }unset($_SESSION['upper_err'])?>

                            <?php if(isset($_SESSION['lower_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['lower_err']?></div>
                            <?php }unset($_SESSION['lower_err'])?>

                            <?php if(isset($_SESSION['number_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['number_err']?></div>
                            <?php }unset($_SESSION['number_err'])?>

                            <?php if(isset($_SESSION['spsl_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['spsl_err']?></div>
                            <?php }unset($_SESSION['spsl_err'])?>
                            <!--  pass_err -->
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="con_pass" value="<?=(isset($_SESSION['old_con_pass']))?$_SESSION['old_con_pass']: ''?>">
                            </div>
                            <!-- con_pass_err -->
                            <?php if(isset($_SESSION['con_pass_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['con_pass_err']?></div>
                            <?php }unset($_SESSION['con_pass_err'])?>
                            <!--  con_pass_err -->
                            <h5 style="color: yellowgreen;">Select Your Gender</h5>
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
                            <!-- gender_err -->
                            <?php if(isset($_SESSION['gender_err'])){?>
                                <div class="alert alert-danger mt-2"><?=$_SESSION['gender_err']?></div>
                            <?php }unset($_SESSION['gender_err'])?>
                            <!--  gender_err -->
                            <div class="mb-3">
                                <button style="width:100%;" type="submit" class="btn btn-primary">Sign In</button>
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

 <?php include 'dashboard_footer.php';?>

 