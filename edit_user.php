<?php include'header_check.php';?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		  
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<div class="d-md-flex align-items-center justify-content-between">
				<a href="add_staff.php" class="waves-effect waves-light btn btn-primary mt-10 mt-md-0">Add Staff</a>
			</div>
		</div>
		
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-body p-0">
							<div class="table-responsive">
								<?php
                                    include 'db_conn.php';
                                    $id=$_GET['id'];
                                    $result = $db->prepare("SELECT * FROM staff ORDER BY id DESC");
                                    $result->execute();
                                    if($result){
                                ?>
							  <table id="example2" class="table mb-0 w-p100">
								<thead>
									<tr>
										
										<th>S/N</th>
										<th> Staff ID </th>
										<th> Staff Name </th>
										<th> Department </th>
										<th> Rank </th>
										<th> Email</th>
										<th> Contact </th>
										<th> Added date </th>
									</tr>
								</thead>
								<tbody class="text-fade">
								<?php
                                      for($i=1; $row = $result->fetch(); $i++){ 
										  $step = 'Active'; 
										  if($step== $row['status']){
                                    ?>
                                    <tr>
                                        <td><?php echo $i.'.'; ?></td>
                                        <td><?php echo $row['staffID']; ?></td>
                                        <td><?php echo $row['staffName']; ?></td>
										<td><?php echo $row['dpt']; ?></td>
										<td><?php echo $row['rak']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
										<td><?php echo $row['contact']; ?></td>
										<td><?php echo $row['datee']; ?></td>
                                        
										<td>
											<div class="dropdown">
												<a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
												<div class="dropdown-menu">
												  <a class="dropdown-item btn-danger" href="admin_delete.php?ad_id=<?php echo $row['id']; ?>">Deactive</a>
												  <a class="dropdown-item btn-primary" href="editusers.php?id=<?php echo $row['id']; ?>">Modification</a>
												  <a class="dropdown-item btn-success" href="#">Sent Email</a>
												  </div>
											</div>
										</td>

				
				
										<td>
				
										
			</td>

									</tr>
                                   <?php 
                                        } }
									?>
									<tr>
								</tbody>
							  </table>
							  <?php 
                                }
                                else{
                                      echo "No Staff Added";
                                }
                               ?>
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
 
   
   <?php include'footer.php'; ?>