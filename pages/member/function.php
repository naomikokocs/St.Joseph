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
        $m_last_name= $_POST['last_name'];
        $m_first_name= $_POST['first_name'];
        $m_middle_name= $_POST['middle_name'];
        $birth_date= $_POST['birth_date'];
        $age= $_POST['age'];
        $gender= $_POST['gender'];
        $complete_address= $_POST['complete_address'];
        $contact= $_POST['contact'];
        $email= $_POST['email'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $password = md5($password);
        $account_status= $_POST['account_status'];
        $profile_picture= $newfilename;
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_member VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssssssssssssss", $member_id, $m_last_name, $m_first_name, $m_middle_name, $birth_date, $age, $gender, $complete_address, $contact, $email, $profile_picture, $username, $password, $account_status);
        if ($qry->execute()){
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
            icon: 'success',
            title: '$m_first_name $m_middle_name $m_last_name Successfully Added!'
            })
            });

            });
            </script>
            ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> added member <b>$m_first_name $m_middle_name $m_last_name</b>.";
            $time = date('Y-m-d h:i:s a');
            require_once '../database&config/config.php';
            $cn = new mysqli (HOST, USER, PW, DB);
            $sql="INSERT INTO tbl_log VALUES (?,?,?)";
            $qry=$cn->prepare($sql);
            $qry->bind_param("sss", $log_id, $activity, $time);
            $qry->execute();
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
if(isset($_POST['edit-member'])){
    $member_id= $_POST['member_id'];
    $m_last_name= $_POST['last_name'];
    $m_first_name= $_POST['first_name'];
    $m_middle_name= $_POST['middle_name'];
    $birth_date= $_POST['birth_date'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $complete_address= $_POST['complete_address'];
    $contact= $_POST['contact'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $account_status= $_POST['account_status'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_member SET last_name = ?, first_name = ?, middle_name = ?, birth_date = ?, age = ?, gender = ?, complete_address = ?, contact = ?, email = ?, username = ?, account_status = ? WHERE member_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ssssssssssss", $m_last_name, $m_first_name, $m_middle_name, $birth_date, $age, $gender, $complete_address, $contact, $email, $username, $account_status, $member_id);
    if ($qry->execute()){
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
        icon: 'success',
        title: ' $m_first_name $m_middle_name $m_last_name Successfully Updated!'
        })
        });

        });
        </script>
        <meta http-equiv='refresh' content='2; url=member.php' />
        ";
        
        //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> updated member <b>$m_first_name $m_middle_name $m_last_name</b>.";
            $time = date('Y-m-d h:i:s a');
            require_once '../database&config/config.php';
            $cn = new mysqli (HOST, USER, PW, DB);
            $sql="INSERT INTO tbl_log VALUES (?,?,?)";
            $qry=$cn->prepare($sql);
            $qry->bind_param("sss", $log_id, $activity, $time);
            $qry->execute();
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
if(isset($_POST['delete-member'])){
    $member_id= $_POST['member_id'];
    
//    require_once '../database&config/config.php';
//    $cn = new mysqli (HOST, USER, PW, DB);
//    $sql="SELECT COUNT(tbl_pwd_info.pwd_id) FROM tbl_pwd_info
//            INNER JOIN tbl_blood_type
//            ON tbl_pwd_info.blood_type_id=tbl_blood_type.blood_type_id
//            WHERE tbl_pwd_info.blood_type_id=?";
//    $qry=$cn->prepare($sql);
//    $qry->bind_param("s", $blood_type_id);
//    $qry->execute();
//    $qry->bind_result($no_of_pwd);
//    $qry->store_result();
//    $qry->fetch();
    
        require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="DELETE FROM tbl_member WHERE member_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $member_id);
        if ($qry->execute()){
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
                icon: 'success',
                title: 'Successfully Deleted!'
                })
                });

                });
                </script>
            ";
            $old_profile_picture = $_POST ['old_profile_picture'];
                if ($old_profile_picture != 'img-default.jpg'){
                    //delete old profile_picture
                    unlink("../uploads/$old_profile_picture");
                }
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> deleted a member.";
            $time = date('Y-m-d h:i:s a');
            require_once '../database&config/config.php';
            $cn = new mysqli (HOST, USER, PW, DB);
            $sql="INSERT INTO tbl_log VALUES (?,?,?)";
            $qry=$cn->prepare($sql);
            $qry->bind_param("sss", $log_id, $activity, $time);
            $qry->execute();
        }
        else {
            echo "             <script>             $(function() {             var Toast = Swal.mixin({             toast: true,             position: 'top-end',             showConfirmButton: false,             timer: 3000             });              $(document).ready(function(){             Toast.fire({             icon: 'error',             title: 'There was an error!'             })             });              });             </script>                     ";
        } 
    
    
}
if(isset($_POST['edit-profile_picture'])){
    $temp = explode(".", $_FILES["profile_picture"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["profile_picture"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $member_id= $_POST['member_id'];
        $profile_picture= $newfilename;
        $old_profile_picture= $_POST['old_profile_picture'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_member SET profile_picture = ? WHERE member_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $profile_picture, $member_id);
        if ($qry->execute()){
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
                    icon: 'success',
                    title: 'Successfully Updated!'
                    })
                    });

                    });
                    </script>
                ";
            
                $old_profile_picture = $_POST ['old_profile_picture'];
                if ($old_profile_picture != 'img-default.jpg'){
                    //delete old profile_picture
                    unlink("../uploads/$old_profile_picture");
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
                icon: 'error',
                title: 'Unable to Delete!'
                })
                });

                });
                </script>
            ";
        }
    }
}
if(isset($_POST['edit-password'])){
    $member_id= $_POST['member_id'];
    $password= $_POST['password'];
    $password= md5($password);
    
    require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_member SET password = ? WHERE member_id=?";
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
                timer: 3000
                });

                $(document).ready(function(){
                Toast.fire({
                icon: 'success',
                title: 'Password Successfully Updated!'
                })
                });

                });
                </script>
            ";
        }
        else {
            echo "             <script>             $(function() {             var Toast = Swal.mixin({             toast: true,             position: 'top-end',             showConfirmButton: false,             timer: 3000             });              $(document).ready(function(){             Toast.fire({             icon: 'error',             title: 'There was an error!'             })             });              });             </script>                     ";
        } 
}
if(isset($_POST['approve-member'])){
    $member_id= $_POST['member_id'];
    $m_first_name= $_POST['m_first_name'];
    $m_middle_name= $_POST['m_middle_name'];
    $m_last_name= $_POST['m_last_name'];
    $account_status= 1;//active
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_member SET account_status = ? WHERE member_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $account_status, $member_id);
    if ($qry->execute()){
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
        icon: 'success',
        title: ' $m_first_name $m_middle_name $m_last_name Successfully Updated!'
        })
        });

        });
        </script>
        ";
        
        //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> approved member <b>$m_first_name $m_middle_name $m_last_name</b>.";
            $time = date('Y-m-d h:i:s a');
            require_once '../database&config/config.php';
            $cn = new mysqli (HOST, USER, PW, DB);
            $sql="INSERT INTO tbl_log VALUES (?,?,?)";
            $qry=$cn->prepare($sql);
            $qry->bind_param("sss", $log_id, $activity, $time);
            $qry->execute();
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
?>