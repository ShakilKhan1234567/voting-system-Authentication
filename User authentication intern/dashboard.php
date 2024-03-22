 <?php include 'dashboard_header.php';

 $select = "SELECT * FROM users WHERE id=$user_id";
 $users = mysqli_query($db_connect, $select);
 $after_assoc = mysqli_fetch_assoc($users);
 ?>

<div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
              <h2 class="mb-3 mb-md-0" style="color: black;">Welcome to <?= $after_assoc['name']?> Dashboard</h2>
          </div>
     </div>
 </div>
 <?php include 'dashboard_footer.php';?>

			