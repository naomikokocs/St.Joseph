<?php 
if(isset($_POST['update-about'])){
    $about_id= $_POST['about_id'];
    $parish_name= $_POST['parish_name'];
    $address= $_POST['address'];
    $contact= $_POST['contact'];
    $info= $_POST['info'];
    
    require_once '../database&config/config.php';    
    $cn = new mysqli (HOST, USER, PW, DB);
    $sql="UPDATE tbl_about SET parish_name=?, address=?, contact=?, info=? WHERE about_id = ?";
    $qry=$cn->prepare($sql);
    $qry->bind_param("sssss", $parish_name, $address, $contact, $info, $about_id);
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
if(isset($_POST['edit-logo'])){
    $temp = explode(".", $_FILES["logo"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["logo"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $about_id= $_POST['about_id'];
        $logo= $newfilename;
        $old_logo= $_POST['old_logo'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_about SET logo = ? WHERE about_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $logo, $about_id);
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
            
                $old_logo = $_POST ['old_logo'];
                if ($old_logo != 'img-default.jpg'){
                    //delete old logo
                    unlink("../uploads/$old_logo");
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
if(isset($_POST['edit-background_image'])){
    $temp = explode(".", $_FILES["background_image"]["name"]); 
    $newfilename = round(microtime(true)) . '.' . end($temp);   
    
    $target_dir = "../uploads/";
    
    $target_file = $target_dir . basename($_FILES["background_image"]["name"]);
    
    if (move_uploaded_file($_FILES["background_image"]["tmp_name"], $target_file . $newfilename)) {
        $filename = basename($_FILES["background_image"]["name"]);
        $newfilename = $filename.$newfilename;
        
        $about_id= $_POST['about_id'];
        $background_image= $newfilename;
        $old_background_image= $_POST['old_background_image'];

        require_once '../database&config/config.php';    
        $cn = new mysqli (HOST, USER, PW, DB);
        $sql="UPDATE tbl_about SET background_image = ? WHERE about_id = ?";
        $qry=$cn->prepare($sql);
        $qry->bind_param("ss", $background_image, $about_id);
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
            
                $old_background_image = $_POST ['old_background_image'];
                if ($old_background_image != 'img-default.jpg'){
                    //delete old background_image
                    unlink("../uploads/$old_background_image");
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