
     	<div class="header-page-title">
			<div class="container">
				<h1>Resources</h1>
			</div>
		</div>  
		
     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		        <div class="col-sm-12 page-contents">
			            
                            <br><br>
                            
                                    <!-- PANEL 1 STARTS -->
                                    
                                     
                                    <div class="latest-jobs-section white-container">
                                        
                                    <?php foreach($content as $search) { ?>
                                        <div class="jobs-item with-thumb" style="border: 1px solid #EEE">                
    <h3 class="title" style="color: #5bc0de"><a href="<?=base_url();?>Pages/view_resource_details/<?=$search->resource_id;?>"><strong><?php echo $search->resource_title; ?></strong></a></h3>
    <br>
    <p class="description">
        <?php echo substr($search->resource_details, 0, 300); ?>..... <a href='<?=base_url();?>Pages/view_resource_details/<?=$search->resource_id;?>'>Read more</a>
    </p>
    <hr>
    <div class="clearfix"></div>
    </div>
   <?php } ?>
				    </div> 
                                    <!-- PANEL 1 ENDS -->
                                    
                                    
   
                                  
		        </div> 
                        
                        <!-- PAGE MIDDLE CONTENT END -->
                        
            </div>
        </div>
     </div>