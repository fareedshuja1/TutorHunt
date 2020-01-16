
		<div class="header-page-title">
			<div class="container">
				<h1>Browse Tutors by Subjects</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		       <div class="col-sm-8 page-content">
       
                     <div class="white-container candidates-search">
						<div class="row">
                                                    
                                                    <div class="col-sm-3">
                                                        <label for="email" style="color: #5bc0de"><h5><strong>Select Category:</strong></h5></label>
                                                    </div>

                                                    
							<div class="col-sm-9">
								<select class="form-control mains_iddd" onchange="search_subject2();">
                                                                <?php
                                                                foreach($main_subjs as $ms)
                                                                {
                                                                    echo "<option value='$ms->mains_id'>$ms->mains_title</option>";
                                                                }
                                                                ?>
								</select>
							</div>

							
						</div>
					</div>
                         <div class="candidates-item">	
                
                 <!--  SUBJECT TAB --> 
                 
                <div class="tab-pane active" id="tab-h-1" style="border-color: #ebebeb">
                  <div class="row">
                      
                      
                    <div class="subs_subjjj">
                        <div class="col-sm-6">
			<ul class="filter-list">
                         <?php
                         $i = 0;
                         foreach($sub_subjs as $i=>$ss)
                         {
                         if($i> 0 && $i % 5 == 0) { 
                         echo '</ul></div><div class="col-sm-6"><ul class="filter-list">';
                         } ?>
                         <li><a href='<?=base_url();?>search-by-subject/<?=$ss->subs_id;?>'><?=$ss->subs_title;?></a></li>
                         <?php
                         }
                         ?>
			</ul>
                        </div> 
                    </div>
                        
                      
                  
                </div>
                </div>
                        
                 
                  
							
		    </div>
                  
   	 	</div> 
                        
                        <!-- PAGE MIDDLE CONTENT END -->
                
                 
 
	