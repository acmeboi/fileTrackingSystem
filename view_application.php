<?php 
include'./header.php';
$urlData = filter_input_array(INPUT_GET);
$id = isset($urlData['id']) ? $urlData['id'] : '';
$role = $_SESSION['role'];
$db->setParameter(['id' => $id]);
$app = $db->viewApplication();
$reasons = $app->status == 1 ? $db->rejectionReasons() : [
    'rejectedBy' => '', 'resons' => ''
];
$comment = $app->status <= 1 ? $db->comment() : [
    'approvedBy' => '', 'comment' => ''
];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->	  
        <div class="content-header">
            <div class="d-md-flex align-items-center justify-content-between">
                <div>
                    <a href="home.html" class="waves-effect waves-light btn btn-outline btn-primary ">My Dashboard</a>
                    <a href="application.php" class="waves-effect waves-light btn btn-outline btn-primary active mx-lg-10">Applications</a>
                </div>
                <a href="apply.php" class="waves-effect waves-light btn btn-primary mt-10 mt-md-0  <?= (int)$role > 1 ? 'hide' : '' ?>">Apply</a>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3>Application Details</h3>
                        </div>
                        <div class="box-body">
                            <div class="alert alert-danger <?= $app->status < 1 ? 'hide' : '' ?>" role="alert">
                                This application is rejected by <strong><?= $reasons->rejectedBy ?></strong>
                            </div>
                            <div class="alert alert-info <?= $app->status < 1 ? 'hide' : '' ?>" role="alert">
                                <h3>Reason: </h3>
                                <?= $reasons->resons ?>
                            </div>
                             
                            <div class="">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <table class="table">
                                            <tr>
                                                <th>Company Name</th>
                                                <td><?= $app->companyName ?></td>
                                            </tr>
                                            <tr>
                                                <th>RC Number</th>
                                                <td><?= $app->rcNumber ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Address</th>
                                                <td><?= $app->email ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td><?= $app->phone ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address 1</th>
                                                <td><?= $app->addr1 ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address 2</th>
                                                <td><?= $app->addr2 ?></td>
                                            </tr>
                                            <tr>
                                                <th>State</th>
                                                <td><?= $app->state ?></td>
                                            </tr>
                                            <tr>
                                                <th>Financial Bid</th>
                                                <td>
                                                    <a href="<?= $app->financialBid ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>MPB</th>
                                                <td>
                                                    <a href="<?= $app->mpb ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Technical Bid</th>
                                                <td>
                                                    <a href="<?= $app->technicalBid ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <table class="table">
                                            <tr>
                                                <th>File Number:</th>
                                                <td><?= $app->fileNumber ?></td>
                                            </tr>
                                            <tr>
                                                <th>Project Title</th>
                                                <td><?= $app->projectTitle ?></td>
                                            </tr>
                                            <tr>
                                                <th>Project Location</th>
                                                <td><?= $app->projectLocation ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contract Amount</th>
                                                <td><?= $app->contractAmount ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Award</th>
                                                <td><?= $app->dateAward ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tender Selection</th>
                                                <td><?= $app->tender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Zip Code</th>
                                                <td><?= $app->zipCode ?></td>
                                            </tr>
                                            <tr>
                                                <th>BPP</th>
                                                <td>
                                                    <a href="<?= $app->bpp ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Award Letter</th>
                                                <td>
                                                    <a href="<?= $app->awardLetter ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>FEC Approval</th>
                                                <td>
                                                    <a href="<?= $app->fecApproval ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="alert alert-info-light border-info" style="padding-bottom: 0;" role="alert">
                                    <h3>Comments </h3>
                                    <?php
                                    if($app->status <= 1) {
                                    foreach ($comment as $cm) {
                                        ?>
                                        <div class="row bg-white" style="padding: 10px 0; border-bottom: 1px solid #c0c0c0;">
                                            <div class="col-12 col-lg-4">
                                                <h4><?= $cm['approvedBy'] ?></h4>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <h5><?= $cm['comment'] ?></h5>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
<!--                                || $role < 3 || ($app->mood == 1 && $role <= 4)-->
                                
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="print_application.php?id=<?= $id ?>" target="_blank" class="btn btn-success btn-sm ml-2 <?= $db->isApprovedView($app) == true ? '' : 'hide' ?>">Print</a>
                                    <a href="delete_application.php?id=<?= $id ?>" class="btn btn-danger btn-sm <?= $role > 1 || $db->isApprovedView($app) == true ? 'hide' : '' ?>" onclick="return confirm('Are you sure to delete this application')" style="margin-right: 5px;">Drop</a>
                                    <a href="apply2.php?id=<?= $app->id ?>" class="btn btn-info btn-sm <?= $app->status < 1 ? 'hide' : '' ?>" style="margin-right: 5px;">Re-apply</a>
                                    <a href="application.php" class="btn btn-primary btn-sm" style="margin-right: 5px;">Go Back</a>
                                    <div class="dropdown  <?= $role < 2 ? 'hide' : '' ?>">
                                        <button class="px-10 pt-5 btn btn-info-light btn-sm"  data-bs-toggle="dropdown">Approval</button>
                                        <div class="dropdown-menu">
                                            <button data-bs-toggle="modal" data-bs-target="#approveModal" class="btn btn-success btn-block btn-sm <?= $role < 2 ? 'hide' : '' ?>">Approve</button>
                                            <button class="btn btn-danger btn-block btn-sm <?= $role < 2 ? 'hide' : '' ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right: 5px;">Reject</button>
                                        </div>
                                    </div>
                                </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reasons for rejection</h5>
      </div>
        <form id="msform" role="form" action="reject_application.php" method="post">
      <div class="modal-body">
        
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" hidden class="form-control" name="appId" value="<?= $id ?>" required />
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" hidden class="form-control" name="rejectedBy" value="<?= $_SESSION['rank'] ?>" required />
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Please enter the reasons for rejecting this application" name="resons" rows="5" cols="10" required></textarea>
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Reject</button>
      </div>
            </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approval Comments</h5>
      </div>
        <form id="msform" role="form" action="approve_application.php" onsubmit="return confirm('Are sure to approve this application')" method="post">
      <div class="modal-body">
        
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" hidden class="form-control" name="appId" value="<?= $id ?>" required />
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" hidden class="form-control" name="approvedBy" value="<?= $_SESSION['rank'] ?>" required />
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Please enter your comment" name="comment" rows="5" cols="10" required></textarea>
                    </div>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Approve</button>
      </div>
            </form>
    </div>
  </div>
</div>

<?php include'footer.php'; ?>