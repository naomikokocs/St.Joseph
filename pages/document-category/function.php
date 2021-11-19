<?php 
if(isset($_POST['add-document_category'])){
    $category_id= null;
    $name= $_POST['name'];
    $description= $_POST['description'];
    $user_id= $_SESSION['user_id'];
    
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_document_category VALUES (?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ssss", $category_id, $name, $description, $user_id);
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
            title: '$name Successfully added!'
            })
            });

            });
            </script>
            ";
            
            
            //activity log
            $log_id = '';
            $activity = "<b>$first_name $middle_name $last_name</b> added document category <b>$name</b>.";
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
if(isset($_POST['edit-document_category'])){
    $category_id= $_POST['category_id'];
    $name= $_POST['name'];
    $description= $_POST['description'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_document_category SET name = ?, description = ? WHERE category_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("sss", $name, $description, $category_id);
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
        title: ' $name Successfully Updated!'
        })
        });

        });
        </script>
        ";
        
         //activity log
        $log_id = '';
        $activity = "<b>$first_name $middle_name $last_name</b> edited document category <b>$name</b>.";
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
if(isset($_POST['delete-document_category'])){
    $category_id= $_POST['category_id'];
    
    require_once '../database&config/config.php';
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="SELECT COUNT(category_id) FROM tbl_document WHERE category_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("s", $category_id);
    $qry->execute();
    $qry->bind_result($no_category_id);
    $qry->store_result();
    $qry->fetch();
    
    if ($no_category_id == 0){
        require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="DELETE FROM tbl_document_category WHERE category_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $category_id);
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
        $activity = "<b>$first_name $middle_name $last_name</b> deleted a document category.";
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
    else {
            echo "             <script>             $(function() {             var Toast = Swal.mixin({             toast: true,             position: 'top-end',             showConfirmButton: false,             timer: 3000             });              $(document).ready(function(){             Toast.fire({             icon: 'error',             title: 'Document Category is in use! Unable to delete.'             })             });              });             </script>                     ";
    }    
}
?>