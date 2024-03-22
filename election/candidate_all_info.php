
<?php 
        include 'dashboard_header.php';
        if(!isset($_SESSION['id'])){
            header('location:login.php');
        }

        $id = $_GET['id'];
        $candidate_info = "SELECT * FROM candidates WHERE id=$id";
        $candidate_info_result = mysqli_query($db_connect, $candidate_info);
        ?>;

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><strong>Candidate All Info</strong></h3>
                                <a href="candidate_list.php" class="btn btn-info">Candidate_list</a>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Birth</th>
                                    <th>Phone</th>
                                </tr>
                                <?php foreach($candidate_info_result as $sl=>$all_candidate){?>
                                    <tr>
                                    <td><?=$all_candidate['name']?></td>
                                    <td><?=$all_candidate['email']?></td>
                                    <td><?=$all_candidate['father_name']?></td>
                                    <td><?=$all_candidate['mother_name']?></td>
                                    <td><?=$all_candidate['date_birth']?></td>
                                    <td><?=$all_candidate['phone']?></td>
                                </tr>
                                <?php }?>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NID</th>
                                    <th>Division</th>
                                    <th>Symbol Name</th>
                                    <th>Gender</th>
                                    <th>Photo</th>
                                    <th>Symbol</th>
                                </tr>
                                <?php foreach($candidate_info_result as $sl=>$all_candidate){?>
                                    <tr>
                                    <td><?=$all_candidate['nid']?></td>
                                    <td><?=$all_candidate['division']?></td>
                                    <td><?=$all_candidate['symbol_name']?></td>
                                    <td><?=$all_candidate['gender']?></td>
                                    <td>
                                    <img width="100" src="uploads/users/<?=$all_candidate['photo']?>" alt="photo">
                                    </td>
                                    <td>
                                    <img width="100" src="uploads/users/<?=$all_candidate['symbol']?>" alt="symbol">
                                    </td>
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