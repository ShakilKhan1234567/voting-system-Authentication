
<?php 
    include 'dashboard_header.php';
    
    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }
    $candidate = "SELECT * FROM candidates";
    $all_candidates = mysqli_query($db_connect, $candidate);

    $select_candidate = "SELECT * FROM voters WHERE id=$voter_id";
    $candidate_result = mysqli_query($db_connect, $select_candidate);
    $after_assoc_candidate = mysqli_fetch_assoc($candidate_result);
        
?>;


    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php if($after_assoc_candidate['role'] == 'commissioner'){?>
                        <div class="card">
                        <div class="card-header">
                            <h3>Candidate List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Symbol Name</th>
                                    <th>Symbol</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($all_candidates as $sl=>$all_candidate){?>
                                    <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$all_candidate['name']?></td>
                                    <td><?=$all_candidate['email']?></td>
                                    <td><?=$all_candidate['phone']?></td>
                                    <td><?=$all_candidate['symbol_name']?></td>
                                    <td><img width="100" src="uploads/users/<?=$all_candidate['symbol']?>" alt=""></td>
                                    <td><img width="100" src="uploads/users/<?=$all_candidate['photo']?>" alt=""></td>
                                    <td>
                                    <a title="delete" href="candidate_delete.php?id=<?=$all_candidate['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>

                                    <a title="delete" href="candidate_edit.php?id=<?=$all_candidate['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-edit"></i></a>

                                    <a title="all_info" href="candidate_all_info.php?id=<?=$all_candidate['id']?>" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-info"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                        <div class="alert alert-info"><strong><h3>You do not have permission to see this page</h3></strong></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'dashboard_footer.php' ?>;

     <!-- sweet alert for delete -->
<?php if(isset($_SESSION['delete_candidate'])){ ?>
    <script>
        Swal.fire({
        title: "<?=$_SESSION['delete_candidate']?>",
        icon: "success"
        });
    </script>
<?php }unset($_SESSION['delete_candidate'])?>

<?php if(isset($_SESSION['update'])){ ?>
    <script>
        Swal.fire({
        title: "<?=$_SESSION['update']?>",
        icon: "success"
        });
    </script>
<?php }unset($_SESSION['update'])?>

