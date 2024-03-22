
<?php 
    include 'dashboard_header.php';
    $voter_id = $_SESSION['id'];

    $select = "SELECT * FROM voters WHERE id!=$voter_id";
    $voters = mysqli_query($db_connect, $select);

    $select_user = "SELECT * FROM voters WHERE id=$voter_id";
    $result = mysqli_query($db_connect, $select_user);
    $after_assoc = mysqli_fetch_assoc($result);
?>;

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
                    <div class="col-lg-12">
                    <?php if($after_assoc['role'] == 'commissioner'){?>
                        <div class="card">
                        <div class="card-header">
                            <h3>Voter List</h3>
                            <a href="restore_voter.php" class="btn btn-info">Restore voter</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>NID</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($voters as $sl=>$voter){ ?>
                                <?php if($voter['deleted_at'] == 0){?>
                                <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$voter['name']?></td>
                                    <td><?=$voter['email']?></td>
                                    <td><?=$voter['phone']?></td>
                                    <td><?=$voter['nid']?></td>
                                    <td><?=$voter['gender']?></td>
                                    <td>
                                    <a title="delete" href="soft_delete.php?id=<?=$voter['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                    <a title="edit" href="edit_voter.php?id=<?=$voter['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                 </td>
                                </tr>
                                <?php }?>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                        <div class="alert alert-info"><h3>You do not have permission to see this page</h3></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'dashboard_footer.php' ?>;

    <!-- sweet alert -->
    <?php if(isset($_SESSION['delete'])){ ?>
            <script>
                Swal.fire({
                title: "<?=$_SESSION['delete']?>",
                icon: "success"
                });
            </script>
    <?php }unset($_SESSION['delete'])?>

    <!-- sweet alert for update -->
<?php if(isset($_SESSION['update'])){ ?>
    <script>
        Swal.fire({
        title: "<?=$_SESSION['update']?>",
        icon: "success"
        });
    </script>
<?php }unset($_SESSION['update'])?>