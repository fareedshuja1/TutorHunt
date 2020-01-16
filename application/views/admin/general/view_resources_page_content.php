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
          
          <header class="panel-heading"> <strong> The content will be shown on Resources page. </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>Pages/view_resources_page_content_query" method="post">
                
                  <div class="row">
                      
                      <div class="form-group col-sm-6">
                          <label for="exampleInputEmail1">Title <span style="color: red"> * </span></label>
                          <input type="text" class="form-control" name="resource_title" placeholder="">
                      </div>  
                      <div class="form-group col-sm-6">
                          <label for="exampleInputEmail1">Link<span style="color: red"> * </span></label>
                          <input type="text" class="form-control" name="resource_link" placeholder="Copy and Paste the link to the original resource.">
                      </div>  
                  </div>  
                  
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="exampleInputEmail1">Enter Your Content Here <span style="color: red"> * </span></label>
                    <textarea class="form-control ckeditor" name="resource_details" rows="8"></textarea>
                </div>
                                
                  
            </div>
                  <div class="row"><div class="form-group col-sm-4"><button type="submit" class="btn btn-info" name="submit">ADD RESOURCE</button></div></div>
                  
            </form>
              
          </div>
                 
          
      </section>

       <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL  RESOURCES</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>TITLE </th>
                                          <th>LINK </th>
                                          <th>EDIT </th>
                                          <th>DELETE </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          foreach ($content as $result_data) { ?>
                                          
                                          <tr>
                                          <td><?=$result_data->resource_id;?></td>
                                          <td><?=$result_data->resource_title;?></td>
                                          <td><?=$result_data->resource_link;?></td>
                                          <td><a class='btn btn-info' href="<?=base_url();?>Pages/resource_details/<?=$result_data->resource_id;?>">EDIT</a></td>
                                          <td><a class='btn btn-danger' href='<?=base_url();?>Pages/delete_resource/<?=$result_data->resource_id;?>'>DELETE</a></td>
                                          </tr>
                                          
                                          <?php } ?>
                                            
                              </tbody>
                          </table>
              
          </div>
               
          </div>
          
      </section> 
              

          </section>
      </section>
