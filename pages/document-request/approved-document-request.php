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
            <h1>Approved Document Request</h1>
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
                $sql="SELECT dr.request_id, dc.name, dr.remarks_message, dr.date_of_request, dr.status, dr.message_from_management, u.first_name, u.middle_name, u.last_name, dr.document_upload, m.first_name, m.middle_name, m.last_name
                      FROM tbl_document_request AS dr
                      LEFT JOIN tbl_document_category AS dc
                      ON dr.category_id = dc.category_id
                      LEFT JOIN tbl_user AS u
                      ON dr.user_id = u.user_id
                      LEFT JOIN tbl_member AS m
                      ON dr.member_id = m.member_id
                      WHERE dr.status = 2";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($request_id, $name, $remarks_message, $date_of_request, $status, $message_from_management, $u_first_name, $u_middle_name, $u_last_name, $document_upload, $m_first_name, $m_middle_name, $m_last_name);
                $qry->store_result();
                $view_btn = '';
                while ($qry->fetch()){
                    echo "<tr>
                        <td class='text-center'>
                            <button class='btn btn-flat btn-info btn-xs' data-toggle='modal' data-target='#view-document_request-$request_id'><i class='nav-icon fas fa-eye'></i> View</button>
                        </td>
                        <td>$m_first_name $m_middle_name $m_last_name</td>
                        <td>$name</td>
                        <td>$remarks_message</td>
                        <td>$date_of_request</td>
                        </tr>";
                    
                    include 'view-document_request-modal.php';
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
