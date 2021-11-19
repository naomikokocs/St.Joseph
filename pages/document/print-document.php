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
                  
      <div class="card">
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
        <!-- /.card-body -->
          
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include '../header&footer/scripts.php'; include 'function.php'; ?>
<script>
    window.print()
    setTimeout("window.close()",1000) 
</script>
</body>
</html>
