<?php 
if(isset($_POST['add-donation'])){
    $temp = explode(".", $_FILES["proof_of_donation"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["proof_of_donation"]["name"]);
    
    if (move_uploaded_file($_FILES["proof_of_donation"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["proof_of_donation"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $donation_id= null;
        $donated_by= $_POST['donated_by'];
        $date_of_donation= $_POST['date_of_donation'];
        $donation_type= $_POST['donation_type'];
        $cash_donation= $_POST['cash_donation'];
        $remarks= $_POST['remarks'];
        $proof_of_donation= $newfilename;
        
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_donation VALUES (?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("sssssss", $donation_id, $donated_by, $date_of_donation, $donation_type, $cash_donation, $remarks, $proof_of_donation);
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
            title: 'Successfully Added!'
            })
            });

            });
            </script>
            ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> encoded a donation.";
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
if(isset($_POST['edit-donation'])){
    $donation_id= $_POST['donation_id'];
    $donated_by= $_POST['donated_by'];
    $date_of_donation= $_POST['date_of_donation'];
    $donation_type= $_POST['donation_type'];
    $cash_donation= $_POST['cash_donation'];
    $remarks= $_POST['remarks'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_donation SET donated_by = ?, date_of_donation = ?, donation_type = ?, cash_donation = ?, remarks = ? WHERE donation_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ssssss", $donated_by, $date_of_donation, $donation_type, $cash_donation, $remarks, $donation_id);
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
        
        //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> updated a donation.";
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
if(isset($_POST['delete-donation'])){
    $donation_id= $_POST['donation_id'];
    
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
        $sql="DELETE FROM tbl_donation WHERE donation_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $donation_id);
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
            $old_proof_of_donation = $_POST ['old_proof_of_donation'];
                if ($old_proof_of_donation != 'img-default.jpg'){
                    //delete old proof_of_donation
                    unlink("../uploads/$old_proof_of_donation");
                }
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> deleted a donation.";
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
if(isset($_POST['edit-proof_of_donation'])){
    $temp = explode(".", $_FILES["proof_of_donation"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["proof_of_donation"]["name"]);
    
    if (move_uploaded_file($_FILES["proof_of_donation"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["proof_of_donation"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $donation_id= $_POST['donation_id'];
        $proof_of_donation= $newfilename;
        $old_proof_of_donation= $_POST['old_proof_of_donation'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_donation SET proof_of_donation = ? WHERE donation_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $proof_of_donation, $donation_id);
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
            
                $old_proof_of_donation = $_POST ['old_proof_of_donation'];
                if ($old_proof_of_donation != 'img-default.jpg'){
                    //delete old proof_of_donation
                    unlink("../uploads/$old_proof_of_donation");
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
?>