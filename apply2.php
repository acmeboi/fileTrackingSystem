<?php
include'./header.php';
$urlData = filter_input_array(INPUT_GET);
$id = isset($urlData['id']) ? $urlData['id'] : '';
$db->setParameter(['id' => $id]);
$app = $db->viewApplication();
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
                    <h4 class="box-title">Client Registration</h4>
                    <h6 class="box-subtitle">Make sure you fill all the required fields before submitting		
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="msform" role="form" action="save_reapply.php" method="post" enctype="multipart/form-data">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Company</strong></li>
                            <li id="personal"><strong>Project</strong></li>
                            <li id="payment"><strong>Attachments</strong></li>
<!--                            <li id="confirm"><strong>Finish</strong></li>-->
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Company Data:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 3</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Company Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input type="text" value="<?= $id ?>" hidden class="form-control" name="id" required />
                                            <input type="text" value="<?= $app->companyName ?>" class="form-control" name="companyName" required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">RC Number :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <input type="text" value="<?= $app->rcNumber ?>" class="form-control" name="rcNumber" required />
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
                                                <input type="email"  value="<?= $app->email ?>" class="form-control" name="email" required />
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
                                                <input type="number" value="<?= $app->phone ?>" class="form-control" name="phone" required/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Address 1 :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" value="<?= $app->addr1 ?>" class="form-control" name="addr1" required/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Address 2 :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" value="<?= $app->addr2 ?>" class="form-control" name="addr2" required />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">State :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>

                                                <select class="form-control" name="state" required >

                                                    <option> - - -  Select State - - - </option>
                                                    <option selected value="<?= $app->state ?>"><?= $app->state ?></option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Enonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamfara</option>
                                                    <option value="FCT">FCT</option>
                                                    <option value="FCT">Others</option>
                                                </select>

                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Zipcode :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <input type="text" value="<?= $app->zipCode ?>" class="form-control" name="zipCode" required />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Tender Selection Method :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                                <select class="form-control" name="tender" required >

                                                    <option> - - -  Select Tender - - - </option>
                                                    <option selected value="<?= $app->tender ?>"><?= $app->tender ?></option>
                                                    <option value="Direct">Direct</option>
                                                    <option value="Emergency">Emergency</option>
                                                    <option value="Advert">Advert</option>
                                                    <option value="Selective Tender">Selective Tender</option>
                                                </select>
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
                                                <select class="form-control" name="mood" required >
                                                    <option> --  Select Mood -- </option>
                                                    <option selected value="<?= $app->mood ?>"><?= $app->mood < 2 ? 'Direct' : 'Due Process' ?></option>
                                                    <option value="1">Direct</option>
                                                    <option value="2">Due Process</option>
                                                </select>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next"/>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Project Data:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 3</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">File Number :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input type="text" value="<?= $app->fileNumber ?>" class="form-control" name="fileNumber" required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Project Title :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <input type="text" value="<?= $app->projectTitle ?>" class="form-control" name="projectTitle" required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Project Location :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <input type="text" value="<?= $app->projectLocation ?>" class="form-control" name="projectLocation" required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Contract Amount :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-email"></i>
                                                </div>
                                                <input type="number" value="<?= $app->contractAmount ?>" class="form-control" name="contractAmount" required />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label class="form-label">Date of Award :</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="date" value="<?= $app->dateAward ?>" class="form-control" name="dateAward" required/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next"/>
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">File Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 3</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Financial Bid :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="financialBid" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">MTB :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="mpb" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Technical Bid :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="technicalBid" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>

                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">BPP No Objection :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="bpp" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Award Letter :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="awardLetter" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>

                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">FEC Approval :</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="fecApproval" required />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="next action-button" value="Submit"/>
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        </fieldset>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<?php include'footer.php'; ?>