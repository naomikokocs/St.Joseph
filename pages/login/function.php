<?php
if(isset($_POST['add-member'])){
    $temp = explode(".", $_FILES["profile_picture"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["profile_picture"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $member_id= null;
        $last_name= $_POST['last_name'];
        $first_name= $_POST['first_name'];
        $middle_name= $_POST['middle_name'];
        $birth_date= $_POST['birth_date'];
        $age= $_POST['age'];
        $gender= $_POST['gender'];
        $complete_address= $_POST['complete_address'];
        $contact= $_POST['contact'];
        $email= $_POST['email'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $password = md5($password);
        $account_status= 3;
        $profile_picture= $newfilename;
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_member VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssssssssssssss", $member_id, $last_name, $first_name, $middle_name, $birth_date, $age, $gender, $complete_address, $contact, $email, $profile_picture, $username, $password, $account_status);
        if ($qry->execute()){
            echo "
            <script>
            $(function() {
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 20000
            });

            $(document).ready(function(){
            Toast.fire({
            icon: 'success',
            title: 'Registration Success! Please wait for the verification of your account. System Administrator will EMAIL / Send an SMS to you as soon as your registration is approved. Thank you!'
            })
            });

            });
            </script>
            ";
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
                icon: 'error',
                title: 'There was an error!'
                })
                });

                });
                </script>
                        ";
        }
    }
    else {
        
    }
}
if(isset($_POST['resend-code'])){
    $member_id = $_GET['member_id'];
    $email = $_GET['email'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT e_code_id, code, member_id, verified FROM tbl_email_code WHERE member_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("s", $member_id);
    $qry->execute();
    $qry->bind_result($e_code_id, $code, $member_id, $verified);
    $qry->store_result();
    $qry->fetch();
    
    $email = $email;
    $subject = "$company_name - EMAIL Verification";
                
    $message = "
    Here is your code: <b>$code</b>
    <br> Please verify your EMAIL Address for future transactions and account recovery. Thank you! <br> <i>This is a re-sent EMAIL</i></p><br>
    <h4><b>$company_name</b></h4>
    <p'>$company_address</p>";
                
    $comany_name = $company_name;   
                
    include '../email-option/send-email.php';
    
    echo "
            <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'success',
                title: 'Code sent successfully!'
                })
                });

                });
                </script>
                ";
}
if(isset($_POST['confirm-code'])){
    $code = $_POST['code'];
    $member_id = $_POST['member_id'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT e_code_id FROM tbl_email_code WHERE member_id = ? AND code = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $member_id, $code);
    $qry->execute();
    $qry->bind_result($e_code_id);
    $qry->store_result();
    $qry->fetch();
    
    if($qry->num_rows==1){
        
        $user_id = 'x11';
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_member_info SET user_id = ? WHERE member_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $user_id,  $member_id);
        $qry->execute();
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_email_code SET verified = '1' WHERE e_code_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $e_code_id);
            
        if ($qry->execute()){
            echo "
            <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'success',
                title: 'Email succesfully Verified! Redirecting to Login Page...'
                })
                });

                });
                </script>
                ";
            echo "<meta http-equiv='refresh' content='4; url=login.php' />";
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
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'warning',
                title: 'Code does not match! Please resend the code to your EMAIL.'
                })
                });

                });
                </script>
                ";
    }
}
if(isset($_POST['recover-account'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT member_id FROM tbl_member_info WHERE username = ? AND email = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $username, $email);
    $qry->execute();
    $qry->bind_result($member_id);
    $qry->store_result();
    $qry->fetch();
    
    if($qry->num_rows==1){
        $e_code_id = null;
        $code = substr(md5(uniqid(mt_rand(), true)) , 0, 6);
        $verified = 0;
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_email_code VALUES (?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssss", $e_code_id, $code, $member_id, $verified);
            
        if ($qry->execute()){
            
            $email = $email;
            $subject = "$company_name - Account Recovery";
            $message = "
            Here is your code to recover your account: <b>$code</b>
            <br> Please verify your EMAIL Address for future transactions and account recovery. Thank you! <br> <i>This is an automatic EMAIL</i></p><br>
            <h4><b>$company_name</b></h4>
            <p'>$company_address</p>";

            $comany_name = $company_name;   

            include '../email-option/send-email.php';

            echo "<meta http-equiv='refresh' content='0; url=account-recovery.php?member_id=$member_id&email=$email' />";
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
                timer: 6000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'warning',
                title: 'Sorry, we cannot find your username or Email in our system. Please contact your Administrator.'
                })
                });

                });
                </script>
                ";
    }
}
if(isset($_POST['confirm-code-recovery'])){
    $code = $_POST['code'];
    $member_id = $_POST['member_id'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT e_code_id FROM tbl_email_code WHERE member_id = ? AND code = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $member_id, $code);
    $qry->execute();
    $qry->bind_result($e_code_id);
    $qry->store_result();
    $qry->fetch();
    
    if($qry->num_rows==1){
        
        $user_id = 'x11';
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_member_info SET user_id = ? WHERE member_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $user_id,  $member_id);
        $qry->execute();
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_email_code SET verified = '1' WHERE e_code_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $e_code_id);
            
        if ($qry->execute()){
            echo "
            <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'success',
                title: 'Email succesfully Verified! Redirecting...'
                })
                });

                });
                </script>
                ";
            echo "<meta http-equiv='refresh' content='3; url=new-password.php?member_id=$member_id' />";
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
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'warning',
                title: 'Code does not match! Please resend the code to your EMAIL.'
                })
                });

                });
                </script>
                ";
    }
}
if(isset($_POST['change-password'])){
    $member_id = $_POST['member_id'];
    $password = $_POST['password'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_member_info SET password = ? WHERE member_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $password, $member_id);
    if ($qry->execute()){
            echo "
            <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'success',
                title: 'Password Successfully Changed! Redirecting to Login page...'
                })
                });

                });
                </script>
                ";
            echo "<meta http-equiv='refresh' content='3; url=login.php' />";
        }
    else {
        echo "
            <script>
                $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'error',
                title: 'There was an error.'
                })
                });

                });
                </script>
                ";
    }
}
?>