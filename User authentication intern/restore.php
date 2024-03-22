
<?php 
    include 'dashboard_header.php';
    $user_id = $_GET['id'];

    $select = "SELECT * FROM users WHERE status=1";
    $all_users = mysqli_query($db_connect, $select);
?>

<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Soft Delete List</h3>
                    <a class="btn btn-primary" href="user_list.php">User_List</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>gender</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($all_users as $sl=>$user){ ?>
                            <?php if($user['status'] == 1){?>
                             <tr>
                                <td><?=$sl+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['gender']?></td>
                                <td>
                                   <a href="restore_user.php?id=<?=$user['id']?>" class="btn btn-info">Restore</a>
                                   <a href="permanent_delete.php?id=<?=$user['id']?>" class="btn btn-danger">Permanent Delete</a>
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
 <?php include 'dashboard_footer.php';?>