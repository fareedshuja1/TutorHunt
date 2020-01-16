
		<div class="header-page-title">
			<div class="container">
				<h1>AVAILABLE TUTORS (<?php foreach($tut_search_count as $ssc) { echo $ssc->tot_tut; } ?>)</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row" >
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-12 page-content" >   
    
    
<div class="title-lines"><h3 class="mt0">All Tutors in <?php foreach($search_town as $sss) { echo $sss->town_name;  } ?> </h3></div>
    
      <?php foreach($tut_search as $search) { ?>

           
<table class="partners-item col-sm-6" border="1">
    <tbody>
        <tr>
            <td rowspan="2" valign="top" style="width:40%">
                <div class="img"><img src="<?=base_url();?>images/tutors/<?php echo $search->tut_profile_pic; ?>"></div>
            </td>
            <td width="" valign="top">
                <h4 class="title" style="color: #5bc0de">
                    <a href="#">
                        <strong><a href="<?=base_url();?>tutor/profile/<?php echo $search->tutor_id; ?>"><?php echo $search->tut_fname." ".$search->tut_lname; ?></a></strong>
                    </a>
                </h4>
                <strong>
                    <h5>
                        <img src="<?=base_url();?>images/location.gif" style="padding-right: 8px;">
                            <?php echo $search->tut_postcode; ?>
                    </h5>
                </strong>
                <hr>
                <a href="<?=base_url();?>tutor/profile/<?php echo $search->tutor_id; ?>" class="btn btn-default">VIEW PROFILE</a> 
            </td>
        </tr>
        
        
    </tbody>
</table>
            

   <?php } ?>
   
    <?php //foreach($tut_search as $search) { ?>

                   <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="partners-item">
                                <div class="img">
                              <a href="<?=base_url();?>tutor/profile/<?php //echo $search->tutor_id; ?>"> 
                                  <img src="<?=base_url();?>images/tutors/<?php //echo $search->tut_profile_pic; ?>" alt="">
                              </a>

                                <div class="overlay">
                                <h6><?php //echo $search->tut_fname." ".$search->tut_lname;; ?></h6>
                                <p><?php //echo substr($search->tut_personal_stat, 0, 90); ?>..... <a href='<?=base_url();?>tutor/profile/<?php //echo $search->tutor_id; ?>'>Read more</a></p>
                                </div>
                                </div>

                        <div class="meta clearfix">
                            <span><a href="<?=base_url();?>tutor/profile/<?php //echo $search->tutor_id; ?>"><?php //echo $search->tut_fname." ".$search->tut_lname;; ?></a></span>
                            <a href="<?=base_url();?>tutor/profile/<?php //echo $search->tutor_id; ?>" class="btn btn-default fa fa-user"></a>
                        </div>
                        </div>
                    </div> -->

    <?php //} ?>
    


</div>

            </div>
            
        </div>
         
     </div>