<?php include 'header_check.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
        		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Adding of Department</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" role="form" action="saveDepartment.php" method="post" >
							<div class="box-body">
								<h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
                                    <label class="form-label">Department</label>
									  <input type="text" placeholder="Enter Department Name " class="form-control" name="dpt" autocomplete="off" required />
									</div>
                                  </div>
                                  <div class="col-md-6" Style="margin-top:25px">
									<div class="form-group">
                                        <button type="button" class="btn btn-primary-light me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="add">
                                        <i class="ti-save-alt"></i> Save
                                        </button></div>
								  </div>
								</div>
								<hr class="my-15">
							</div>
							<!-- /.box-body -->
						</form>
					  </div>
					  <!-- /.box -->
				</div>
		    </div>
            <div class="row">
				<div class="col-12">
				  <div class="box">
			  </div>
			  <!-- /.box -->
			</div>
			<!--/.col (right) -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php';?>