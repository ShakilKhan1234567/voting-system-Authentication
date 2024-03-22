<?php
include 'dashboard_header.php';
$select = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($db_connect, $select);
$assoc = mysqli_fetch_assoc($result);
?>

<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3>Profile Update</h3>
                        </div>
                        <?php if(isset($_SESSION['success'])){?>
                            <div class="alert alert-success"><?=$_SESSION['success']?></div>
                        <?php }unset($_SESSION['success'])?>
                        <div class="card-body">
                            <form action="profile_update.php?" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?=$assoc['name']?>">
                                    <input type="hidden" name="id" class="form-control" value="<?=$user_id?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?=$assoc['email']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?=$assoc['password']?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3>Photo Update</h3>
                        </div>
                        <div class="card-body">
                            <form action="user_photo_update.php?id=<?=$user_id?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <img width="150" id="blah" src="../images/users/<?=$assoc['photo']?>" alt="">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
 </div>


<?php include 'dashboard_footer.php'; ?>