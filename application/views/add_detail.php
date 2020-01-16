
<?php foreach($result as $result) {
    
    $ad_pic =  $result->ad_pic;
    $ad_title = $result->ad_title;
    $ad_publish_date = $result->ad_publish_date;
    $ad_description = $result->ad_description;
    $ad_link = $result->ad_link;
    
}
?>



     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		  <div class="col-sm-4 page-sidebar">
		    <aside>
			<div class="widget sidebar-widget white-container candidates-single-widget">
			    <div class="widget-content">
                                
                                <div class="thumb">
                                    <a href="<?=base_url();?>ads/<?php echo $ad_pic; ?>" target="_blank"> 
                                    <img src="<?=base_url();?>ads/<?php echo $ad_pic; ?>" alt="">
                                     </a>
                                </div>

                                </div>
		        </div>
 		    </aside>
		</div> 
                
                
                	           <div class="col-sm-8 page-content">
				
                                       <div class="candidates-item candidates-single-item">
                                           
                                           
                                        <h5><strong><?php echo $ad_title; ?></strong></h5>   
                                        <hr>
                                        
                                        <?php echo $ad_description; ?>
                                        
                                        <hr>
                                        
                                        <?php if($ad_link !== '') { ?>
                                        <strong>VISIT WEBSITE : </strong> <a href="<?php echo $ad_link; ?>" target="_blank"><?php echo $ad_link; ?></a>
                                        <?php } else { ?>
                                        <strong>NO LINK AVAILABLE</strong>
                                        <?php } ?>
                                       </div>
                                       
                                   </div>
                
                        
                        <!-- PAGE MIDDLE CONTENT END -->
                        
            </div>
            
        </div>
         
     </div>
