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
            <h1>New Document Request </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php 
        include '../header&footer/scripts.php';
        include 'function.php'; 
        ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Requested by</th>
                        <th>Document</th>
                        <th>Remarks Message</th>
                        <th>Date of Request</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT dr.request_id, dc.name, dr.remarks_message, dr.date_of_request, dr.status, m.first_name, m.middle_name, m.last_name
                      FROM tbl_document_request AS dr
                      LEFT JOIN tbl_document_category AS dc
                      ON dr.category_id = dc.category_id
                      LEFT JOIN tbl_member AS m
                      ON dr.member_id = m.member_id
                      WHERE dr.status = 1";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($request_id, $name, $remarks_message, $date_of_request, $status, $first_name, $middle_name, $last_name);
                $qry->store_result();
                $view_btn = '';
                while ($qry->fetch()){
                    if ($_SESSION['account_category'] == 3){
                        $edit_btn = "";
                    }
                    else {
                        $edit_btn = "<button class='btn btn-flat btn-success btn-xs' data-toggle='modal' data-target='#approve-document_request-$request_id'><i class='nav-icon fas fa-check'></i> Approve</button>
                            <button class='btn btn-flat btn-warning btn-xs' data-toggle='modal' data-target='#reject-document_request-$request_id'><i class='nav-icon fas fa-ban'></i> Reject</button>";
                    }
                    echo "<tr>
                        <td class='text-center'>
                            $edit_btn
                        </td>
                        <td>$first_name $middle_name $last_name</td>
                        <td>$name</td>
                        <td>$remarks_message</td>
                        <td>$date_of_request</td>
                        </tr>";
                
                    include 'approve-document_request-modal.php';
                    include 'reject-document_request-modal.php';
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
