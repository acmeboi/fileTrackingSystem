<?php
include './header.php';
?>
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
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-file"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Forms</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <!-- Step wizard -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Staff Data Capture</h4>
                    <h6 class="box-subtitle">Make sure you fill all the required fields before submitting
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="msform" role="form" action="save_apply.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">File Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" class="form-control" name="file_no" required />
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Staff Name :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <input type="text" class="form-control" name="staff_name" required />
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label class="form-label">Email Address :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-email"></i>
                                        </div>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                            <div class="col-lg-6 col-12">
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label class="form-label">Phone Number :</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="number" class="form-control" name="phone" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                            <div class="col-lg-6 col-12">
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label class="form-label">Apply For :</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <input type="text" class="form-control" name="tender" placeholder="e.g Study leave" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                            <div class="col-lg-6 col-12">
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label class="form-label">Application Mood :</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <select class="form-control" name="mood" required>
                                            <option> -- Select Mood -- </option>
                                            <option value="1">Direct</option>
                                            <option value="2">Due Process</option>
                                        </select>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Attach Document :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <input type="file" class="form-control" name="attachment" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background-color: #ffffff; padding: 10px 10px;">
                            <div class="col-12">
                                <div class="form-control bg-white">
                                    <label style="display: block; font-weight: 600; font-size: 12px; text-align: left; padding: 20px 0;">Offices for approval</label>
                                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
                                        <div>
                                            <input type="checkbox" id="rectory" name="office[]" value="1" />
                                            <label for="rectory">Rectory</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="registry" name="office[]" value="2" />
                                            <label for="registry">Registry</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="bursery" name="office[]" value="3" />
                                            <label for="bursery">Bursery</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="directo_acadamic_planing" name="office[]" value="4" />
                                            <label for="directo_acadamic_planing">Director Acadamic Planing</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" class="next action-button" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>