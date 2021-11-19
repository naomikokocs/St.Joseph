      <div class="modal fade" id="approve-document_request-<?php echo $request_id; ?>">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="message_from_management">Message</label>
                    <textarea class="form-control form-control-border" rows="3" id="message_from_management" name="message_from_management" placeholder="Message" required></textarea>
                    <input name="request_id" value="<?php echo $request_id;?>" hidden>
                </div>
                <div class="form-group">
                    <label for="document_upload">Upload Document</label>
                    <input type="file" class="form-control form-control-border" id="document_upload" name="document_upload" placeholder="Message" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" id="approve-document_request_btn" name="approve-document_request" value="Save">
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
var uploadField2 = document.getElementById("document_upload");

uploadField2.onchange = function() {
    if(this.files[0].size > 5097152){
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
                title: 'File too large! File must not exceed 5mb.'
                })
                });

                });
       this.value = "";
    };
};
</script>