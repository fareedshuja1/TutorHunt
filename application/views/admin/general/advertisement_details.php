<?php foreach($record as $result) 
    { 
    $ad_pic =  $result->ad_pic;
    $ad_title = $result->ad_title;
    $ad_publish_date = $result->ad_publish_date;
    $ad_expire_date= $result->new_ad_expire_date;
    $ad_description = $result->ad_description;
    $ad_link = $result->ad_link;
    $ad_id =  $result->ad_id;
    
    }
?>


     <section id="main-content">
         <section class="wrapper">
              
                     <?php if($this->session->flashdata('msg')) { ?>      
              
                                <div class="alert alert-info fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
              
              
   
             
           <div class="row">
                  <aside class="profile-nav col-lg-3">
                      
                      <section class="panel">
                          
                          
                          <div class="user-heading round">
                              <a class="fancybox"  href="<?=base_url();?>ads/<?php echo $ad_pic; ?>"> 
                              <img src="<?=base_url();?>ads/<?php echo $ad_pic; ?>" width="200" height="200" alt="">
                              </a>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#"> <strong>TITLE : </strong><?php echo $ad_title; ?></a></li>
                              <li><a href="#"> <strong>LINK : </strong> <?php echo $ad_link; ?></a></li>
                              </ul>
                          </section>
                      
                          <a data-toggle="modal" href="#myModal2" class='btn btn-danger' > DELETE AD</a>
                          <a data-toggle="modal" href="<?=base_url();?>WebAdmin/edit_ad_form/<?=$ad_id; ?>" class='btn btn-info' > EDIT AD</a>

                            
                  </aside>
               
               
                             <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Delete Advertisement</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to delete the ad?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/delete_ad/<?=$ad_id; ?>" >YES</a>
                                    </div>
                                             

                                 </div>
                                 </div>
                                </div>
                               </div>
                              <!-- Modal -->

               
               
                  
                    <aside class="profile-info col-lg-9">
                        
                        <section class="panel">
                         <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#tabb1"><i class="fa fa-home"></i> </a>
                                  </li>                                 
                              </ul>
                              
                          </header>
                            
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <div id="tabb1" class="tab-pane active"> 
                                      <p><strong> Published Date : </strong> <?php echo $ad_publish_date; ?></p>
                                   
                                      <p><strong> End / Expiry Date : </strong> <?php echo $ad_expire_date; ?></p>
                                      
                                   <hr>
                                      
                                  <?php echo $ad_description; ?>
                                  
                                  </div>
                                  
                              </div>
                          </div>
                            
                        </section>
                        
        
                    </aside>              
                              
              </div>
                          
      </section>
   </section>

