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
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>View Document</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
      $document_id = $_GET['document_id'];
      require_once '../database&config/config.php';
      $cn = new mysqli (HOST, USER, PW, DB);
      $sql="SELECT d.document_id, d.category_id, d.document_name, d.content, dc.name
      FROM tbl_document AS d
      LEFT JOIN tbl_document_category AS dc
      ON d.category_id = dc.category_id
      WHERE d.document_id = ?";
      $qry=$cn->prepare($sql);
      $qry->bind_param("s", $document_id);
      $qry->execute();
      $qry->bind_result($document_id, $category_id, $document_name, $content, $name);
      $qry->store_result();      
      $qry->fetch();      
?>
    <!-- Main content -->
    <section class="content">
        
        <div class="mt-1 mb-2">
            <a href="document.php">
                <button class="btn btn-default "><i class="fa ion-android-arrow-back"></i> Go back</button>
            </a>
            <a target="_blank" href="print-document.php?document_id=<?php echo $document_id;?>">
                <button id="print" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
            </a>
        </div>
          
      <div class="card">
        <div class="card-header">
          <button class="btn  btn-info btn-md" id="editBtn" onclick="editBtn()"><i class="fa ion-edit"></i> Edit</button>
            <div id="cancelBtn" style="display:none;">
                <button class="btn  btn-success btn-md" onclick="document.getElementById('edit-document_btn').click();"><i class="fa fa-save"></i> Save</button>
                <button class="btn  btn-info btn-md" onclick="cancelBtn()">Cancel</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 text-center">
                    <img src="../uploads/<?php echo $logo;?>" style="width:120px;" class="image img-circle" style="opacity: 1" alt="LOGO">
                </div>
                <div class="col-8">
                    <span class="login-heading mb-4" style="font-size:40px;"><?php echo $parish_name;?></span>
                    <p class="login-heading mb-4"><?php echo $address;?><br><?php echo $contact;?></p>
                </div>
            </div>
        </div>
          
          <div id="view">
              <div class="card-body" id="view">
                     <?php echo $content; ?>   
              </div>
          </div>
          
          <div id="edit" style="display:none;">
            <form method="post">
                <div class="card-body" >
                    <textarea type="text" class="form-control" id="summernote" name="content" required><?php echo $content; ?> </textarea>
                    <input type="text" name="document_id" value="<?php echo $document_id;?>" hidden>
                    <input type="text" name="document_name" value="<?php echo $document_name;?>" hidden>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary " id="edit-document_btn" name="edit-document" value="Save" hidden>
                </div>
            </form>
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

<?php include '../header&footer/scripts.php'; include 'function.php'; ?>
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
    
    function editBtn() {
        document.getElementById("editBtn").style.display = "none";
        document.getElementById("cancelBtn").style.display = "block";
        document.getElementById('print').disabled = true;
        document.getElementById("view").style.display = "none";
        document.getElementById("edit").style.display = "block";
    }
    function cancelBtn() {
        document.getElementById("cancelBtn").style.display = "none";
        document.getElementById('print').disabled = false;
        document.getElementById("view").style.display = "block";
        document.getElementById("edit").style.display = "none";
        document.getElementById("editBtn").style.display = "block";
    }
    
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
