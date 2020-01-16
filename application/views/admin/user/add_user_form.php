 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">User Created Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                              <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Passwords did not match. Please try again. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-info fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
   

      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD USER FORM </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/create_user" method="post">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name <span style="color: red"> * </span></label>
                <input name="fname" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" required="required">
                </div>
                
                 <div class="form-group">
                 <label for="exampleInputPassword1">Last Name <span style="color: red"> * </span></label>
                 <input name="lname" class="form-control" id="exampleInputPassword1" placeholder="Enter Last Name" required="required">
                 </div>
                
                 <div class="form-group">
                 <label for="exampleInputPassword1">Email Address <span style="color: red"> * </span></label>
                 <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" required="required">
                 </div>
                
                 <div class="form-group">
                 <label for="exampleInputPassword1">Password <span style="color: red"> * </span></label>
                 <input name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required="required">
                 </div>
                
                 <div class="form-group">
                 <label for="exampleInputPassword1">Confirm Password <span style="color: red"> * </span></label>
                 <input name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required="required">
                 </div>
                                 
                  <button type="submit" class="btn btn-info" name="submit">Create User</button>
            
            </form>
              
          </div>
          
      </section>
          
      <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL USERS</strong> </header>
          
          <div class="panel-body">
                              

                            <section id="no-more-tables">
                                <table class="table table-bordered table-striped table-condensed cf" id="example">
                            <thead class="cf">
                              <tr>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email ID</th>
                                  <th>Status</th>
                                  <th> </th>
                                  <th> </th>
                              </tr>
                              </thead>
                              <tbody>
                         
                              <?php
                              
                              foreach ($result as $result_data) { ?>
                                    <tr>
                                    
                                    <td data-title="First Name"><?php echo $result_data->admin_fname; ?></td>
                                    <td data-title="Last Name"><?php echo $result_data->admin_lname; ?></td>
                                    <td data-title="Email ID"><?php echo $result_data->admin_email; ?></td>
                                    
                                    <?php
                                    if($result_data->is_active == 1) 
                                    { 
                                        echo "<td data-title='ACTIVE'>ACTIVE</td>";
                                    } else { 
                                        echo "<td data-title='INACTIVE'>INACTIVE</td>"; 
                                    }
                                    
                                    if($result_data->is_active == 1) { ?>
                                    
                                    <td data-title='Deactivate'> <a class='btn btn-danger' href="<?=base_url();?>WebAdmin/DeactivateUser/<?=$result_data->admin_id; ?>">Deactivate</a></td>
                                    
                                    <?php } else { ?>
                                    
                                    <td data-title='Activate'> <a class='btn btn-success' href="<?=base_url();?>WebAdmin/ActivateUser/<?=$result_data->admin_id; ?>">Activate</a></td>
                                    
                                    </tr>
                                    <?php } ?>
                                    
        <td><a class='btn btn-info' data-toggle="modal" href="#myModal2" onClick="Reset_User_Password('<?=$result_data->admin_id; ?>')">Reset Password</a></td>
                                    
                                    
                                    <?php } ?>
                                    
                              </tbody>
                          </table>
                            </section>   
          </div>
          
      </section>


                                            <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Reset User's Password</h4>
                                          </div>
                                          <div class="modal-body">

                                             

                                          </div>
                                          
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->


          </section>
      </section>
      <!--main content end-->
      
      
 <script>
 function Reset_User_Password(id){
     
  $.post("<?=base_url();?>WebAdmin/Reset_User_Password/", {id: id}, function(page_response)
  {
  $(".modal-body").html(page_response);
  });
  
 }
</script>