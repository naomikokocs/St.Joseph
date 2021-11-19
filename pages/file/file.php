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
            <h1>Files</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-flat btn-info" data-toggle="modal" data-target="#add-file"><i class="fa fa-plus"></i> Add File</button>
            <?php 
                include 'add-modal.php';  
                echo "<script src='../../plugins/jquery/jquery.min.js'></script>";
                include 'function.php'; 
            ?>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>File Category</th>
                        <th>File Name</th>
                        <th>Description</th>
                        <th>File Upload</th>
                        <th>Date Uploaded</th>
                        <th>Uploaded by</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT f.file_id, fc.file_category_name, f.file_name, f.file_description, f.file_upload, f.upload_date, u.full_name
                      FROM tbl_file AS f
                      
                      LEFT JOIN tbl_file_category AS fc
                      ON f.file_category_id = fc.file_category_id
                      
                      LEFT JOIN tbl_user AS u
                      ON f.user_id = u.user_id";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($file_id, $file_category_name, $file_name, $file_description, $file_upload, $upload_date, $full_name);
                $qry->store_result();
                while ($qry->fetch()){
                    $file_upload1 = substr($file_upload,0,-14);
                    echo "<tr>
                        <td class='text-center'>
                            <a href='edit-file.php?file_id=$file_id'><button class='btn btn-flat btn-success btn-xs'><i class='nav-icon fas fa-pen'></i></button></a>
                            <button class='btn btn-flat btn-danger btn-xs' data-toggle='modal' data-target='#delete-file-$file_id'><i class='nav-icon fas fa-trash'></i></button>
                        </td>
                        <td>$file_category_name</td>
                        <td>$file_name</td>
                        <td>$file_description</td>
                        <td class='text-center'>
                            <a href='../uploads/$file_upload' target='_blank'>$file_upload1</a>
                            <button class='btn btn-flat btn-success btn-xs' data-toggle='modal' data-target='#edit-file_upload-$file_id'><i class='nav-icon fas fa-pen'></i></button> 
                        </td>
                        <td>$upload_date</td>
                        <td>$full_name</td>
                        </tr>";
                    
                    include 'delete-modal.php';
                    include 'edit-file_upload-modal.php';
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
