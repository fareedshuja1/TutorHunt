<?php foreach($tut_details as $tut) 
    {
    $title             = $tut->tut_title;
    $tutor_id          = $tut->tutor_id;
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
    
    // Contact Details
    
    $tut_email = $tut->login_email;
    $tut_skype = $tut->tut_skype;
    $tut_phone_home =  $tut->tut_phone_home;
    $tut_phone_mobile = $tut->tut_phone_mobile;
    $tut_address_line1 = $tut->tut_address_line1;
    $tut_address_line2 = $tut->tut_address_line2;
    
    } 
    
    
    // Warning msg shown while making purchase
    
    foreach($payment_warning_msg as $payment_warning_msg)
    {
        $paypal_msg = $payment_warning_msg->warning_msg_detail;
    }
    
    foreach($purchase_amount as $purchase_amount) { $amount = $purchase_amount->purchase_amount;}
    
    foreach($count_tut_subjects as $count) { $subj_count = $count->subj_count;}
    
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
                
		<div class="col-sm-3 page-sidebar">
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
                                <?php if($is_verified == 'NO') { ?>
                                <tr>
                                    <td>Status</td>
                                    <td style="color:red"><strong><?php echo "Unverified";  ?></strong></td>
				</tr>  
                                <?php } else { ?>
                                <tr>
                                    <td>Status</td>
                                    <td style="background-color: #a9d622;"><div align="center"><img src="<?=base_url(); ?>images/id-verify.png" alt="ID Verified."></div></td>
				</tr> 
                                <?php } ?>
				<tr>
                                    <td>Forename</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Surname</td>
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
                                
                               
                                   
                                </tbody>
				</table>
                               
                                </div>
                         
		        </div>
 		    </aside>
		</div> 
                
                
    <div class="col-sm-9 page-content">
				
        <div class="candidates-item candidates-single-item">
                     
                    
               <section id="no-more-tables">
                  <table class="table table-bordered table-striped table-condensed cf">
		    <thead class="cf">
                   	<tr>
                   	    <th>&nbsp;</th>
                   	    <?php foreach($subj_levels as $levell): ?>
			    <th  data-title="Level"> <?php echo $levell->sub_level_title; ?> </th>
			    <?php endforeach; ?>
                   	</tr>    
                    </thead>
                    
                    <?php if($subj_count > 0) { ?>
                    
                    <tbody> 
                   	    
                        <?php foreach($tut_subjects as $gt): ?>     
                        <tr>
                            <th style="background-color: #fff"> <?php echo $gt->subs_title;?> </th>              
                               
                        <?php foreach($subj_levels as $a_gt) { ?>
                            
                            <?php if($call_get_rates_function->get_rates($tutor_id,$gt->subs_id, $a_gt->sub_level_id) == '') { ?>
                            <td  data-title="<?php echo $a_gt->sub_level_title; ?>">-</td>
                            <?php } else { ?>
                            <td  data-title="<?php echo $a_gt->sub_level_title; ?>"> £<?php echo $call_get_rates_function->get_rates($tutor_id,$gt->subs_id, $a_gt->sub_level_id); ?>   </td>
                            
                        <?php } } ?>
                   	</tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                    <?php } else { ?>
                    <tr>
                        <th style="background-color: #fff" colspan="4"> <?php echo $fname; ?> has not added any subjects yet. </th> 
                    </tr>
                    <?php } ?>
                    
                    
                </table>
               </section>   
            <br>
            
          
                    <p><?php echo $tut_personal_stat; ?></p>
                    <br>                    
                    <h5><strong>Availability</strong></h5>
                    <hr>
                    <p><?php echo $tut_availability; ?></p>
                    
                   
        </div>

                       
                <div class="candidates-item">	
                    
                  <div class="responsive-tabs horizontal">
                         
		     <ul class="nav nav-tabs"> 
			<li class="active"><a href="#tab-v-2"><strong>Qualification</strong></a></li>
			<li><a href="#tab-v-3"><strong>Experience</strong></a></li>
                        <!--<li><a href="#tab-v-4"><strong>References</strong></a></li>-->
                        
                        <li><a href="#tab-v-6">
                                <strong>Feedbacks
                                <?php
                                foreach($tut_feedback_count as $fcc) { echo "(".$fcc->tot_feedbacks.")"; }
                                ?>
                                </strong>
                            </a>
                        </li>
                        
                        <li><a href="#tab-v-7"><strong>Sent Message</strong></a></li>
                        <?php if($this->session->userdata('student_id') !== NULL) { ?>
                        <li><a href="#tab-v-8"><strong>Contact Details</strong></a></li>
                        <?php } ?>

		     </ul>

	        <div class="tab-content">
                   
                        
                    <div class="tab-pane active" id="tab-v-2" style="text-align: justify;border-color: #ebebeb">
                        
                    <?php foreach($tut_qualification as $tq) { ?>    
                    <div class="">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $tq->university_name; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $tq->qual_level_title; ?>. <?php echo $tq->course; ?></strong></span>
                    <div class="description">
                        <span class=""><strong>Year : </strong> <?php echo $tq->graduation_year; ?></span> <br>
                        <span class=""><strong>Marks : </strong><?php echo $tq->grades; ?> (<?php echo $tq->grades_type; ?>)</span>
                    </div>
                    </div>
                    <hr>
                    <?php } ?> 
                        
		    </div>
                                                
                    <div class="tab-pane" id="tab-v-3" style="text-align: justify;border-color: #ebebeb">
                    <?php foreach($tut_experience as $te) { ?>    
                    <div class="">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $te->job_title; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $te->employer_name; ?></strong></span>
                    <p class="">
                     <span class="" style="float:left"><strong>Level : </strong> <?php echo $te->job_level; ?></span>
                     <span class="" style="float:right"><strong>Duration : </strong><?php echo $te->years_experience; ?> Years</span>
                    </p>
                    <br>
                    <p class="description"><?php echo $te->job_description; ?></p>
                    </div>
                    <hr>
                    <?php } ?>
		    </div>
                 
                                                                 
                    <div class="tab-pane" id="tab-v-4" style="text-align: justify;border-color: #ebebeb">
                    <?php foreach($tut_reference as $tr) { ?>    
                    <div class="">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $tr->ref_title.". ".$tr->ref_fname." ".$tr->ref_lname; ?></strong></a></h4>
                    <br>
                    <p class=""><span class="" style="float:left"><strong>Relation : </strong> <?php echo $tr->ref_relation; ?></span></p>
                    <p class=""><span class="" style="float:left"><strong>Organisation : </strong> <?php echo $tr->ref_organization; ?></span></p>
                    <br>
                    </div>
                    <hr>
                    <?php } ?>
		    </div>
                 
                 
                    <div class="tab-pane" id="tab-v-6" style="text-align: justify;border-color: #ebebeb">
                   
                    <?php if($this->session->userdata('student_id') !== NULL) { ?> 
                    
                    <?php if($std_payment_check->std_payment_check($this->session->userdata('student_id'),$tutor_id) > 0) { ?>    
                        
                    <?php if($std_feedback_check->std_feedback_check($this->session->userdata('student_id'),$tutor_id) == 0) { ?>
                        
                    <a href="<?=base_url();?>Tutor_Controller/give_feedback_to_tutor_form/<?=$tutor_id;?>" class="btn btn-success">GIVE FEEDBACK</a><hr>
                    
                    <?php } ?>
                    
                    <?php } ?>
                    
                    <?php } ?>
                    
                        
                    <?php foreach($tut_feedback as $tf) { ?>    
                    <div class="">                
                    <h4 class="title" style="color: #5bc0de"><strong><?php echo $tf->std_fname." ".$tf->std_lname; ?></strong></h4>
                    <span class="meta"><strong> <?php echo $tf->newdate_time; ?></strong></span>  &nbsp; &nbsp; -  &nbsp;  
                    <span class="meta">
                        <?php for($i=0;$i<$tf->tutor_rating;$i++) { ?>
                        <img src="<?=base_url();?>images/rating.png" />
                        <?php } ?> (<?php echo $tf->tutor_rating; ?>/5)
                    </span>
                    <p class="description"><?php echo $tf->feedback_description; ?></p>
                    
                    <?php if($tut_feedback_response->get_tut_feedback_response($tf->tut_feedback_id) !== '') { ?>
                    <div class="feedback_response">
                        <h5><strong>Tutor's Response</strong></h5>
                        <p><?php echo $tut_feedback_response->get_tut_feedback_response($tf->tut_feedback_id); ?></p>
                    </div>
                    <?php } ?>
                    
                    </div>
                    <hr>
                    <?php } ?>
                    
		    </div>
                 
                   <div class="tab-pane" id="tab-v-7" style="text-align: justify;border-color: #ebebeb">
    
                    <?php foreach($error_msgs as $msg) { echo $msg->msgs_error_msg; } ?>
                        
                    <?php if($this->session->userdata('student_id') !== NULL) { ?>
    
		         <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>MainController/msg_from_std_tutor">
                         <table class="table-bordered">
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Subject:</label> <span class="required_star">  *</span><br>
                         <input id="email" class="form-control txtOnly msgbox" style="width:80%" name="msg_subject">
                         <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
                         </div>
                         </div>
                         
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Message:</label> <span class="required_star">  *</span><br>
                         <textarea class="form-control txtOnly msgbox" style="width:80%; height: 200px;" name="msg_description"></textarea>
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
 
                    
              <div class="tab-pane" id="tab-v-8" style="border-color: #ebebeb">
                  
                     <?php if($this->session->userdata('student_id') !== NULL) {    
                           
                         foreach ($std_check as $std_check) { $check = $std_check->tot; $newdate_time = $std_check->newdate_time; $amount_paid = $std_check->amount_paid ; } 
                      ?>
                        
                     <?php if($check == 0) { ?>
                  
                  <p><?php echo $paypal_msg; ?></p>

                    <table class="responsive">
                        <thead>
                        <tr>
                        <th>ITEM</th>
                        <th>PRICE</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Contact Details for <?php echo $fname; ?></td>
                                <td>£<?php echo $amount; ?></td>
                            </tr>
                        </tbody>
                        </table>

        <a href="<?=base_url();?>Paypal/purchase_contact_details/<?php echo $tutor_id; ?>" class="btn" style="background-color: #a9d622; border-color: #a9d622;"><strong>PURCHASE NOW</strong></a> <br>
        <img src="<?=base_url()?>images/paypal-payments.gif" />     



                            <?php } else {  ?>
        
        <h5 style="color: #5bc0de"><strong>You have purchased <?php echo $fname; ?>'s contact details on <u><?php echo $newdate_time; ?></u> for £<?php echo $amount_paid; ?>.</strong></h5>
        <br>
       
         
        <span><strong>Email ID : </strong></span> <span><?php echo $tut_email; ?></span> <hr>
        <span><strong>Skype : </strong></span> <span><?php echo $tut_skype; ?></span> <hr>
        <span><strong>Phone (Home/Office) : </strong></span> <span><?php echo $tut_phone_home; ?></span> <hr>
        <span><strong>Phone (Mobile)  : </strong></span> <span><?php echo $tut_phone_mobile; ?></span> <hr>
        <span><strong>Address Line 1 : </strong></span> <span><?php echo $tut_address_line1; ?></span> <hr>
        <span><strong>Address Line 2 : </strong></span> <span><?php echo $tut_address_line2; ?></span> <hr>
        
        
                     <?php } } ?>
            
		
		    </div>

							
		    </div>
	       
                                                   
               </div>
                            
                </div>


            </div> 
        </div>
    </div>
</div>