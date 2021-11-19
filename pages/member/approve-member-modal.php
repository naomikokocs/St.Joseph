      <div class="modal fade" id="approve-member-<?php echo $member_id; ?>">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Approve <?php echo "$first_name $middle_name $last_name"; ?>?</label>
                    <input type="text" name="m_first_name" value="<?php echo $first_name; ?>" hidden>
                    <input type="text" name="m_middle_name" value="<?php echo $middle_name; ?>" hidden>
                    <input type="text" name="m_last_name" value="<?php echo $last_name; ?>" hidden>
                    <input type="text" name="member_id" value="<?php echo $member_id; ?>" hidden>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
              <input type="submit" class="btn btn-primary btn-flat" name="approve-member" value="Yes">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->