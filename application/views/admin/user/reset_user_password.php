     
                       <form action="<?php echo base_url();?>WebAdmin/reset_user_password_query" method="post">
                       <br />
                       <span style="margin-left:30px; font-size:16px">Are you sure you want to reset user's password? Password will be set to user's first name.</span>
                       <br />
                       <input type="hidden" name="admin_id" value="<?=$admin_id; ?>" />
                       <div class="modal-footer">
                       <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                       <button class="btn btn-info" type="submit" name="submit">YES</button>
                       </div>
                       </div>
                       </div>
                       </div>
                       </form>