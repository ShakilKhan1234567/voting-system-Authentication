
<?php 
        include 'dashboard_header.php';

        $select = "SELECT * FROM voters";
        $voters = mysqli_query($db_connect, $select);
        ?>;

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Soft Delete</h3>
                                <a href="voter_list.php" class="btn btn-info">Voter List</a>
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
                                    <?php if($voter['deleted_at'] == 1){?>
                                <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$voter['name']?></td>
                                    <td><?=$voter['email']?></td>
                                    <td><?=$voter['phone']?></td>
                                    <td><?=$voter['nid']?></td>
                                    <td><?=$voter['gender']?></td>
                                    <td>
                                    <a title="permanent_delete" href="permanent_delete.php?id=<?=$voter['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                    <a title="restore" href="undo_voter.php?id=<?=$voter['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-undo"></i></a>
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
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include 'dashboard_footer.php' ?>;

        <!-- sweet alert -->
        <?php if(isset($_SESSION['undo'])){ ?>
            <script>
                Swal.fire({
                title: "<?=$_SESSION['undo']?>",
                icon: "success"
                });
            </script>
        <?php }unset($_SESSION['undo'])?>