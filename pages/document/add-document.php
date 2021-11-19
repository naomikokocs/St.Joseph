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
            <h1>Add New Document</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
      $category_id = $_POST['category_id'];
      $document_name = $_POST['document_name'];
      
      require_once '../database&config/config.php';
      $cn = new mysqli (HOST, USER, PW, DB);
      $sql="SELECT category_id, name FROM tbl_document_category WHERE category_id = '$category_id'";
      $qry=$cn->prepare($sql);
      $qry->execute();
      $qry->bind_result($category_id, $name);
      $qry->store_result();
      $qry->fetch();
?>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <form method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Document Category</label>
                    <input type="text" class="form-control form-control-border" id="name" value="<?php echo $name;?>" readonly>
                    <input type="text" name="category_id" value="<?php echo $category_id;?>" hidden>
                    <input type="text" name="document_name" value="<?php echo $document_name;?>" hidden>
                </div>
                <div class="form-group">
                    <label for="document_name">Document Name</label>
                    <input type="text" class="form-control form-control-border" id="document_name" name="document_name" value="<?php echo $document_name;?>" readonly>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" class="form-control" id="summernote" name="content" required></textarea>
                </div>
            </div>
            <div class="card-footer justify-content-between">
                <a href="new-document.php">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                </a>
              <input type="submit" class="btn btn-primary btn-flat" id="add-document_btn" name="add-document" value="Save">
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

<?php include '../header&footer/scripts.php'; include 'function.php';  ?>
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
    
     $(function () {
    // Summernote
    $('#summernote').summernote({
        placeholder: 'Type Here',
        height: 800,
        fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear', 'fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph', 'height']],
          ['table', ['table']],
          ['insert', ['picture']],
          ['view', ['fullscreen']],
        ]
        
    })

  })
</script>
</body>
</html>
