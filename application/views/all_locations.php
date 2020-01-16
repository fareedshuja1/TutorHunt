
		<div class="header-page-title">
			<div class="container">
				<h1>Browse Tutors by Location</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">

                <!-- PAGE MIDDLE CONTENT START -->  
                        
		       <div class="col-sm-8 page-content">

                         <div class="candidates-item">	
                
               
                 
                <div class="tab-pane active" id="tab-h-1" style="border-color: #ebebeb">
                  <div class="row">
                      
                      
                    <div class="subs_subjjj">
                        <div class="col-sm-6">
			<ul class="filter-list">
                         <?php
                         $i = 0;
                         foreach($town_list as $i=>$ss)
                         {
                         if($i> 0 && $i % 5 == 0) { 
                         echo '</ul></div><div class="col-sm-6"><ul class="filter-list">';
                         } ?>
                         <li><a href='<?=base_url();?>search-by-location/<?=$ss->town_id;?>'><?=$ss->town_name;?></a></li>
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
                
                 
 
	