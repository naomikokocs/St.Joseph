<?php 
if(isset($_POST['add-user'])){
    $temp = explode(".", $_FILES["profile_picture"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["profile_picture"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $user_id= null;
        $last_name= $_POST['last_name'];
        $first_name= $_POST['first_name'];
        $middle_name= $_POST['middle_name'];
        $contact= $_POST['contact'];
        $email= $_POST['email'];
        $complete_address= $_POST['complete_address'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $password= md5($password);
        $profile_picture= $newfilename;
        $account_category= $_POST['account_category'];
        $account_status= $_POST['account_status'];
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_user VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssssssssssss", $user_id, $last_name, $first_name, $middle_name, $contact, $email, $complete_address, $username, $password, $profile_picture, $account_category, $account_status);
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
            title: '$first_name $middle_name $last_name Successfully Added!'
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
if(isset($_POST['edit-user'])){
    $user_id= $_POST['user_id'];
    $last_name= $_POST['last_name'];
    $first_name= $_POST['first_name'];
    $middle_name= $_POST['middle_name'];
    $contact= $_POST['contact'];
    $email= $_POST['email'];
    $complete_address= $_POST['complete_address'];
    $username= $_POST['username'];
    $account_category= $_POST['account_category'];
    $account_status= $_POST['account_status'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_user SET last_name = ?, first_name = ?, middle_name = ?, contact = ?, email = ?, complete_address = ?, username = ?, account_category = ?, account_status = ? WHERE user_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ssssssssss", $last_name, $first_name, $middle_name, $contact, $email, $complete_address, $username, $account_category, $account_status, $user_id);
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
        title: ' $first_name $middle_name $last_name Successfully Updated!'
        })
        });

        });
        </script>
        <meta http-equiv='refresh' content='2; url=user.php' />
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
if(isset($_POST['delete-user'])){
    $user_id= $_POST['user_id'];
    
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
        $sql="DELETE FROM tbl_user WHERE user_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $user_id);
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
        
        $user_id= $_POST['user_id'];
        $profile_picture= $newfilename;
        $old_profile_picture= $_POST['old_profile_picture'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_user SET profile_picture = ? WHERE user_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $profile_picture, $user_id);
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
    $user_id= $_POST['user_id'];
    $password= $_POST['password'];
    $password= md5($password);
    
    require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_user SET password = ? WHERE user_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $password, $user_id);
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
?>