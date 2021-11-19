      <div class="modal fade" id="forgot-password">
        <div class="modal-dialog modal-md">
          <div class="modal-content callout callout-warning">
            <div class="modal-body">
                <?php
                require_once '../database&config/config.php';
                $cn = new mysqli (HOST, USER, PW, DB);
                $sql="SELECT email, contact FROM tbl_user";
                $qry=$cn->prepare($sql);
                $qry->execute();
                $qry->bind_result($email, $contact);
                $qry->store_result();
                ?>
                  <h5 class="text-warning">Forgot Password</h5>
                  <p>Please contact your System Administrator/s.<br> 
                <div class="row">
                    <div class="col-6">List of Email/s:</div><div class="col-6">List of Contact/s:</div>
                    <?php 
                    while ($qry->fetch()){
                        echo "<div class='col-6'><b class='text-info'>$email</b></div>
                        <div class='col-6'><b class='text-info'>$contact</b></div>";
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->