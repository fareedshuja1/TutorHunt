
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
        <?php if($this->session->flashdata('msg')) { ?>      
              
            <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
            </div>
        <?php } ?>
              
              
        <?php if($this->session->flashdata('msg2')) { ?>      
              
            <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg2');?> </strong>
            </div>
        <?php } ?>
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD NEW BLOG </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/add_blog_query" method="post" enctype="multipart/form-data">
                 
                  <div class="row">
                      
                 <div class="form-group col-sm-4">
                    <label>TITLE <span style="color: red"> * </span></label>
                    <input type="text" name="blog_title" class="form-control" required="required"  placeholder="The title should not be more than 30 characters">
                </div>
                      
                       <div class="form-group col-sm-4">
                    <label>LINK TO BLOG <span style="color: red"> * </span></label>
                    <input type="text" name="blog_link" class="form-control" required="required" placeholder="Copy & Paste the link here">
                </div>
                      
                       <div class="form-group col-sm-4">
                    <label>IMAGE <span style="color: red"> * </span></label>
                    <input type="file" name="blog_image" class="form-control" required="required">
                </div>
                
                  </div>
                    <div class="row">  
                        <div class="form-group col-sm-4">
                  <button type="submit" class="btn btn-info" name="submit">ADD BLOG</button>
                        </div>
                   </div>
            
            </form>
              
          </div>
          
      </section>
              
                 <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL BLOGS</strong> </header>
          
          <div class="panel-body">
              
      <section id="no-more-tables">
     <table class="table table-bordered table-striped table-condensed cf" id="example">
                                      <thead class="cf">
                                      <tr>
                                            <th> Blog ID </th>
                                          <th>Image</th>
                                          <th>Title </th>
                                          <th>Link </th>
                                        
                                          <th> </th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach($result as $result) { ?>
                                      
                                          <tr>
                                               <td><?php echo $result->blog_id; ?> </td>
                                              <td> 
                                                  <a class="fancybox"  href="<?=base_url();?>blogs/<?php echo $result->blog_image; ?>"> 
                                                  <img src="<?=base_url();?>blogs/<?php echo $result->blog_image; ?>" alt="Ad Image" width="60" height="60" /> 
                                                  </a>
                                              </td>
                                              <td><?php echo $result->blog_title; ?> </td>
                                              <td><?php echo "<a href='$result->blog_link' target='_blank'>$result->blog_link</a>"; ?> </td>
                                           
                                              <td> <a href="<?=base_url();?>WebAdmin/delete_blog/<?=$result->blog_id;?>" class="btn btn-danger">DELETE</a> </td>
                                              
                                                 
                                          </tr>
                                          
                                      <?php } ?>
                                      </tbody>
                                    </table>
              
      </section>
               
          </div>
          
      </section>

              

          </section>
      </section>
 