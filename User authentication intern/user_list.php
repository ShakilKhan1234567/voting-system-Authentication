
<?php 
include 'dashboard_header.php';

$select = "SELECT * FROM users";
$all_users = mysqli_query($db_connect, $select);
?>

<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
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
                            <th>gender</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($all_users as $sl=>$user){ ?>
                            
                            <?php if($user['status'] == 0){?>
                            <tr>
                                <td><?=$sl+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['role']?></td>
                                <td><?=$user['gender']?></td>
                                <td>
                                <a href="delete_user.php?id=<?=$user['id']?>" class="btn btn-primary">Delete</a>
                                <a href="edit_user.php?id=<?=$user['id']?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                            <?php }?>
                        
                        <?php }?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php include 'dashboard_footer.php'; ?>