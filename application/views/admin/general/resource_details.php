<?php
foreach ($content as $content)
{
            $resource_id      = $content->resource_id;
            $resource_title   = $content->resource_title;
            $resource_link    = $content->resource_link;
            $resource_details = $content->resource_details;
}
?>

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
          
          <header class="panel-heading"> <strong> Edit Record. </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>Pages/resource_edit_query" method="post">
                
                  <div class="row">
                      
                      <div class="form-group col-sm-6">
                          <label for="exampleInputEmail1">Title <span style="color: red"> * </span></label>
                          <input type="text" class="form-control" name="resource_title" value="<?php echo $resource_title; ?>" style="color: #000">
                          <input type="hidden" name="resource_id" value="<?php echo $resource_id; ?>">
                      </div>  
                      <div class="form-group col-sm-6">
                          <label for="exampleInputEmail1">Link<span style="color: red"> * </span></label>
                          <input type="text" class="form-control" name="resource_link" value="<?php echo $resource_link; ?>" style="color: #000">
                      </div>  
                  </div>  
                  
             <div class="row">
                <div class="form-group col-sm-12">
                    <label for="exampleInputEmail1">Enter Your Content Here <span style="color: red"> * </span></label>
                    <textarea class="form-control ckeditor" name="resource_details" rows="8"><?php echo $resource_details;?></textarea>
                </div>
                                
                  
            </div>
                  <div class="row"><div class="form-group col-sm-4"><button type="submit" class="btn btn-info" name="submit">SAVE CHANGES</button></div></div>
                  
            </form>
              
          </div>
                 
          
      </section>

     

          </section>
      </section>
