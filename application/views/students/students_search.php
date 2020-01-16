
		<div class="header-page-title">
			<div class="container">
				<h1>AVAILABLE STUDENTS (<?php foreach($std_search_count as $ssc) { echo $ssc->tot_std; } ?>)</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row" >
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-12 page-content" >   
    
    
<div class="title-lines"><h3 class="mt0">Students for <?php foreach($search_subj as $sss) { echo $sss->subs_title;  } ?> </h3></div>
    
<?php foreach($std_search as $search) { ?>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="partners-item">
                                <div class="img">
                              <a href="<?=base_url();?>student/profile/<?php echo $search->student_id; ?>"> 
                                  <img src="<?=base_url();?>images/students/<?php echo $search->std_profile_pic; ?>" alt="">
                              </a>

                                <div class="overlay">
                                <h6><?php echo $search->std_fname." ".$search->std_lname;; ?></h6>
                                <p><?php echo substr($search->std_personal_stat, 0, 90); ?>..... <a href='<?=base_url();?>student/profile/<?php echo $search->student_id; ?>'>Read more</a></p>
                                </div>
                                </div>

                        <div class="meta clearfix">
                            <span><a href="<?=base_url();?>student/profile/<?php echo $search->student_id; ?>"><?php echo $search->std_fname." ".$search->std_lname;; ?></a></span>
                            <a href="<?=base_url();?>student/profile/<?php echo $search->student_id; ?>" class="btn btn-default fa fa-user"></a>
                        </div>
                        </div>
                    </div>

    <?php } ?>



</div>


            </div>
        </div>
     </div>