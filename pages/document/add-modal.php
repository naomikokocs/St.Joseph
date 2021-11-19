      <div class="modal fade" id="add-document">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal" action="add-document.php">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_id">Document Category</label>
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
                    <label for="document_name">Document Name</label>
                    <input type="text" class="form-control form-control-border" id="document_name" name="document_name" placeholder="Document Name" required>
                    <div id="response" ></div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" id="add-document_btn" value="Add">
            </div>
          </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<script>
$(document).ready(function(){
        
    $("#document_name").keyup(function(){
                    
        var document_name = $(this).val().trim();
             
        if(document_name != ''){
            
            $.ajax({
                url: 'check-document_name.php',
                type: 'post',
                data: {document_name: document_name},
                success: function(response){
                
                    $('#response').html(response);
                
                }
            });
        }else{
            $("#response").html("");
        }
                
    });

});
</script>