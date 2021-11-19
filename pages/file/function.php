<?php 
if(isset($_POST['add-file'])){
    $temp = explode(".", $_FILES["file_upload"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
    
    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["file_upload"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $file_id= null;
        $file_category_id= $_POST['file_category_id'];
        $file_name= $_POST['file_name'];
        $file_description= $_POST['file_description'];
        $file_upload= $newfilename;
        $upload_date= date('Y-m-d');
        $user_id= $_SESSION['user_id'];
    
        require_once '../database&config/config.php';
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="INSERT INTO tbl_file VALUES (?,?,?,?,?,?,?)";
        $qry=$cn->prepare($sql);
        $qry->bind_param("sssssss", $file_id, $file_category_id, $file_name, $file_description, $file_upload, $upload_date, $user_id);
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
            title: '$file_name Successfully Added!'
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
                title: 'There was an error uploading file!'
                })
                });

                });
                </script>
                        ";
    }
}
if(isset($_POST['edit-file'])){
    $file_id= $_POST['file_id'];
    $file_category_id= $_POST['file_category_id'];
    $file_name= $_POST['file_name'];
    $file_description= $_POST['file_description'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_file SET file_category_id = ?, file_name = ?, file_description = ? WHERE file_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("ssss", $file_category_id, $file_name, $file_description, $file_id);
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
        title: ' $file_name Successfully Updated!'
        })
        });

        });
        </script>
        <meta http-equiv='refresh' content='2; url=file.php' />
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
if(isset($_POST['delete-file'])){
    $file_id= $_POST['file_id'];
    $file_upload= $_POST['file_upload'];
    
        require_once '../database&config/config.php'; 
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="DELETE FROM tbl_file WHERE file_id=?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("s", $file_id);
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
            unlink("../uploads/$file_upload");
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
if(isset($_POST['edit-file_upload'])){
    $temp = explode(".", $_FILES["file_upload"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
    
    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["file_upload"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $file_id= $_POST['file_id'];
        $file_upload= $newfilename;
        $old_file_upload= $_POST['old_file_upload'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_file SET file_upload = ? WHERE file_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $file_upload, $file_id);
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
            
                $old_file_upload = $_POST ['old_file_upload'];
                if ($old_file_upload != 'img-default.jpg'){
                    //delete old file_upload
                    unlink("../uploads/$old_file_upload");
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
                title: 'Unable to Deleted!'
                })
                });

                });
                </script>
            ";
        }
    }
}
?>