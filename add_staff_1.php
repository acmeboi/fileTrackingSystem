<?php include'header_check.php';?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		  
		
        
        		<!-- Main content -->
		<section class="content">
			<div class="row">			  
				<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Adding of staff</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" role="form" action="save_admin.php" method="post" >
							<div class="box-body">
								<h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Staff ID</label>
									  <input type="text" class="form-control" name="staff" autocomplete="off" required />
									</div>
                                  </div>

                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Full Name</label>
									  <input type="text" class="form-control" name="staffName" autocomplete="off" required/>
									</div>
                                  </div>
                                  
                                  
                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Department</label>
									  <select class="form-control" name="dpt" required >		
										<option> - - Select Department - - </option>
										<?php
											include'db_conn.php'; 
			
											$result = $db->prepare("SELECT * FROM department ORDER BY nam ASC");
											$result->execute();
											if($result){
												for($i=1; $row = $result->fetch(); $i++){ 
										?>
											<option value="<?php echo $row['nam']; ?>"><?php echo $row['nam']; ?></option>
										<?php 
											} 
										}
											else{
										?>
											<option> No department added </option>
										<?php
											}
										?>
									</select>

									</div>
								  </div>
                                  
                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Rank</label>
									  <input type="text" class="form-control" name="rank" autocomplete="off" required />
									</div>
								  </div>
								  
								</div>
								
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">E-mail</label>
									  <input type="email" class="form-control" name="email" autocomplete="off" required />
									</div>
								  </div>

								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Contact Number</label>
									  <input type="text" class="form-control" maxlength="11" name="contact" autocomplete="off" required />
									</div>
								  </div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Category</label>
									  <select name="cat" id="">
										  <option value=""> - - Select Category - - </option>
										  <option value="Junior"> Junior Staff </option>
										  <option value="Senior"> Senior Staff</option>
									  </select>
									  <input type="text" class="form-control" maxlength="11" name="contact" autocomplete="off" required />
									</div>
								  </div>
								</div>

								<hr class="my-15">
									
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="button" class="btn btn-primary-light me-1">
								  <i class="ti-trash"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary" name="add">
								  <i class="ti-save-alt"></i> Save
								</button>
							</div>  
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
 
  <?php include'footer.php'; ?>