      <div class="modal fade" id="view-document_request-<?php echo $request_id; ?>">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Message</dt>
                    <dd class="col-sm-8"><b>: </b><?php echo $message_from_management;?></dd>
                    <dt class="col-sm-4">Processed by</dt>
                    <dd class="col-sm-8"><b>: </b><?php echo "$u_first_name $u_middle_name $u_last_name";?></dd>
                    <dt class="col-sm-4">File Requested</dt>
                    <dd class="col-sm-8"><b>: </b><?php 
                        $document_name = substr($document_upload,0,-20);
                        echo $document_name;?> <br> 
                        <a href="../uploads/<?php echo $document_upload;?>">
                            <input type="button" class="btn btn-sm btn-default" value="Download">
                        </a>
                    </dd>
                    
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->