<?php
 session_start();
 if (!isset($_SESSION['user_id'])){
     header("location:../login/login.php");
 }
date_default_timezone_set("Asia/Manila");

require_once '../database&config/config.php';
$cn = new mysqli (HOST, USER, PW, DB);
$sql="SELECT about_id, parish_name, address, contact, info, logo, background_image FROM tbl_about";
$qry=$cn->prepare($sql);
$qry->execute();
$qry->bind_result($about_id, $parish_name, $address, $contact, $info, $logo, $background_image);
$qry->store_result();
$qry->fetch();

require_once '../database&config/config.php';
$cn = new mysqli (HOST, USER, PW, DB);
$sql="SELECT COUNT(request_id) FROM tbl_document_request WHERE status = '1'";
$qry=$cn->prepare($sql);
$qry->execute();
$qry->bind_result($count_new_request_id);
$qry->store_result();
$qry->fetch();
if ($count_new_request_id > 0){
    $new_document_request_badge = "<span class='right badge badge-danger'>$count_new_request_id</span>";
}
else {
    $new_document_request_badge = '';
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>San Jose Ang Tagapagtanggol Parish</title>
<link rel="icon" href="../uploads/<?php echo $logo;?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    
    <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    
 
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="../../plugins/fullcalendar/main.css">
   <style>
/*
       .content-wrapper {
           background-image: url('../uploads/<?php echo $background_image; ?>');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: cover;
       }
*/
    </style> 
    
</head>