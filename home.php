<?php
include'./header.php';
$previous = $role <= 2 ? 'sup'.$role : 'sup'.((int)$role - 1);
$next = 'sup'.$role;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->	  
        <div class="content-header">
            <div class="d-md-flex align-items-center justify-content-between">
                <div>
                    <a href="home.php" class="waves-effect waves-light btn btn-outline btn-primary active">My Dashboard</a>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <?php
                                
                            ?>
                            <div>
                                <ul class="nav nav-pills bg-nav-pills nav-fill">
                                    <li class="nav-item b-1">
                                        <a class="nav-link text-center" href="#">
                                            <?= count($db->getNewApplications()) 
                                            ?>
                                            <br> Applications</a>
                                    </li>
                                    <li class="nav-item b-1">
                                        <a class="nav-link text-center" href="#"> 
                                            <?= count($db->getAllApplicationsApproved()) ?>
                                            <br> Approved
                                        </a>
                                    </li>
                                </ul>
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