
   	<div class="header-page-title">
			<div class="container">
				<h1>FAQ'S</h1>
			</div>
		</div>  
     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		        <div class="col-sm-8 page-contents">
			            
                            <br><br>
                            
                                    <!-- PANEL 1 STARTS -->
                                    
                                     
                                    <div class="latest-jobs-section white-container">
                                        
                                     <?php
                                      foreach($content as $content)
                                       {
                                          echo $content->page_content;
                                       }

                                       ?>
				    </div> 
                                    <!-- PANEL 1 ENDS -->
                                    
                                    
   
                                  
		        </div> 
                        
                        <!-- PAGE MIDDLE CONTENT END -->