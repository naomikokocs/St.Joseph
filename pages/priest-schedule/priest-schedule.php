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
            <h1>Priest Schedule</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php 
        include '../header&footer/scripts.php';
        include 'add-modal.php'; 
        include 'function.php'; 
        
        if ($_SESSION['account_category'] == 1){//admin
            $add_button = "";
        }
        else if ($_SESSION['account_category'] == 2){//priest
            $add_button = "<button class='btn btn-flat btn-info' data-toggle='modal' data-target='#add-priest_schedule'><i class='fa fa-plus'></i> Add</button>";
        }
        else if ($_SESSION['account_category'] == 3){//secretary
            $add_button = "";
        }
        ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <?php echo $add_button;?>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Activity Name</th>
                        <th>Date</th>
                        <th>Time Started</th>
                        <th>Time Ended</th>
                        <th>Remarks</th>
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
                        <td class='text-center'>
                         $edit_button
                        </td>
                        <td>$activity_name</td>
                        <td>$date</td>
                        <td>$time_started</td>
                        <td>$time_ended</td>
                        <td>$remarks</td>
                        </tr>";
                    
                    include 'edit-modal.php';
                    include 'delete-modal.php';
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
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
