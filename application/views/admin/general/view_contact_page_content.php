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
          
          <header class="panel-heading"> <strong> The content will be shown on Contact US page. </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>Pages/view_contact_page_content_query" method="post">
                 
                <div class="form-group">
                    
                    <label for="exampleInputEmail1">Enter Your Content Here <span style="color: red"> * </span></label>
                    <textarea class="form-control ckeditor" name="contact_page_content" rows="8">
                       <?php
                       foreach($content as $content)
                       {
                           echo $content->page_content;
                       }

                       ?>
                    </textarea>
                  
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">Submit</button>
            
            </form>
              
          </div>
          
      </section>

              
              

          </section>
      </section>
