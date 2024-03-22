<?php
 include 'dashboard_header.php';
 $select = "SELECT * FROM voters WHERE id=$voter_id";
 $result = mysqli_query($db_connect, $select);
 $after_assoc = mysqli_fetch_assoc($result);
?>;

<!--**********************************
Content body start
***********************************-->
<div class="content-body">
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Profile Update</h3>
                </div>
                
                <div class="card-body">
                    <form action="profile_update.php?id=<?=$voter_id?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$after_assoc['email']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?=$after_assoc['phone']?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Photo Update</h3>
                </div>
                <div class="card-body">
                <form action="photo_update.php?id=<?=$voter_id?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img width="150" id="blah" src="uploads/users/<?=$after_assoc['photo']?>" alt="">
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
<!--**********************************
Content body end
***********************************-->

<?php include 'dashboard_footer.php' ?>;

<!-- sweet alert -->
<?php if(isset($_SESSION['success'])){ ?>
    <script>
        Swal.fire({
        title: "<?=$_SESSION['success']?>",
        icon: "success"
        });
    </script>
<?php }unset($_SESSION['success'])?>