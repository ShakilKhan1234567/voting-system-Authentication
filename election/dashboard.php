
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Welcome To <strong><?=$after_assoc['name'].'s'?></strong> Dashboard</h3>
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