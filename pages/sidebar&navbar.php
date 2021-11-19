<?php 
if ($_SESSION['account_category'] == "Member"){
    $member_id = $_SESSION['user_id'];
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT profile_picture, last_name, first_name, middle_name FROM tbl_member WHERE member_id = $member_id";
    $qry=$cn->prepare($sql);
    $qry->execute();
    $qry->bind_result($profile_picture, $last_name, $first_name, $middle_name);
    $qry->store_result();
    $qry->fetch();
    $user_full_name = "$first_name $middle_name $last_name";
}
else {
    $user_id = $_SESSION['user_id'];
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT profile_picture, last_name, first_name, middle_name FROM tbl_user WHERE user_id = $user_id";
    $qry=$cn->prepare($sql);
    $qry->execute();
    $qry->bind_result($profile_picture, $last_name, $first_name, $middle_name);
    $qry->store_result();
    $qry->fetch();
    $user_full_name = "$first_name $middle_name $last_name";
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light border-1">
     <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
         
    </ul>
    <div class="container">
      <a href="#" class="navbar-brand">
          <span class="brand-text font-weight-light">San Jose Ang Tagapagtanggol Parish</span>
      </a>
    </div>
</nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center" style="background-image: linear-gradient(to top, #2c3b30, #586e5e);">
        <img src="../uploads/<?php echo $logo;?>" style="width:30%;" class="image img-circle elevation-3" style="opacity: 1" alt="LOGO">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../uploads/<?php echo $profile_picture; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hi <?php echo $user_full_name; ?>!</a>
                <a href="../login/login.php" class="d-block">
                    <input type="button"  class="btn btn-xs btn-primary" name="log-out" value="Logout">
                </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
        if ($_SESSION['account_category'] == 1){//Administrator
            include 'sidebar-admin.php';
        }
        if ($_SESSION['account_category'] == 2){//Priest
            include 'sidebar-priest.php';
        }
        if ($_SESSION['account_category'] == 3){//secretary
            include 'sidebar-secretary.php';
        }
        if ($_SESSION['account_category'] == "Member"){//Member
            include 'sidebar-member.php';
        }
        ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar         -->
  </aside>