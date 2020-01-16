            
                       <form action="<?php echo base_url();?>WebAdmin/edit_subs_query" method="post">
   
                       <table width="80%" border="0" cellpadding='10' cellspacing='10'> 
                         <tr>
                         <td style="padding: 15px">
                         <div class="form-group">
                         <label for="exampleInputEmail1">Select Main Course <span style="color: red"> * </span></label>
                         
                         <select class="form-control m-bot15" name="mains_id" style="color: #000">
                         <option value="<?php echo $mains_id; ?>"><?php echo $mains_title; ?></option> 
                         <?php
                         foreach($mainc_list as $result)
                         {
                            echo "<option value='$result->mains_id'>$result->mains_title</option>";
                         }
                         ?>     
                         </select>
                         </div>
                         </td>

                <td style="padding: 10px">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Course Title <span style="color: red"> * </span></label>
                    <input name="subs_title" class="form-control" id="exampleInputEmail1" style="color: #000" value="<?php echo $subs_title; ?>" required="required">
                    <input type="hidden" name="subs_id" value="<?php echo $subs_id; ?>">
                </div>
                </td>
                </tr>
                </table>
    
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                       <button class="btn btn-info" type="submit" name="submit">EDIT</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form> 