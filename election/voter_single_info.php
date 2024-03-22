		<?php 
        include 'dashboard_header.php';
        include 'vote_check.php';

        $voter_info = "SELECT * FROM voters WHERE id=$voter_id";
        $voter_info_result = mysqli_query($db_connect, $voter_info);

        $candidate_info = "SELECT * FROM candidates";
        $candidate_info_result = mysqli_query($db_connect, $candidate_info);

        ?>;

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Voter Info</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>NID</th>
                                        <th>Photo</th>
                                    </tr>
                                    <?php foreach($voter_info_result as $voter){?>
                                    <tr>
                                        <td><?=$voter['name']?></td>
                                        <td><?=$voter['phone']?></td>
                                        <td><?=$voter['nid']?></td>
                                        <td>
                                            <img width="100" src="uploads/users/<?=$voter['photo']?>" alt="photo">
                                        </td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h3>Candidate Info</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Symbol Name</th>
                                        <th>Symbol</th>
                                        <th>Action</th>
                                        <th>Total Vote</th>
                                    </tr>
                                    <?php foreach($candidate_info_result as $candidate){?>
                                    <tr>
                                        <td><?=$candidate['name']?></td>
                                        <td><img width="100" src="uploads/users/<?=$candidate['photo']?>" alt="photo"></td>
                                        <td><?=$candidate['symbol_name']?></td>
                                        <td><img width="100" src="uploads/users/<?=$candidate['symbol']?>" alt="symbol"></td>
                                        <td>
                                        <?php
                                            if(isset($_SESSION['vote_check'])){?>
                                                <a title="vote" href="vote.php?id=<?=$candidate['id']?>" class="btn btn-light disabled">Done</a>
                                            <?php }else{?>
                                                <a title="vote" href="vote.php?id=<?=$candidate['id']?>" class="btn btn-danger">Vote</a>
                                            <?php }?>
                                            
                                        </td>
                                        <td><?=$candidate['vote']?></td>
                                    </tr>
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
    <?php if(isset($_SESSION['vote'])){ ?>
            <script>
                Swal.fire({
                title: "<?=$_SESSION['vote']?>",
                icon: "success"
                });
            </script>
    <?php }unset($_SESSION['vote'])?>