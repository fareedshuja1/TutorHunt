 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Record Updated Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Password Changed Successfully. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>EDIT INFO </strong></header>
          
          <div class="panel-body">  
                        
                            <form role="form" action="<?php echo base_url();?>WebAdmin/edit_profile_query" method="post">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name <span style="color: red"> * </span></label>
                    <input name="admin_fname" class="form-control" id="exampleInputEmail1" required="required" style="color: #000" value="<?php echo $admin_fname; ?>">
                </div>
                
                 <div class="form-group">
                 <label for="exampleInputPassword1">Last Name <span style="color: red"> * </span></label>
                 <input name="admin_lname" class="form-control" id="exampleInputPassword1" required="required" style="color: #000" value="<?php echo $admin_lname; ?>">
                 </div>
                                
                 <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                
                  <button type="submit" class="btn btn-info" name="submit">EDIT</button>
            
            </form>
              
       </div>
          
      </section>
              
              
                    <section class="panel">
          
          <header class="panel-heading"> <strong>CHANGE PASSWORD </strong></header>
          
          <div class="panel-body">  
                        
                            <form role="form" action="<?php echo base_url();?>WebAdmin/change_password" method="post">
                 
                 <div class="form-group">
                    <label for="exampleInputEmail1">OLD PASSWORD <span style="color: red"> * </span></label>
                    <input name="old_pass" class="form-control" id="exampleInputEmail1" style="color: #000" required="required" value="">
                 </div>
                
                 <div class="form-group">
                    <label for="exampleInputPassword1">NEW PASSWORD <span style="color: red"> * </span></label>
                    <input name="new_pass" class="form-control" id="exampleInputPassword1" style="color: #000" required="required"  value="">
                 </div>
                                
                 <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                
                 <button type="submit" class="btn btn-info" name="submit">CHANGE</button>
            
            </form>
              
                        </div>
          
      </section>
              
                       </section>
      </section>
 