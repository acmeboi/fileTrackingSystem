<?php 
include'./header.php';
$role = $_SESSION['role'];
$applications = $db->getAllNewApplications($role);
// if((int)$role == 1) {
    
// }else if((int)$role == 2) {
//     $applications = $db->getFirstAwaitingApplications();
// }else if((int)$role == 4) {
//     $previous = 'sup'.((int)$role - 1);
//     $next = 'sup'.$role;
//     $applications = $db->getDirectAwaitingApplications($previous, $next);
// }else if((int)$role == 5) {
//     $previous = 'sup'.((int)$role - 1);
//     $next = 'sup'.$role;
//     $applications = $db->getFinalDirectAwaitingApplications($previous, $next);
// } else {
//     $previous = 'sup'.((int)$role - 1);
//     $next = 'sup'.$role;
//     $applications = $db->getAwaitingApplications($previous, $next);
// }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Content Header (Page header) -->	  
        <div class="content-header">
            <div class="d-md-flex align-items-center justify-content-between">
                <div>
                    <a href="home.html" class="waves-effect waves-light btn btn-outline btn-primary ">My Dashboard</a>
                    <a href="application.php" class="waves-effect waves-light btn btn-outline btn-primary active mx-lg-10">
                        <?= (int)$role > 1 ? 'Request List' : 'Applications' ?>
                    </a>
                </div>
                <a href="apply.php" class="waves-effect waves-light btn btn-primary mt-10 mt-md-0 <?= (int)$role > 1 ? 'hide' : '' ?>">Apply</a>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body p-0">
                            <div class="table-responsive">
                                <table id="example2" class="table mb-0 w-p100">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>File Number </th>
                                            <th>Staff Name.</th>
                                            <th>Apply For</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Office</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-fade">
                                        <?php
                                            $ii = 0;
                                        foreach ($applications as $rows) {
                                            $ii += 1;
                                            $statusResponse = $db->applicationStatus($rows);
                                            ?>
                                            <tr>
                                                <td><?php echo $ii . '.'; ?></td>
                                                <td><?php echo $rows['file_no']; ?></td>
                                                <td><?php echo $rows['staff_name']; ?></td>
                                                <td><?php echo $rows['tender']; ?></td>
                                                <td><?php echo date('d M, Y', strtotime($rows['date'])); ?></td>
                                                <td style="color: <?= $statusResponse->status == 1 ? 'green' : 'red' ?>">
                                                    <?= $statusResponse->status == 1 ? 'Aproved' : 'Waiting for approval'; ?>
                                                </td>
                                                <td>
                                                    <?= $db->office($statusResponse->office); ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <?php
                                                            if($statusResponse->status == 1) {
                                                                ?>
                                                                <a class="btn btn-primary btn-sm" href="final_approval.php?id=<?= $rows['id'] ?>" onclick="return confirm('Are you sure to make a final approval')">Final Approval</a>
                                                                <?php
                                                            } 
                                                        ?>
                                                        <?php
                                                            if($statusResponse->office == $role && $statusResponse->status == 0) {
                                                                ?>
                                                                <a class="btn btn-success btn-sm" href="approve_application.php?id=<?= $statusResponse->id ?>" onclick="return confirm('Are you sure to approve this request')">Approve</a>
                                                                <?php
                                                            } 
                                                        ?>
                                                        <a href="print_application.php?id=<?= $rows['id'] ?>" target="_blank" class="btn btn-success-light btn-sm <?= $db->isApproved($rows) == true ? '' : 'hide' ?>">Print</a>
                                                        <a class="btn btn-danger-light btn-sm <?= $role > 1 || $db->isApproved($rows) == true ? 'hide' : '' ?>" style="margin-right: 5px;" href="delete_application.php?id=<?= $rows['id'] ?>" onclick="return confirm('Are you sure to Drop this Request')">Drop</a>
                                                        <!-- <a class="btn btn-info-light btn-sm" href="view_application.php?id=<?= $rows['id'] ?>">View</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>

                                    </tbody>
                                </table>
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