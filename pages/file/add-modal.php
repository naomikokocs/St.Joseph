      <div class="modal fade" id="add-file">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label>File Category</label>
                    <select class='custom-select form-control-border select2' name="file_category_id">
                        <?php
                        require_once '../database&config/config.php';
                        $cn = new mysqli (HOST, USER, PW, DB);
                        $sql="SELECT file_category_id, file_category_name FROM tbl_file_category ";
                        $qry=$cn->prepare($sql);
                        $qry->execute();
                        $qry->bind_result($file_category_id, $file_category_name);
                        $qry->store_result();
                        while ($qry->fetch()){
                            echo "<option value='$file_category_id'>$file_category_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_name">File Name</label>
                    <input type="text" class="form-control form-control-border" id="file_name" name="file_name" placeholder="File Name" required>
                </div>
                <div class="form-group">
                    <label for="file_description">File Description</label>
                    <textarea class="form-control form-control-border" rows="2" id="file_description" name="file_description" placeholder="File Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file_upload">Upload File</label>
                    <input type="file" class="form-control form-control-border" id="file_upload" name="file_upload" placeholder="Upload File" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" name="add-file" value="Save">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<script>
    //File Validation
var uploadField = document.getElementById("file_upload");

uploadField.onchange = function() {
    if(this.files[0].size > 10097152){
//       alert("File is too big! Please select image less than 2mb.");
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
                title: 'File too large! Image must not exceed 10mb.'
                })
                });

                });
       this.value = "";
    };
};
</script>