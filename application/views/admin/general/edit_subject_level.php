                       <form action="<?php echo base_url();?>WebAdmin/edit_subject_level_query" method="post">
   
                           <input type="text" class="form-control" id="exampleInputEmail1" autofocus style="color: #000" name="sub_level_title" value="<?php echo $sub_level_title; ?>" >
                       <input type="hidden" class="form-control" id="exampleInputEmail1" name="sub_level_id" value="<?php echo $sub_level_id; ?>" >
    
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                       <button class="btn btn-info" type="submit" name="submit">EDIT</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form> 