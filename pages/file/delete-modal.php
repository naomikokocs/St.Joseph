<div class='modal fade' id='delete-file-<?php echo $file_id; ?>'>
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content ">
            <div class="modal-body">
                <input type="text" class="form-control" name="file_id" value="<?php echo $file_id ?>" hidden>
                <input type="text" class="form-control" name="file_upload" value="<?php echo $file_upload ?>" hidden>
                <?php echo "Are you sure you want to delete <b>$file_name<b>?" ?>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger btn-flat" name="delete-file" value="Delete">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->