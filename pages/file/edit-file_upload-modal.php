<div class='modal fade' id='edit-file_upload-<?php echo $file_id; ?>'>
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="file_upload<?php echo $file_id; ?>">Choose New File</label>
                    <input type="file" class="form-control form-control-border" id="file_upload<?php echo $file_id; ?>" name="file_upload" required>
                    <input type="text" name="file_id" value="<?php echo $file_id; ?>" hidden>
                    <input type="text" name="old_file_upload" value="<?php echo $file_upload; ?>" hidden>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" name="edit-file_upload" value="Save">
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
var uploadField<?php echo $file_id; ?> = document.getElementById("file_upload<?php echo $file_id; ?>");

uploadField<?php echo $file_id; ?>.onchange = function() {
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