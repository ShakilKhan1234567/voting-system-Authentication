
<?php 
include 'dashboard_header.php';
$select = "SELECT * FROM users";
$all_users = mysqli_query($db_connect, $select);
?>

<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>User List</h3>
                    <a class="btn btn-primary" href="restore.php?id=<?=$user_id?>">Restore</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        <?php foreach($all_users as $sl=>$user){ ?>
                            
                            <?php if($user['status'] == 0){?>
                            <tr>
                                <td><?=$sl+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['role']?></td>
                        </tr>
                            <?php }?>
                        
                        <?php }?>
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <form action="switch_user_post.php" method="post">
            <div class="card">
                <div class="card-header">
                    <h3>Switch User</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="role_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Users</label>
                        <select name="all_user">
                            <option value="">Select User</option>
                            <?php foreach($all_users as $user){?>
                                <option value="<?=$user['id']?>"><?=$user['email']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>


<?php include 'dashboard_footer.php'; ?>