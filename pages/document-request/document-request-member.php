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
            <h1>Document Request</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php 
        include '../header&footer/scripts.php';
        include 'add-document_request-modal.php'; 
        include 'function.php'; 
        ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-flat btn-info" data-toggle="modal" data-target="#add-document_request"><i class="fa fa-plus"></i> Add</button>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>Document</th>
                        <th>Remarks Message</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT dr.request_id, dc.name, dr.remarks_message, dr.date_of_request, dr.status, dr.message_from_management, u.first_name, u.middle_name, u.last_name, dr.document_upload
                      FROM tbl_document_request AS dr
                      LEFT JOIN tbl_document_category AS dc
                      ON dr.category_id = dc.category_id
                      LEFT JOIN tbl_user AS u
                      ON dr.user_id = u.user_id
                      WHERE dr.member_id = '$member_id'";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($request_id, $name, $remarks_message, $date_of_request, $status, $message_from_management, $u_first_name, $u_middle_name, $u_last_name, $document_upload);
                $qry->store_result();
                $view_btn = '';
                while ($qry->fetch()){
                    if ($status == 1){
                        $status_name = "<span class='right badge badge-warning'>Pending</span>";
                        $view_btn = "";
                    }
                    if ($status == 2){
                        $status_name = "<span class='right badge badge-success'>Approved</span>";
                        $view_btn = "<button class='btn btn-flat btn-info btn-xs' data-toggle='modal' data-target='#view-document_request-$request_id'><i class='nav-icon fas fa-eye'></i> View</button> ";
                    }
                    if ($status == 3){
                        $status_name = "<span class='right badge badge-danger'>Rejected</span>";
                        $view_btn = "<button class='btn btn-flat btn-info btn-xs' data-toggle='modal' data-target='#view-document_request_rejected-$request_id'><i class='nav-icon fas fa-eye'></i> View</button> ";
                    }
                    echo "<tr>
                        <td class='text-center'>
                            $view_btn
                        </td>
                        <td>$name</td>
                        <td>$remarks_message</td>
                        <td>$date_of_request</td>
                        <td class='text-center'>$status_name</td>
                        </tr>";
                    
                    include 'view-document_request-modal.php';
                    include 'view-document_request_rejected-modal.php';
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
