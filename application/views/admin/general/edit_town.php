                       <form action="<?php echo base_url();?>WebAdmin/edit_town_query" method="post">
   
                       <input type="text" class="form-control" id="exampleInputEmail1" style="color: #000" name="town_name" value="<?php echo $town_name; ?>" >
                       <input type="hidden" class="form-control" id="exampleInputEmail1" name="town_id" value="<?php echo $town_id; ?>" >
    
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                       <button class="btn btn-info" type="submit" name="submit">EDIT</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form> 