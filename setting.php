<?php
include'header_check.php';
include'db_conn.php'; 
session_start();

    $type = $_SESSION['user'];
    $checks = $_SESSION['checks'];


    $qry = "SELECT * FROM staff WHERE staffID = '$type' ";
        
        $result = $db->prepare($qry);
        $result->execute();

        if($row = $result->fetch()){
            $staffName = $row['staffName'];
			$email = $row['email'];
			$rak = $row['rak'];
			$contact = $row['contact'];
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Account Setting</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Security Settings</li>
							</ol>
						</nav>
					</div>
				</div>				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">				
				<div class="col-12">
					<hr>
					<div class="box">
						<div class="box-body">
							<div class="d-md-flex justify-content-between align-items-center">
								<div>
									<h5 class="text-primary fw-500">Change Password</h5>
									<p class="mb-0">Set a unique password to protect your account.</p>
								</div>
								<a href="password_changing.php" class="btn btn-info">Change Password</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
  <?php } include'footer.php'; ?>