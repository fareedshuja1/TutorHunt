<?php foreach($content as $search) { 
    
    $resource_title = $search->resource_title;
    $resource_link = $search->resource_link;
    $resource_details = $search->resource_details;

   } ?>

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
                                     
                                        <h3><strong><?php echo "<a href='$resource_link' target='_blank'>$resource_title</a>" ?></strong></h3>
                                        <br>
                                        <?php echo $resource_details; ?>
                                    
                                    </div> 
                                    <!-- PANEL 1 ENDS -->
                                    
                                    
   
                                  
		        </div> 
                        
                        <!-- PAGE MIDDLE CONTENT END -->
                        
            </div>
        </div>
     </div>