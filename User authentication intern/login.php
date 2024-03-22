<?php
session_start();
?>

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
            <div class="col-lg-8 mt-5 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>User Authentication</h3>
                    </div
                    <!-- deny -->
                    <?php if(isset($_SESSION['deny'])){ ?>
                        <div class="alert alert-danger" mt-2><?=$_SESSION['deny']?></div>
                        <?php } unset($_SESSION['deny']) ?>
                    <!-- deny -->

                    <!-- deny -->
                    <?php if(isset($_SESSION['login_check'])){ ?>
                        <div class="alert alert-danger" mt-2><?=$_SESSION['login_check']?></div>
                        <?php } unset($_SESSION['login_check']) ?>
                    <!-- deny -->

                    <!-- email exist -->
                    <?php if(isset($_SESSION['exist'])){ ?>
                        <div class="alert alert-danger" mt-2><?=$_SESSION['exist']?></div>
                        <?php } unset($_SESSION['exist']) ?>
                    <!-- email exist -->

                    <!-- pass exist -->
                    <?php if(isset($_SESSION['pass'])){ ?>
                        <div class="alert alert-danger" mt-2><?=$_SESSION['pass']?></div>
                        <?php } unset($_SESSION['pass']) ?>
                    <!-- pass exist -->
                    
                    <div class="card-body">
                        <form action="login_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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