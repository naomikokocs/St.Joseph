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
            <h1>Donations</h1>
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
        ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-flat btn-info" data-toggle="modal" data-target="#add-donation"><i class="fa fa-plus"></i> Add</button>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Donated by</th>
                        <th>Date of Donation</th>
                        <th>Donation Type</th>
                        <th>Cash Donation</th>
                        <th>Remarks</th>
                        <th>Proof of Donation</th>
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
                        <td class='text-center'>
                        <button class='btn btn-flat btn-success btn-xs' data-toggle='modal' data-target='#edit-donation-$donation_id'><i class='nav-icon fas fa-pen'></i></button> 
                        <button class='btn btn-flat btn-danger btn-xs' data-toggle='modal' data-target='#delete-donation-$donation_id'><i class='nav-icon fas fa-trash'></i></button>
                        </td>
                        <td>$donated_by</td>
                        <td>$date_of_donation</td>
                        <td>$donation_type</td>
                        <td>$cash_donation</td>
                        <td>$remarks</td>
                        <td class='text-center'><img src='../uploads/$proof_of_donation' class='img' style='width:100px;' alt='Image'><br>
                            <button class='btn btn-flat btn-warning btn-xs' data-toggle='modal' data-target='#edit-proof_of_donation-$donation_id'><i class='nav-icon fas fa-pen'></i> Edit Proof</button></td>
                        </tr>";
                    
                    include 'edit-modal.php';
                    include 'delete-modal.php';
                    include 'edit-proof_of_donation-modal.php';
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
      "responsive": false, "lengthChange": false, "autoWidth": false, "scrollX":true
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
