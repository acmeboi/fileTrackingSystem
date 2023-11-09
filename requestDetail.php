<?php include'header_check.php';?>
  
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      

      //question type
      $('#decision').change(function(){

        var v = document.getElementById('decision').value;
          if(v=='Approved'){
            $('#approved').toggle('approved');
            $('#rejected').hide();
          }  
          else if(v=='Rejected'){
            $('#rejected').toggle('rejected');
            $('#approved').hide();
          }
          else{
            $('#approved').hide();
            $('#rejected').hide();
          }            
      });
    });

  </script> 
  <style type="text/css">
    #approved{
      display: block;
    }
    #rejected{
      display: block;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Application</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-folder"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Details</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
        </div>
        
        <?php
        
        include 'db_conn.php';

        $user = $_SESSION['user'];
        $requestID=$_GET['requestID'];

        $result = $db->prepare("SELECT * FROM application where requestID='$requestID'");
        $result->execute();

        if ($row = $result->fetch()){
         
        ?>

        <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">You can review the detail of the application and comment</h4>
                        </div>
                        <div class="dropdown-divider my-30"></div>
                        <div class="box-header with-border">
                            <h1 class="box-title"> Project Data </h1>
                        </div>
                        <div class="dropdown-divider my-30"></div>
                        <div class="box-body">
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Application ID : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['requestID']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> File Number : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['fileNum']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Project Title : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['projectTitle']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Project Location : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['projectLocation']; ?></h3></div>
                            </div>
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Contract Amount : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['contractAmount']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Awarded Date : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['dateOfAward']; ?></h3></div>
                            </div>
                        </div>


                        <div class="dropdown-divider my-30"></div>
                        <div class="box-header with-border">
                            <h1 class="box-title"> Company Data </h1>
                        </div>

						<!-- /.box-header -->
						<div class="box-body">

                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Company Name : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['companyName']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> RC Number : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['rcNumber']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Email Address : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['emailAdd']; ?></h3></div>
							</div>
							
							<div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Phone Number : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['phoneNum']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Address 1 : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['addr1']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Address 2 : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['addr2']; ?></h3></div>
							</div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> State : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['state']; ?></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Zip code : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['zcode']; ?></h3></div>
							</div>
							
                        </div>

                        <div class="dropdown-divider my-30"></div>
                        <div class="box-header with-border">
                            <h1 class="box-title"> Attachment </h1>
                        </div>
                        <div class="box-body">
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong><a href="<?php echo $row['financialBid'];?>" target="_blank">Financial Bid </a> </strong></h3></div></div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong><a href="<?php echo $row['mpb'];?>" target="_blank">MPB </a> </strong></h3></div>
                            </div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> <a href="<?php echo $row['awardLetter'];?>" target="_blank">Award Letter </a></strong></h3></div></div>
                            
                            <div class="d-lg-flex d-block align-items-center">
								<div class="my-3 min-w-lg-350"><h3 class="box-title"><strong> Date : </strong></h3></div>
								<div class="my-3"><h3 class="box-title"> <?php echo $row['dateOfAward']; ?></h3></div>
                            </div>
                        </div>
                        
						<!-- /.box-body -->			
                    </div>
                    




                    
                    <div class="form-group">
                        <select class="form-control" id="decision" name="decision" required="">
                            <option value=""> -- Select Decision -- </option>
                            <option value="Approved">Approve</option>
                            <option value="Rejected">Reject</option>
                        </select>
                    </div>
                    <div class="form-group" id="approved" style="display: none">
                        
                        <label>Approval Comment</label>
                        <textarea class="form-control" placeholder="Comment" rows="2" name="comment"></textarea>
                        <input type="text" name="id" style="display: none" value="<?php echo $tyu; ?>" />
                 
                    </div>
                    <div class="form-group" id="rejected" style="display: none">
                        <label>Rejection Comment</label>
                        <textarea class="form-control" placeholder="Comment" rows="2" name="comment"></textarea>
                        <input type="text" name="id" style="display: none" value="<?php echo $tyu; ?>" />
                    </div>
                    
                    <div class="form-group" >
                        <input type="submit" class="form-control btn btn-primary" value="Submit" name="add" />
                    </div>






					<!-- /.box -->
				</div>
				<!-- /.col --> 
			</div>
			<!-- /.row -->

				<!-- /.col --> 

		</section>
		<!-- /.content -->
	  </div>
  </div>
      
  <!-- /.content-wrapper -->
  
    <?php } include'footer.php'; ?>