<?php
foreach($result as $result_data) { 
$message = $result_data->warning_msg_detail;
} ?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
                <?php if($this->session->flashdata('msg')) { ?>      
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong> This message will be shown to tutors who are not yet verified. </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/Unverified_Account_Error_Msg_Query" method="post">
                 
                <div class="form-group">
                    
                    <label for="exampleInputEmail1">Type your message here <span style="color: red"> * </span></label>
                    <textarea class="form-control ckeditor" name="editor1" rows="6"><?php echo $message; ?></textarea>
                  
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">Submit</button>
            
            </form>
              
          </div>
          
      </section>

              
               <section class="panel">
          
          <header class="panel-heading"> <strong> Recent Message. </strong></header>
          
          <div class="panel-body">
              
          <div class="adv-table">
            
              <table  class="display table table-bordered table-striped" id="example">
                <thead>
                    <tr><th>MESSAGE</th></tr>
                </thead>
                
                <tbody>
                <tr><td><?php echo $message; ?></td> </tr>
                </tbody>
                
              </table>
              
          </div>
             
              
          </div>
          
      </section>

          </section>
      </section>
