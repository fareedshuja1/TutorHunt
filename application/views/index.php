
     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		        <div class="col-sm-8 page-contents">
			            
                            <br><br>
                            
                                    <!-- PANEL 1 STARTS -->
                                    <!--<div class="title-lines"> 
                                        
                                        <h3 class="mt0">OUR MISSION</h3> 
                                    </div>-->
                                     
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
