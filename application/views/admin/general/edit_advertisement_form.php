    <?php foreach($record as $result) 
    { 
    $ad_pic =  $result->ad_pic;
    $ad_title = $result->ad_title;
    $ad_publish_date = $result->ad_publish_date;
    $ad_expire_date = $result->ad_expire_date;
    $ad_description = $result->ad_description;
    $ad_link = $result->ad_link;
    $ad_id =  $result->ad_id;
    
    }
?>

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
          
          <header class="panel-heading"> <strong>EDIT ADVERTISEMENTS </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/edit_ad_query" method="post" enctype="multipart/form-data">
                 
                <div class="row">
                    
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Ad Title <span style="color: red"> * </span></label>
                    <input name="ad_title" type="text" value="<?php echo $ad_title; ?>" class="form-control" id="exampleInputEmail1" style="color:#000" required="required">
                    <input type="hidden" name="ad_id" value="<?php echo $ad_id; ?>">
                </div>
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">End Date (yyyy-mm-dd) <span style="color: red"> * </span></label>
                    <input type="text" name="ad_expire_date" value="<?php echo  $ad_expire_date; ?>" data-mask="9999-99-99" style="color:#000" class="form-control">
                    <span>Date Format should be like 'yyyy-mm-dd' or '2012-02-26' </span>
                </div>   
                    
                <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Ad Link <span style="color: red"> * </span></label>
                    <input name="ad_link" class="form-control" type="text" value="<?php echo  $ad_link; ?>" style="color:#000" id="exampleInputEmail1">
                </div>  
                    
                </div>                       
                       
                 <div class="row">   
                     
                 <div class="form-group col-sm-12">
                    <label for="exampleInputEmail1">Ad Description </label>
                    <textarea class="form-control ckeditor" name="ad_description"><?php echo  $ad_description; ?></textarea>
                 </div>   
                    
                </div>
                       
                  <div class="row"><div class="form-group col-sm-12">
                  <button type="submit" class="btn btn-info" name="submit">SAVE CHANGES</button>
                  </div> </div>
            
            </form>
              
          </div>
          
      </section>
              

              
            

          </section>
      </section>
 