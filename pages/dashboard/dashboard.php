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
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Default box -->
        <div class="row">
            
            <div class="col-lg-8 col-md-12 col-sm-12"><!-- Large Left Panel-->
              <div class="card">
                <div class="card-header bg-green">
                  Donations
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Donated by</th>
                                <th>Date of Donation</th>
                                <th>Donation Type</th>
                                <th>Cash Donation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once '../database&config/config.php';
                        $cn = new mysqli (HOST, USER, PW, DB);
                        $sql="SELECT donation_id, donated_by, date_of_donation, donation_type, cash_donation, remarks, proof_of_donation FROM tbl_donation";
                        $qry=$cn->prepare($sql);
                        $qry->execute();
                        $qry->bind_result($donation_id, $donated_by, $date_of_donation, $donation_type, $cash_donation, $remarks, $proof_of_donation);
                        $qry->store_result();
                        while ($qry->fetch()){

                            echo "<tr>
                                <td>$donated_by</td>
                                <td>$date_of_donation</td>
                                <td>$donation_type</td>
                                <td>$cash_donation</td>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
                
                <div class="card">
                    <div class="card-header bg-blue">
                        Priest Scehdule
                    </div>
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Activity Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once '../database&config/config.php';
                            $cn = new mysqli (HOST, USER, PW, DB);
                            $sql="SELECT schedule_id, activity_name, date, time_started, time_ended, remarks FROM tbl_priest_schedule";
                            $qry=$cn->prepare($sql);
                            $qry->execute();
                            $qry->bind_result($schedule_id, $activity_name, $date, $time_started, $time_ended, $remarks);
                            $qry->store_result();
                            while ($qry->fetch()){
                                if ($_SESSION['account_category'] == 1){//admin
                                    $edit_button = "";
                                }
                                else if ($_SESSION['account_category'] == 2){//priest
                                    $edit_button = "<button class='btn btn-flat btn-success btn-xs' data-toggle='modal' data-target='#edit-priest_schedule-$schedule_id'><i class='nav-icon fas fa-pen'></i></button> 
                                    <button class='btn btn-flat btn-danger btn-xs' data-toggle='modal' data-target='#delete-priest_schedule-$schedule_id'><i class='nav-icon fas fa-trash'></i></button>";
                                }
                                else if ($_SESSION['account_category'] == 3){//secretary
                                    $edit_button = "";
                                }

                                echo "<tr>
                                    <td>$activity_name</td>
                                    <td>$date</td>
                                    </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                
                <div class="card">
                    <div class="card-header bg-red">
                        Members
                    </div>
                    <div class="card-body">
                        <table id="example4" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
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
                                    <td>$first_name $middle_name $last_name</td>
                                    <td class='text-center'> $active</td>
                                    </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                
            </div>
            

            <div class="col-lg-4 col-md-12 col-sm-12"> <!-- Small right Panel-->
                <div class="card">
                <div class="card-header bg-yellow"> 
                    Document Category
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once '../database&config/config.php';
                        $cn = new mysqli (HOST, USER, PW, DB);
                        $sql="SELECT dc.category_id, dc.name, dc.description, u.first_name, u.middle_name, u.last_name
                              FROM tbl_document_category AS dc
                              LEFT JOIN tbl_user AS u
                              ON dc.user_id = u.user_id";
                        $qry=$cn->prepare($sql);
                        $qry->execute();
                        $qry->bind_result($category_id, $name, $description, $first_name, $middle_name, $last_name);
                        $qry->store_result();
                        while ($qry->fetch()){

                            echo "<tr>
                                <td>$name</td>
                                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
                
                 <!-- Default box -->
                  <div class="card">
                    <div class="card-header bg-cyan">
                        Users
                    </div>
                    <div class="card-body">
                        <table id="example4" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
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
                                echo "<tr>
                                    <td>$first_name $middle_name $last_name</td>
                                    </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                
            </div>
            
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
      "responsive": true, "lengthChange": false, "searching": false, "autoWidth": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "searching": false, "autoWidth": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "searching": false, "autoWidth": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#example4").DataTable({
      "responsive": true, "lengthChange": false, "searching": false, "autoWidth": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>