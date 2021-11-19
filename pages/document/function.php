<?php 
if(isset($_POST['add-document'])){
    $document_id= null;
    $category_id= $_POST['category_id'];
    $document_name= $_POST['document_name'];
    $content= $_POST['content'];
    
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_document VALUES (?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssss", $document_id, $category_id, $document_name, $content);
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
            title: '$document_name Successfully added!'
            })
            });

            });
            </script>
            <meta http-equiv='refresh' content='3;url=document.php' />
            ";
            
            
            //activity log
            $log_id = '';
            $activity = "<b>$user_full_name</b> added document <b>$document_name</b>.";
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
if(isset($_POST['edit-document'])){
    $document_id= $_POST['document_id'];
    $content= $_POST['content'];
    $document_name= $_POST['document_name'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_document SET content = ? WHERE document_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ss", $content, $document_id);
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
        title: ' $document_name Successfully Updated! Please wait...'
        })
        });

        });
        </script>
        <meta http-equiv='refresh' content='3;url=view-document.php?document_id=$document_id' />
        ";
        
         //activity log
        $log_id = '';
        $activity = "<b>$user_full_name</b> edited document <b>$document_name</b>.";
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
if(isset($_POST['delete-document'])){
    $document_id= $_POST['document_id'];
    $document_name= $_POST['document_name'];
    
        require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="DELETE FROM tbl_document WHERE document_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $document_id);
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
        $activity = "<b>$user_full_name</b> deleted document <b>$document_name</b>.";
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