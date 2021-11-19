<?php 
if(isset($_POST['add-priest_schedule'])){
    $schedule_id= null;
    $activity_name= $_POST['activity_name'];
    $date= $_POST['date'];
    $time_started= $_POST['time_started'];
    $time_ended= $_POST['time_ended'];
    $remarks= $_POST['remarks'];
    
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_priest_schedule VALUES (?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssssss", $schedule_id, $activity_name, $date, $time_started, $time_ended, $remarks);
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
            title: '$activity_name Successfully added!'
            })
            });

            });
            </script>
            ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> added <b>$activity_name</b> in priest schedule.";
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
if(isset($_POST['edit-priest_schedule'])){
    $schedule_id= $_POST['schedule_id'];
    $activity_name= $_POST['activity_name'];
    $date= $_POST['date'];
    $time_started= $_POST['time_started'];
    $time_ended= $_POST['time_ended'];
    $remarks= $_POST['remarks'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_priest_schedule SET activity_name = ?, date = ?, time_started = ?, time_ended = ?, remarks = ? WHERE schedule_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ssssss", $activity_name, $date, $time_started, $time_ended, $remarks, $schedule_id);
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
        title: ' $activity_name Successfully Updated!'
        })
        });

        });
        </script>
        ";
        
        //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> updated <b>$activity_name</b> in priest schedule.";
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
if(isset($_POST['delete-priest_schedule'])){
    $schedule_id= $_POST['schedule_id'];
    
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
        $sql="DELETE FROM tbl_priest_schedule WHERE schedule_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $schedule_id);
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
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> deleted a priest schedule.";
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
?>