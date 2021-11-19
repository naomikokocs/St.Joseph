<?php 
if(isset($_POST['add-document_request'])){
    $document_request_id= null;
    $member_id= $_SESSION['user_id'];//member_id form session
    $category_id= $_POST['category_id'];
    $remarks_message= $_POST['remarks_message'];
    $date_of_request= date('Y-m-d');
    $status= "1";//pending
    $message_from_management= "";
    $user_id= "";
    $document_upload= "";
    
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_document_request VALUES (?,?,?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("sssssssss", $document_request_id, $member_id, $category_id, $remarks_message, $date_of_request, $status, $message_from_management, $user_id, $document_upload);
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
            title: 'Request Successfully added!'
            })
            });

            });
            </script>
            ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> added document request.";
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
if(isset($_POST['approve-document_request'])){
    $temp = explode(".", $_FILES["document_upload"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["document_upload"]["name"]);
    
    if (move_uploaded_file($_FILES["document_upload"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["document_upload"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $request_id= $_POST['request_id'];
        $status= 2;//approved
        $message_from_management= $_POST['message_from_management'];
        $user_id= $_SESSION['user_id'];
        $document_upload= $newfilename;

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_document_request SET status = ?, message_from_management = ?, user_id = ?, document_upload = ? WHERE request_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("sssss", $status, $message_from_management, $user_id, $document_upload, $request_id);
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
                    title: 'Successfully Approved!'
                    })
                    });

                    });
                    </script>
                ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> approved a document request.";
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
}
if(isset($_POST['reject-document_request'])){
    $request_id= $_POST['request_id'];
    $status= 3;//rejected
    $message_from_management= $_POST['message_from_management'];
    $user_id= $_SESSION['user_id'];
    $document_upload= "";

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_document_request SET status = ?, message_from_management = ?, user_id = ?, document_upload = ? WHERE request_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("sssss", $status, $message_from_management, $user_id, $document_upload, $request_id);
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
                    title: 'Saved!'
                    })
                    });

                    });
                    </script>
                ";
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> rejected a document request.";
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
                title: 'Unable to Delete!'
                })
                });

                });
                </script>
            ";
        }
}
?>