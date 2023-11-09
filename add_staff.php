<?php 
include'./header.php'; 
$urlData = filter_input_array(INPUT_GET);
$departements = $db->getDepartement();
isset($urlData['id']) ? $db->setParameter(['id' => $urlData['id']]) : '';
$staffInfo = isset($urlData['id']) ? $db->staffInfo() : '';
?>

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
                        <form class="form" role="form" action="<?= isset($urlData['id']) ? 'update_staff.php' : 'save_staff.php' ?>" method="post" onsubmit="return validatePassword()">
                            <div class="box-body">
                                <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Staff ID</label>
                                            <input type="text" class="form-control" name="staffID" value="<?= isset($urlData['id']) ? $staffInfo->staffID : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="staffName" value="<?= isset($urlData['id']) ? $staffInfo->staffName : '' ?>" autocomplete="off" required/>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Department</label>
                                            <select class="form-control" name="dpt" required >		
                                                <option> -- Select Department -- </option>
                                                <?php
                                                foreach ($departements as $row) {
                                                    ?>
                                                <option <?= isset($urlData['id']) && $staffInfo->dpt == $row['nam'] ? 'selected' : '' ?>  value="<?= $row['nam']; ?>"><?= $row['nam']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Rank</label>
                                            <input type="text" class="form-control" name="rank" value="<?= isset($urlData['id']) ? $staffInfo->rak : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" class="form-control" name="email" value="<?= isset($urlData['id']) ? $staffInfo->email : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Contact Number</label>
                                            <input type="tel" class="form-control" maxlength="12" name="contact" value="<?= isset($urlData['id']) ? $staffInfo->contact : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" value="<?= isset($urlData['id']) ? $staffInfo->pasword : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" maxlength="12" name="cpassword" id="cpassword" value="<?= isset($urlData['id']) ? $staffInfo->pasword : '' ?>" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <?php 
                                    if(isset($urlData['id'])) {
                                    ?>
                                    <input type="text" hidden class="form-control" name="id" value="<?= isset($urlData['id']) ? $urlData['id'] : '' ?>" required />
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr class="my-15">
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-danger-light me-1 <?= isset($urlData['id']) ? 'hide' : '' ?>">
                                    <i class="ti-trash"></i> Cancel
                                </button>
                                <a href="users.php" class="btn btn-info-light <?= isset($urlData['id']) ? '' : 'hide' ?>">Go to Staff List</a>
                                <button type="submit" class="btn btn-primary" name="add">
                                    <i class="ti-save-alt"></i> 
                                    <?= isset($urlData['id']) ? 'Update' : 'Save' ?>
                                </button>
                            </div>  
                        </form>
                    </div>
                    <!-- /.box -->			
                </div>  	
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<?php include'footer.php'; ?>

<script>
   function validatePassword() {
       var password = document.getElementById('password').value;
       var cpassword = document.getElementById('cpassword').value;
       if(password !== cpassword) {
           alert("Password and confirm password not match");
           return false;
       }
       return confirm("Are you sure to save this record");
   }
</script>