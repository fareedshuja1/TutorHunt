<!-- PAGE SIDE BAR CONTENT START -->
                        
	<div class="col-sm-4 page-sidebar">
	<aside>
						
                                            
            <div class="widget sidebar-widget white-container social-widget">
            <h5 class="widget-title"><strong>ADVERTISE WITH US</strong></h5>

                <div id="job-opening">
                            
                    <div id="job-opening-carousel" class="owl-carousel">
                        
                        <?php foreach($adds as $adds) { ?>

                               <div class="item-home">
                               <div class="job-opening">
                                   <a href="<?=base_url();?>advert/details/<?php echo $adds->ad_id; ?>">
                               <img src="<?=base_url();?>ads/<?php echo $adds->ad_pic; ?>" class="img-responsive"  />
                                   </a>
                               </div>
                               </div>
                        
                        <?php } ?>

                    </div>
		</div>
            </div>

                                               
                                            
	</aside>
	</div> 
                        
                        <!-- PAGE SIDE BAR CONTENT END -->
                                
                                
                                
   	    
            </div>
	</div> <!-- end .container -->
    </div> <!-- end #page-content -->

	