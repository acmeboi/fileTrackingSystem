<?php
include'header_check.php';
include'db_conn.php'; 

?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Change Password</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Set a unique password to protect your account</li>
							</ol>
						</nav>
					</div>
				</div>				
			</div>
		</div>

        <form class="form" role="form" action="updating_password.php" method="post" enctype="multipart/form-data">
		<!-- Main content -->
		<section class="content">
			<div class="row">	
                <div class = "col-3"></div>			
				<div class="col-6">        	
					<hr>
					<div class="box">
						<div class="box-body">
                            
					<div class="row">
						<div class="col-12">
						<label class="form-label">Current Password :</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-home"></i>
							  </div>
							  <input type="text" class="form-control" name="currentPassword" required />
							</div>
							<!-- /.input group -->
						</div>
                    </div>
                    <div class="row">
						<div class="col-12">
						<label class="form-label">New Password :</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-home"></i>
							  </div>
							  <input type="text" class="form-control" name="newPassword" required />
							</div>
							<!-- /.input group -->
						</div>
                    </div>
                    <div class="row">
						<div class="col-12">
						<label class="form-label">Retype New Password :</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-home"></i>
							  </div>
							  <input type="text" class="form-control" name="rNewPassword" required />
							</div>
							<!-- /.input group -->
						</div>
                    </div>
                </div>
        
			<div class="row">				
				<div class="col-12">
					<hr>
					<div class="box">
						<div class="box-body">
							<div class="d-md-flex justify-content-between align-items-center">
								<a href="password_changing.php" class=""> 
                                    <?php $user = $_SESSION['user']; ?>
                                    <input type="text" value="<?php echo $user; ?>" name="staffID" style="display:none" />
                                    <button class="btn btn-info" type="submit" name="change" >Change Password</button>
                                </a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		
                
			</div>
        </section>
</form>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
  <?php  include'footer.php'; ?>