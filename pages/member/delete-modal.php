<div class='modal fade' id='delete-member-<?php echo $member_id; ?>'>
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content ">
            <div class="modal-body">
                <input type="text" class="form-control" name="member_id" value="<?php echo $member_id ?>" hidden>
                <input type="text" class="form-control" name="old_profile_picture" value="<?php echo $profile_picture ?>" hidden>
                <?php echo "Are you sure you want to delete <b>$first_name $middle_name $last_name<b>?" ?>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger btn-flat" name="delete-member" value="Delete">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->