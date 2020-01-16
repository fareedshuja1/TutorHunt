            
                       <form action="<?php echo base_url();?>WebAdmin/edit_mains_query" method="post">
   
                           <input type="text" class="form-control" id="exampleInputEmail1" style="color: #000" name="mains_title" value="<?php echo $title; ?>" >
                           <input type="hidden" class="form-control" id="exampleInputEmail1" name="mains_id" value="<?php echo $mains_id; ?>" >
    
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                       <button class="btn btn-info" type="submit" name="submit">EDIT</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form> 