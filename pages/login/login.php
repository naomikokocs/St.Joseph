<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    session_destroy();
    
require_once '../database&config/config.php';
$cn = new mysqli (HOST, USER, PW, DB);
$sql="SELECT about_id, parish_name, address, contact, info, logo, background_image FROM tbl_about WHERE about_id = '1'";
$qry=$cn->prepare($sql);
$qry->execute();
$qry->bind_result($about_id, $parish_name, $address, $contact, $info, $logo, $background_image);
$qry->store_result();
$qry->fetch();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Parish Record Management System</title>
<link rel="icon" href="../uploads/<?php echo $logo;?>">

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
.login {
  min-height: 100vh;
}

.bg-image {
  background-image: url('../uploads/<?php echo $background_image;?>');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

</style>
</head>
<body class="hold-transition login-page">
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
                <div class="text-center">
                    <img src="../uploads/<?php echo $logo;?>" style="width:30%;" class="image img-circle elevation-2" style="opacity: 1" alt="LOGO">
                    
                    <h3 class="login-heading mb-4"><?php echo $parish_name;?></h3>
                    <p class="login-heading mb-4"><?php echo $address;?><br><?php echo $contact;?></p>
                </div>
                
              <!-- Sign In Form -->
              <form method="post">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-sm btn-primary text-uppercase fw-bold mb-2" type="submit" name="sign-in">Sign in</button>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#register-user">Register a new membership</a>
                  </div>
                     <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#about">About</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    if(isset($_POST['sign-in'])){
        session_start();
        require_once '../database&config/config.php';
        
        $username= $_POST['username'];
        $password= $_POST['password'];
        $password = md5($password);
        
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="SELECT user_id, account_category, account_status FROM tbl_user WHERE username=? AND password=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $username, $password);
        $qry->execute();
        $qry->bind_result($user_id, $account_category, $account_status);
        $qry->store_result();
        $qry->fetch();
        
        if($qry->num_rows==1){
            if ($account_status==1){
                $_SESSION['user_id']=$user_id;
                $_SESSION['account_category']=$account_category;
                header("location:../dashboard/dashboard.php");
            }
            else {
                echo "
                <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'warning',
                title: 'Sorry, your account is deactivated. Please contact your System Administrator.'
                })
                });

                });
                </script>
                ";
            }
            
        }
        else {
            //select form member
            $cn = new mysqli (HOST, USER, PW, DB);
            $sql="SELECT member_id, account_status FROM tbl_member WHERE username=? AND password=?";
            $qry=$cn->prepare($sql);
            $qry->bind_param("ss", $username, $password);
            $qry->execute();
            $qry->bind_result($member_id, $account_status);
            $qry->store_result();
            $qry->fetch();
            
            if($qry->num_rows==1){
                 if ($account_status==1){
                     $_SESSION['user_id']=$member_id;
                     $_SESSION['account_category']="Member";
                     header("location:../document-request/document-request-member.php");
                 }
                else {
                    echo "
                    <script>
                    $(function() {
                    var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });

                    $(document).ready(function(){
                    Toast.fire({
                    icon: 'warning',
                    title: 'Sorry, your account is deactivated. Please contact your System Administrator.'
                    })
                    });

                    });
                    </script>
                    ";
                }
            }
            else {
                 echo "
                <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'warning',
                title: 'Invalid Username or Password.'
                })
                });

                });
                </script>
                ";
                
            }
        }
        
    }
    
    include 'forgot-password-modal.php';
    include 'register-user-modal.php';
    include 'about-modal.php';
    include 'function.php';
?>
</body>
</html>

