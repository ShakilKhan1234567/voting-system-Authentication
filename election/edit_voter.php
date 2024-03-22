<?php
 include 'dashboard_header.php';

 $id = $_GET['id'];
 $select = "SELECT * FROM voters WHERE id=$id";
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
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Voter</h3>
                    <a href="voter_list.php" class="btn btn-info">Voter List</a>
                </div>
                
                <div class="card-body">
                    <form action="update_voter.php?id=<?=$id?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$after_assoc['email']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?=$after_assoc['phone']?>">
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
<!--**********************************
Content body end
***********************************-->

<?php include 'dashboard_footer.php' ?>;
