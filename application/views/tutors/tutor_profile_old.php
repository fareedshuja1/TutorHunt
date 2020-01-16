<?php 
    foreach($tut_details as $tut) 
    {
    $tutor_id          = $tut->tutor_id;
    $title             = $tut->tut_title; 
    $fname             = $tut->tut_fname; 
    $lname             = $tut->tut_lname; 
    $full_name         = $fname." ".$lname;
    $image             = $tut->tut_profile_pic;
    $gender            = $tut->tut_gender;
    $distance          = $tut->tut_distance_travel;
    $town              = $tut->town_name;
    $tut_postcode      = $tut->tut_postcode;
    $tut_personal_stat = $tut->tut_personal_stat;
    $tut_availability  = $tut->tut_availability;
    $is_verified       = $tut->is_verified;
    } 
 ?>

        <div class="header-page-title">
	    <div class="container">
		<h1><?php echo $full_name; ?></h1>
     	    </div>
	</div>

<div id="page-content">
    <div class="container" style="width:80%">
            <div class="row">
                
                <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
                <?php } ?>
                
            
		<div class="col-sm-4 page-sidebar">
		    <aside>
			<div class="widget sidebar-widget white-container candidates-single-widget">
			    <div class="widget-content">
                                <div class="thumb">
                                    <?php if($image == "") { ?>
                                    <img src="<?=base_url(); ?>images/tutors/no_pic.jpg" alt="">
                                    <?php } else { ?>
                                    <img src="<?=base_url(); ?>images/tutors/<?php echo $image; ?>" alt="">
                                    <?php } ?>
                                </div>
                                
				<table>
				<tbody>
                                <br>
                                    <tr>
                                    <td>Account Status</td>
                                    <td style="background-color: #a9d622;"><div align="center"><img src="<?=base_url(); ?>images/id-verify.png" alt="ID Verified."></div></td>
				</tr> 
				<tr>
                                    <td>First Name</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo $lname;  ?></td>
				</tr>
                                                                
                                <tr>
                                    <td>Willing to travel</td>
                                    <td><?php echo $distance; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Town</td>
                                    <td><?php echo $town; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $tut_postcode; ?></td>
				</tr>
                                   
                                </tbody>
				</table>
                               
                                </div>
                         
		        </div>
 		    </aside>
		</div> 
                
                

	           <div class="col-sm-8 page-content">
				
		   <div class="candidates-item candidates-single-item">
                            
                  

                   
                   </div>

                       
                 <div class="candidates-item">	
                     
                   <div class="responsive-tabs">
                         
		     <ul class="nav nav-tabs"> 
                        <li class="active"><a href="#tab-h-1"><strong>Statement</strong></a></li>
			<li><a href="#tab-h-2"><strong>Qualification</strong></a></li>
			<li><a href="#tab-h-3"><strong>Experience</strong></a></li>
                        <li><a href="#tab-h-4"><strong>References</strong></a></li>
                        <li><a href="#tab-h-6"><strong>Feedbacks</strong></a></li>
                        <li><a href="#tab-h-7"><strong>Sent Message</strong></a></li>
		     </ul>

	     <div class="tab-content">
                        
                    <div class="tab-pane active" id="tab-h-1" style="border-color: #ebebeb">
                  

                    <p><?php echo $tut_personal_stat; ?></p>
                    
                    <br>
                    
                    <h5><strong>Availability</strong></h5>
                    <hr>
                    
                    <p><?php echo $tut_availability; ?></p>
                     
		    </div>
                        
                    <div class="tab-pane" id="tab-h-2"  style="border-color: #ebebeb">
                    <?php foreach($tut_qualification as $tq) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $tq->university_name; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $tq->qual_level_title; ?>. <?php echo $tq->course; ?></strong></span>
                    <div class="description"><span class="" style="float:left"><strong>Year : </strong> <?php echo $tq->graduation_year; ?></span>
                                             <span class="" style="float:right"><strong>Marks : </strong><?php echo $tq->grades; ?> % (<?php echo $tq->grades_type; ?>)</span>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?> 
                        
		    </div>
                                                
                    <div class="tab-pane" id="tab-h-3"  style="border-color: #ebebeb">
                    <?php foreach($tut_experience as $te) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $te->job_title; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $te->employer_name; ?></strong></span>
                    <p class=""><span class="" style="float:left"><strong>Level : </strong> <?php echo $te->job_level; ?></span>
                                             <span class="" style="float:right"><strong>Duration : </strong><?php echo $te->years_experience; ?> Years</span>
                    </p>
                    <br>
                    <p class="description"><?php echo $te->job_description; ?></p>
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?>
		    </div>
                 
                                                                 
                    <div class="tab-pane" id="tab-h-4"  style="border-color: #ebebeb">
                    <?php foreach($tut_reference as $tr) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $tr->ref_title.". ".$tr->ref_fname." ".$tr->ref_lname; ?></strong></a></h4>
                    <br>
                    <p class=""><span class="" style="float:left"><strong>Relation : </strong> <?php echo $tr->ref_relation; ?></span></p>
                    <p class=""><span class="" style="float:left"><strong>Organisation : </strong> <?php echo $tr->ref_organization; ?></span></p>
                    <br>
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?>
		    </div>
                 
                    <div class="tab-pane" id="tab-h-5"  style="border-color: #ebebeb">
		    
		    </div>
                 
                    <div class="tab-pane" id="tab-h-6"  style="border-color: #ebebeb">
		    
		    </div>
                 
                 
                    <div class="tab-pane" id="tab-h-7"  style="border-color: #ebebeb">
                        <p style="color:red">
                            <strong> It is important to note that exchanging any form of contact details or arranging meeting points here is not permitted. We automatically and manually monitor all messages. </strong>
                        </p>
                        <p style="color:red">
                            Please do not enter email addresses/urls/website/home addresses (or any other information that can allow contact) in this message. Users who do so will immediately be removed from site. 
                            Messages containing offensive content will be blocked and the user account banned.
                        </p>
                        
                    <?php if($this->session->userdata('student_id') !== NULL) { ?>
		         <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>MainController/Main_Sent_Message">
                         <table class="table-bordered">
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Subject:</label> <span class="required_star">  *</span><br>
                         <input id="email" class="form-control txtOnly" style="width:80%" name="msg_subject">
                         <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
                         </div>
                         </div>
                         
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Message:</label> <span class="required_star">  *</span><br>
                         <textarea class="form-control txtOnly" style="width:80%; height: 200px;" name="msg_description"></textarea>
                         </div>
                         </div>
                         </td></tr>
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">
                         <button type="submit" class="btn btn-info" name="">Sent Message</button>
                         </div>
                         </div>
                         </td></tr>
                         </table>
                         </form>
                    <?php } else { ?>
                    <p><strong>IN ORDER TO SENT MESSAGE TO A TUTOR, YOU MUST FIRST LOGIN AS A STUDENT.</strong></p>
                    <p><a class="btn btn-default" href="<?=base_url();?>MainController/LoginForm">Click Here to Login</a></p>
                    <?php } ?>
                    
		    </div>

							
		    </div>
	         </div>    
                </div>


		   </div> 
                
                
                
           </div>
        </div>
     </div>