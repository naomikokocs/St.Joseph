      <div class="modal fade" id="add-document_category">
        <div class="modal-dialog modal-md">
            <form method="post" class="form-horizontal">
          <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Category Name" required>
                    <div id="response" ></div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control form-control-border" rows="3" id="description" name="description" placeholder="Description" required></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" id="add-document_category_btn" name="add-document_category" value="Save">
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
        
    $("#name").keyup(function(){
                    
        var name = $(this).val().trim();
             
        if(name != ''){
            
            $.ajax({
                url: 'check-name.php',
                type: 'post',
                data: {name: name},
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