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
            <h1>Edit File</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <?php 
          echo "<script src='../../plugins/jquery/jquery.min.js'></script>";
          include 'function.php'; 
          $file_id = $_GET['file_id'];
          
          require_once '../database&config/config.php';
          $cn = new mysqli (HOST, USER, PW, DB);
          $sql="SELECT f.file_id, fc.file_category_id, fc.file_category_name, f.file_name, f.file_description, f.file_upload, f.upload_date
          FROM tbl_file AS f

          LEFT JOIN tbl_file_category AS fc
          ON f.file_category_id = fc.file_category_id
          
          WHERE f.file_id = ?";
          $qry=$cn->prepare($sql);
          $qry->bind_param("s", $file_id);
          $qry->execute();
          $qry->bind_result($file_id, $file_category_id, $file_category_name, $file_name, $file_description, $file_upload, $upload_date);
          $qry->store_result();
          $qry->fetch();
          ?>
          <form method="post" class="form-horizontal" >
              <div class="card-body">
                  <div class="form-group">
                    <label>File Category</label>
                    <select class='custom-select form-control-border select2' name="file_category_id">
                        <?php
                        echo "<option value='$file_category_id'>$file_category_name</option>";
                        require_once '../database&config/config.php';
                        $cn = new mysqli (HOST, USER, PW, DB);
                        $sql="SELECT file_category_id, file_category_name FROM tbl_file_category WHERE file_category_id <> '$file_category_id'";
                        $qry=$cn->prepare($sql);
                        $qry->execute();
                        $qry->bind_result($file_category_id, $file_category_name);
                        $qry->store_result();
                        while ($qry->fetch()){
                            echo "<option value='$file_category_id'>$file_category_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_name">File Name</label>
                    <input type="text" class="form-control form-control-border" id="file_name" name="file_name" value="<?php echo $file_name; ?>" required>
                    <input type="text" name="file_id" value="<?php echo $file_id; ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="file_description">File Description</label>
                    <textarea class="form-control form-control-border" rows="2" id="file_description" name="file_description" required><?php echo $file_description; ?></textarea>
                </div>
              </div>
              <div class="card-footer">
              <a href="file.php">
                  <button type="button" class="btn btn-default btn-flat">Cancel</button>
              </a>
              <input type="submit" class="btn btn-primary btn-flat" name="edit-file" value="Save">
            </div>
          </form>
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
