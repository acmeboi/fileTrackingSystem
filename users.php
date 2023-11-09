<?php
include'./header.php';
$users = $db->getStaffList();
?>

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
                                            <th> Status </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-fade">
                                        <?php
                                        $sn = 0;
                                        foreach ($users as $key => $row) {
                                            $sn += 1;
                                            ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $row['staffID']; ?></td>
                                                <td><?php echo $row['staffName']; ?></td>
                                                <td><?php echo $row['dpt']; ?></td>
                                                <td><?php echo $row['rak']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
                                                <td><?= $row['status'] == 'Active' ? '<span style="color: green;">' . $row['status'] . '</span>' : '<span style="color: red;">' . $row['status'] . '</span>' ?></td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="px-10 pt-5 btn btn-toolbar btn-info-light btn-sm" href="#" data-bs-toggle="dropdown">Option</a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item btn btn-success-light btn-sm <?= $row['status'] != 'Active' ? '' : 'hide' ?>" 
                                                               href="activate.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure to Activate this staff')">Activate</a>
                                                            <a class="dropdown-item btn btn-danger-light btn-sm <?= $row['status'] == 'Active' ? '' : 'hide' ?>" 
                                                               href="deactive.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure to Deactivate this staff')">Deactivate</a>
                                                            <a class="dropdown-item btn btn-primary-light btn-sm" href="add_staff.php?id=<?= $row['id']; ?>">Modification</a>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
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