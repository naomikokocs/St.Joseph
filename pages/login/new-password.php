<!DOCTYPE html>
<html lang="en">
<?php
    require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="SELECT company_logo, company_name, company_address FROM tbl_setting";
        $qry=$cn->prepare($sql);
        $qry->execute();
        $qry->bind_result($company_logo, $company_name, $company_address);
        $qry->store_result();
        $qry->fetch();
    $member_id= $_GET['member_id'];
    ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $company_name; ?></title>
<link rel="icon" href="../uploads/<?php echo $company_logo;?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <style>
</style>
</head>
<body class="hold-transition login-page" style="background-image: linear-gradient(to right, #c8e1fa , #e2b0ff);">
<div class="login-box">
  <div class="login-logo">
      <img src="../uploads/<?php echo $company_logo;?>" style="width:50%;" class="image img-circle elevation-2" style="opacity: 1" alt="LOGO">
  </div>
  <!-- /.login-logo -->
  <div class="cardelevation-2">
      <div class="card-header text-center">
      <span class="brand-text font-weight-light" style="font-size: 30px;"><b><?php echo $company_name; ?></b></span> <br> <p style="font-size: 20px;"><?php echo $company_address; ?></p></div>
    <div class="card-body login-card-body">
      <div class="callout callout-warning">
            <h5>Account Recovery</h5>
            <p>Please enter a new password.</p>
        </div>

      <form method="post">
        <div class="form-group">
                    <input type="password" class="form-control form-control-border" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-border" id="confirm_password" placeholder="Confirm Password" oninput="confirmPassword()" required>
                    <div id="response_confirm_password"></div>
                </div>
          <input type="text" class="form-control form-control-border" name="member_id" value="<?php echo $member_id;?>" hidden>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <input type="submit" class="btn btn-primary btn-block btn-sm" id="change-password" name="change-password" value="Submit">
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
      
    <!-- /.login-card-body -->
  </div>
    
</div>
<!-- /.login-box -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
<script src='../../plugins/sweetalert2/sweetalert2.min.js'></script>
<?php
    include 'forgot-password-modal.php';
    include 'register-user-modal.php';
    include 'function.php';
    include '../email-option/check-email.php'; 
?>
    <script>
        function confirmPassword() {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;
        
        if(password != confirm_password){
            document.getElementById("response_confirm_password").innerHTML = "<span style='color: red;'>Password does not match!</span>";
            document.getElementById("change-password").disabled= true;
            document.getElementById('confirm_password').className = 'form-control form-control-border is-invalid';
        }
        if(password == confirm_password){
            document.getElementById("response_confirm_password").innerHTML = " ";
            document.getElementById("change-password").disabled= false;
            document.getElementById('confirm_password').className = 'form-control form-control-border is-valid';
        }
    }
    </script>
</body>
</html>
