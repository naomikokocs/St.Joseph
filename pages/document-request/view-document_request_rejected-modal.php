      <div class="modal fade" id="view-document_request_rejected-<?php echo $request_id; ?>">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Message</dt>
                    <dd class="col-sm-8"><b>: </b><?php echo $message_from_management;?></dd>
                    <dt class="col-sm-4">Rejected by</dt>
                    <dd class="col-sm-8"><b>: </b><?php echo "$u_first_name $u_middle_name $u_last_name";?></dd>
                    
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