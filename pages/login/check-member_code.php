<?php
require_once '../database&config/config.php';
$cn = new mysqli (HOST, USER, PW, DB);
// Check connection
if (!$cn) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['member_code'])){
    $member_code = mysqli_real_escape_string($cn,$_POST['member_code']);

    $query = "SELECT COUNT(*) AS cnt_member_code FROM tbl_member_info WHERE member_code='".$member_code."'";
    
    $result = mysqli_query($cn,$query);
    
    $response_member_code = "";
    echo "<script>
    document.getElementById('add-member_btn').disabled = false;
    document.getElementById('member_code').className = 'form-control form-control-border is-valid';
    </script>";
    
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
    
        $count = $row['cnt_member_code'];
        
        if($count > 0){
            $response_member_code = "<span style='color: red;'>Already Exist</span>";
            echo "<script>
            document.getElementById('add-member_btn').disabled = true;
            document.getElementById('member_code').className = 'form-control form-control-border is-invalid';
            </script>";
        }
       
    }
    
    echo $response_member_code;
    die;
}
