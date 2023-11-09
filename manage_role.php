<?php 
include'./header.php'; 
$urlData = filter_input_array(INPUT_GET);
$staffs = $db->getStaffList();
$roles = $db->getAllRole();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">	
                <div class="col-lg-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Role</h4>
                        </div>
                        <form action="save_role.php" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Staff ID</label>
                                        <select class="form-control" name="staffId" required >		
                                            <option value=""> --Select Staff-- </option>
                                            <?php
                                            foreach ($staffs as $row) {
                                                ?>
                                                <option  value="<?= $row['id']; ?>"><?= $row['staffID']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Role/Rank</label>
                                        <select class="form-control" name="roleNumber" required >		
                                            <option value=""> --Select Staff-- </option>
                                            <option value="1"> Rector </option>
                                            <option value="2"> Registra </option>
                                            <option value="3"> Burser </option>
                                            <option value="4"> Director Acadamic Planing </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Adding of staff</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>Role/Rank</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sn = 0;
                                    foreach($roles as $rows){
                                        $sn += 1;
                                    ?>
                                    <tr>
                                        <td><?= $sn ?></td>
                                        <td><?= $rows['staffID'] ?></td>
                                        <td><?= $rows['staffName'] ?></td>
                                        <td><?= $rows['roleTitle'] ?></td>
                                        <td>
                                            <a href="remove_role.php?id=<?= $rows['id'] ?>" onclick="return confirm('Are you sure to remove this role from this staff')" class="btn btn-danger-light btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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