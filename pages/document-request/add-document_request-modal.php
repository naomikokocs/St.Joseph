      <div class="modal fade" id="add-document_request">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select class="form-control form-control-border select2" id="category_id" name="category_id" required>
                        <?php
                        require_once '../database&config/config.php';
                        $cn = new mysqli (HOST, USER, PW, DB);
                        $sql="SELECT category_id, name FROM tbl_document_category";
                        $qry=$cn->prepare($sql);
                        $qry->execute();
                        $qry->bind_result($category_id, $name);
                        $qry->store_result();
                        while ($qry->fetch()){
                            echo "
                            <option value='$category_id'>$name</option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="remarks_message">Message</label>
                    <textarea class="form-control form-control-border" rows="3" id="remarks_message" name="remarks_message" placeholder="Message" required></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" id="add-document_request_btn" name="add-document_request" value="Save">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->