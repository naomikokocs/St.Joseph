<div class='modal fade' id='delete-document-<?php echo $document_id; ?>'>
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content ">
            <div class="modal-body">
                <input type="text" class="form-control" name="document_id" value="<?php echo $document_id ?>" hidden>
                <input type="text" class="form-control" name="document_name" value="<?php echo $document_name ?>" hidden>
                Are you sure you want to delete <b><?php echo $document_name; ?></b>?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger btn-flat" name="delete-document" value="Delete">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->