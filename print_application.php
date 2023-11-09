<?php
require_once './validator.php';
include './DB.php';
$db = new DB();

$urlData = filter_input_array(INPUT_GET);
$id = isset($urlData['id']) ? $urlData['id'] : '';
$role = $_SESSION['role'];
$db->setParameter(['id' => $id]);
$app = $db->viewApplication();
$reasons = $app->status == 1 ? $db->rejectionReasons() : [
    'rejectedBy' => '', 'resons' => ''
];
$comment = $app->status != 1 ? $db->comment() : [
    'approvedBy' => '', 'comment' => ''
];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/acc.png">

        <title> Procurement System </title>

        <?php include './stylesheet.php'; ?>	

    </head>
    <body onload="window.print()">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin: 0;">
            <div class="container-full">
                <!-- Content Header (Page header) -->	
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header" style="text-align: center;">
                                    <h1><?= $app->companyName ?></h1>
                                    <h3>Application Information</h3>
                                </div>
                                <div class="box-body">

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
                                                </table>
                                            </div>
                                        </div>
                            <div class="alert alert-info-light border-info <?= $app->status > 0 ? 'hide' : '' ?>" style="padding-bottom: 0;" role="alert">
                                    <h3>Comments </h3>
                                    <?php 
                                    foreach ($comment as $cm){
                                    ?>
                                    <div class="row bg-white" style="padding: 10px 0; border-bottom: 1px solid #c0c0c0;">
                                        <div class="col-12 col-lg-4">
                                            <h4><?= $cm['approvedBy'] ?></h4>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <h5><?= $cm['comment'] ?></h5>
                                        </div>
                                    </div>
                                    <?php } ?>
                            </div>
                                    </div>              
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->

            </div>
        </div><!-- /.content-wrapper -->
        <!-- Vendor JS -->
        <script src="src/js/vendors.min.js"></script>
        <script src="src/js/pages/chat-popup.js"></script>
        <script src="assets/icons/feather-icons/feather.min.js"></script>	

        <script src="assets/vendor_components/datatable/datatables.min.js"></script>	
        <script src="src/js/pages/data-table.js"></script>	

        <!-- EmployX App -->
        <script src="src/js/demo.js"></script>
        <script src="src/js/template.js"></script>
    </body>
</html>