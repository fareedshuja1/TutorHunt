 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
             
       <?php if( ! ini_get('date.timezone') ) { date_default_timezone_set('GMT'); } ?>      
       <?php if($this->session->flashdata('msg')) { ?>      
              
               <div class="alert alert-success fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
               </div>
              
     <?php }?>
         
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADVERTISEMENTS </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/advertisements_add_query" method="post" enctype="multipart/form-data">
                 
                <div class="row">
                    
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Ad Title <span style="color: red"> * </span></label>
                    <input name="ad_title" type="text" class="form-control" id="exampleInputEmail1" required="required">
                </div>
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Publish Date</label>
                    <input name="ad_publish_date" class="form-control" type="text" value="<?php echo date('d-m-Y');?>" readonly="readonly" />
                </div>  
                    
                 <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">End Date (yyyy-mm-dd) <span style="color: red"> * </span></label>
                    <input type="text" name="ad_expire_date" data-mask="9999-99-99" class="form-control">
                    <span>Date Format should be like 'yyyy-mm-dd' or '2012-02-26' </span>
                </div>   
                    
                </div>
                  
                  
                   <div class="row">
                    
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Ad Image (JPG, JPEG & PNG FORMATS ONLY)<span style="color: red"> * </span></label>
                    <input name="ad_pic" class="form-control" type="file" id="" required="required">
                </div>
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Ad Link <span style="color: red"> * </span></label>
                    <input name="ad_link" class="form-control" type="text" placeholder="http://www.coursesandtutors.co.uk" id="exampleInputEmail1">
                </div>  
                  </div>    
                       
                       
                    <div class="row">   
                 <div class="form-group col-sm-12">
                    <label for="exampleInputEmail1">Ad Description </label>
                    <textarea class="form-control ckeditor" name="ad_description"></textarea>
                </div>   
                    
                    </div>
                       
                  <div class="row"><div class="form-group col-sm-12">
                  <button type="submit" class="btn btn-info" name="submit">ADD</button>
                  </div> </div>
            
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL ADVERTISEMENTS</strong> </header>
          
          <div class="panel-body">
              
      <section id="no-more-tables">
     <table class="table table-bordered table-striped table-condensed cf" id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>Image</th>
                                          <th>Title </th>
                                          <th>Published Date</th>
                                          <th>End Date </th>
                                          <th> </th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach($result as $result) { ?>
                                      
                                          <tr>
                                              <td> 
                                                  <a class="fancybox"  href="<?=base_url();?>ads/<?php echo $result->ad_pic; ?>"> 
                                                  <img src="<?=base_url();?>ads/<?php echo $result->ad_pic; ?>" alt="Ad Image" width="60" height="60" /> 
                                                  </a>
                                              </td>
                                              <td><?php echo $result->ad_title; ?> </td>
                                              <td><?php echo $result->new_ad_publish_date; ?> </td>
                                              <td><?php echo $result->new_ad_expire_date; ?> </td>
                                              <td> 
                                                  <a href="<?=base_url();?>WebAdmin/advertise_details/<?php echo $result->ad_id; ?>" class="btn btn-info">DETAILS</a> 
                                                 
                                          </tr>
                                          
                                      <?php } ?>
                                      </tbody>
                                    </table>
              
      </section>
               
          </div>
          
      </section>
              

          </section>
      </section>
 