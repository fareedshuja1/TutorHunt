
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
    
    
<div class="title-lines"><h3 class="mt0">Tutors for <?php foreach($search_subj as $sss) { echo $sss->subs_title;  } ?> </h3></div>
    
    <?php //foreach($tut_search as $search) { ?>

   <!-- <div class="jobs-item with-thumb">                
    <div class="thumb"><img src="<?=base_url();?>images/tutors/<?php //echo $search->tut_profile_pic; ?>" alt=""></div>
    <div class="clearfix visible-xs"></div>
    <h6 class="title" style="color: #5bc0de"><a href="#"><strong><?php //echo $search->tut_fname." ".$search->tut_lname;; ?></strong></a></h6>
    <span class="meta"><strong><?php //echo $search->tut_availability; ?></strong></span>
    <p class="description"><?php // echo substr($search->tut_personal_stat, 0, 150); ?>..... <a href='<?=base_url();?>Tutor_Controller/Tutor_Profile/<?php //echo $search->tutor_id; ?>'>Read more</a></p>
    <hr>
    <div class="clearfix"><a href="<?=base_url();?>Tutor_Controller/Tutor_Profile/<?php //echo $search->tutor_id; ?>" class="btn btn-default" style="float:right;">VIEW PROFILE</a></div>
    </div>-->

   <?php //} ?>
   
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
                        <strong><a href="<?=base_url();?>tutor/profile/<?php echo $search->tutor_id; ?>"><?php echo $search->tut_fname." ".$search->tut_lname;; ?></a></strong>
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
    
   
   
</div>

            </div>
            
        </div>
         
     </div>