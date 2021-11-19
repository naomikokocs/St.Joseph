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
            <h1>Members</h1>
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
          <button class="btn btn-flat btn-info" data-toggle="modal" data-target="#add-member"><i class="fa fa-plus"></i> Add</button>
            
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Complete Address</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT member_id, last_name, first_name, middle_name, birth_date, age, gender, complete_address, contact, email, profile_picture, username, password, account_status FROM tbl_member";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($member_id, $last_name, $first_name, $middle_name, $birth_date, $age, $gender, $complete_address, $contact, $email, $profile_picture, $username, $password, $account_status);
                $qry->store_result();
                while ($qry->fetch()){
                    if ($account_status == 1){
                        $active = "<span class='bg-green'>Active</span>";
                    }
                    else if ($account_status == 0){
                        $active = "<span class='bg-yellow'>Deactive</span>";
                    }
                    else if ($account_status == 3 && $_SESSION['account_category'] == 1){
                        $active = "<span class='bg-red'>Pending</span>";
                    }
                    else if ($account_status == 3 && $_SESSION['account_category'] == 2){
                        $active = "<span class='bg-red'>Pending</span><br>
                        <button class='btn btn-flat btn-success btn-xs' data-toggle='modal' data-target='#approve-member-$member_id'> <i class='nav-icon fas fa-check'></i> Approve</button>
                        ";
                    }
                    echo "<tr>
                        <td class='text-center'>
                        <a href='edit-member.php?member_id=$member_id'><button class='btn btn-flat btn-success btn-xs'><i class='nav-icon fas fa-pen'></i></button></a> 
                        <button class='btn btn-flat btn-danger btn-xs' data-toggle='modal' data-target='#delete-member-$member_id'><i class='nav-icon fas fa-trash'></i></button>
                        </td>
                        <td class='text-center'><img src='../uploads/$profile_picture' class='img' style='width:100px;' alt='Image'><br>
                            <button class='btn btn-flat btn-warning btn-xs' data-toggle='modal' data-target='#edit-profile_picture-$member_id'><i class='nav-icon fas fa-pen'></i> Edit Picture</button>
                        </td>
                        <td>$first_name $middle_name $last_name</td>
                        <td>$birth_date</td>
                        <td>$age</td>
                        <td>$gender</td>
                        <td>$complete_address</td>
                        <td>$contact</td>
                        <td>$email</td>
                        <td>$username</td>
                        <td class='text-center'>
                            <button class='btn btn-flat btn-default btn-sm' data-toggle='modal' data-target='#edit-password-$member_id'>Change Password</button>
                        </td>
                        <td class='text-center'> $active</td>
                        </tr>";
                    
                    include 'delete-modal.php';
                    include 'edit-profile_picture-modal.php';
                    include 'edit-password-modal.php';
                    include 'approve-member-modal.php';
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
