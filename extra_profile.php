<?php include'header_check.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Profile</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Extra</li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card text-center">
						<div class="card-body">
							<img src="../../../images/avatar/avatar-13.png" class="bg-light w-100 h-100 rounded-circle avatar-lg img-thumbnail" alt="profile-image">
							
							<?php
								 include'db_conn.php'; 
								 $username = $_SESSION['user'];
								$qry = "SELECT * FROM staff WHERE staffID = '$username'";
		
								$result = $db->prepare($qry);
								$result->execute();
							
								if($row = $result->fetch()){
									
							?>

							<h4 class="mb-0 mt-2"><?php echo $row['staffName']; ?></h4>
							<p class="text-muted fs-14"><?php echo $row['rak']; ?></p>

							<div class="text-start mt-3">
								<p class="text-muted mb-2 "><strong class="text-info">Full Name :</strong>
								 <span class="ms-2"><?php echo $row['staffName'] ?></span>
								</p>

								<p class="text-muted mb-2 ">
									<strong class="text-info">Mobile :</strong>
									<span class="ms-2"><?php echo $row['contact']; ?></span></p>

								<p class="text-muted mb-2 "><strong class="text-info">Email :</strong>
								 <span class="ms-2 "><?php echo $row['email']; ?></span></p>

							</div>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col-->

			</div>
			<!-- end row-->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
	<?php }include'footer.php'; ?>