
<?php 
include 'dashboard_header.php';

$user_id = $_GET['id'];
$select = "SELECT * FROM users WHERE id = $user_id";
$user = mysqli_query($db_connect, $select);
$after_user_assoc = mysqli_fetch_assoc($user);

?>
<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit User</h3>
                        </div>
                        <?php if(isset($_SESSION['success'])){ ?>
                            <div class="alert alert-success mt-2"><?=$_SESSION['success']?></div>
                        <?php }unset($_SESSION['success'])?>

                        <div class="card-body">
                           <form action="update_user.php" method="post">
                           <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?=$after_user_assoc['name']?>">
                            <input type="hidden" name="user_id" class="form-control" value="<?=$user_id?>">
                           </div>
                           <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$after_user_assoc['email']?>">
                           </div>
                           <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"  value="<?=$after_user_assoc['password']?>">
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

<?php include 'dashboard_footer.php'; ?>


