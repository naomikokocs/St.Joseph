      <div class="modal fade" id="edit-priest_schedule-<?php echo $schedule_id; ?>">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="activity_name">Activity Name</label>
                    <input type="text" class="form-control form-control-border" id="activity_name" name="activity_name" value="<?php echo $activity_name;?>" required>
                    <input type="text" name="schedule_id" value="<?php echo $schedule_id;?>" hidden>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control form-control-border" id="date" name="date" value="<?php echo $date;?>" required>
                </div>
                <div class="form-group">
                    <label for="time_started">Time Started</label>
                    <input type="time" class="form-control form-control-border" id="time_started" name="time_started" value="<?php echo $time_started;?>" required>
                </div>
                <div class="form-group">
                    <label for="time_ended">Time Ended</label>
                    <input type="time" class="form-control form-control-border" id="time_ended" name="time_ended" value="<?php echo $time_ended;?>" required>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control form-control-border" rows="3" id="remarks" name="remarks" placeholder="Remarks" required><?php echo $remarks;?></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" name="edit-priest_schedule" value="Save">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->