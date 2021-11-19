<!DOCTYPE html>
<html lang="en">
<?php include '../header&footer/header.php'; ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include '../sidebar&navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php 
                echo "<script src='../../plugins/jquery/jquery.min.js'></script>";
                include 'add-modal.php';  
                include 'function.php'; 
            ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-flat btn-info" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus"></i> Add</button>
            
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Full Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Complete Address</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Account Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT user_id, last_name, first_name, middle_name, contact, email, complete_address, username, password, profile_picture, account_category, account_status FROM tbl_user";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($user_id, $last_name, $first_name, $middle_name, $contact, $email, $complete_address, $username, $password, $profile_picture, $account_category, $account_status);
                $qry->store_result();
                while ($qry->fetch()){
                    if ($account_status == 1){
                        $active = "<span class='bg-green'>Active</span>";
                    }
                    else {
                        $active = "<span class='bg-yellow'>Deactive</span>";
                    }
                    
                    if ($account_category == 1){
                        $category = "Administrator";
                    }
                    if ($account_category == 2){
                        $category = "Priest";
                    }
                    if ($account_category == 3){
                        $category = "Secretary";
                    }
                    echo "<tr>
                        <td class='text-center'>
                        <a href='edit-user.php?user_id=$user_id'><button class='btn btn-flat btn-success btn-xs'><i class='nav-icon fas fa-pen'></i></button></a> 
                        </td>
                        <td class='text-center'><img src='../uploads/$profile_picture' class='img' style='width:100px;' alt='Image'><br>
                            <button class='btn btn-flat btn-warning btn-xs' data-toggle='modal' data-target='#edit-profile_picture-$user_id'><i class='nav-icon fas fa-pen'></i> Edit Picture</button>
                        </td>
                        <td>$first_name $middle_name $last_name</td>
                        <td>$contact</td>
                        <td>$email</td>
                        <td>$complete_address</td>
                        <td>$username</td>
                        <td class='text-center'>
                            <button class='btn btn-flat btn-default btn-sm' data-toggle='modal' data-target='#edit-password-$user_id'>Change Password</button>
                        </td>
                        <td>$category</td>
                        <td>$active</td>
                        </tr>";
                    
                    include 'delete-modal.php';
                    include 'edit-profile_picture-modal.php';
                    include 'edit-password-modal.php';
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include '../header&footer/footer.php';  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include '../header&footer/scripts.php'; ?>
<script>
$(function () {
      $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false, "scrollX":true
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
      $("#example2").DataTable({
      "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX":true,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
