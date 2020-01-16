<?php foreach($tut_details as $tut) 
    {
    $tutor_id          = $tut->tutor_id;
    $login_email       = $tut->login_email; 
    $fname             = $tut->tut_fname; 
    $lname             = $tut->tut_lname; 
    $full_name         = $fname." ".$lname;
    $image             = $tut->tut_profile_pic;
    $gender            = $tut->tut_gender;
    $distance          = $tut->tut_distance_travel;
    $town              = $tut->town_name;
    $address1          = $tut->tut_address_line1;
    $address2          = $tut->tut_address_line2;
    $home_phone        = $tut->tut_phone_home;
    $mobile_phone      = $tut->tut_phone_mobile;
    $tut_postcode      = $tut->tut_postcode;
    $tut_personal_stat = $tut->tut_personal_stat;
    $tut_availability  = $tut->tut_availability;
    $tut_skype         = $tut->tut_skype;
    $is_verified       = $tut->is_verified;
    } 
    
    foreach ($count_unread_msgs as $tot_msgs)
    {
    $tot_msgs = $tot_msgs->totunread;    
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
                
            <?php if($this->session->flashdata('msg2')) { ?>      
                <div class="alert alert-error" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg2');?> </strong>
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
                                <br>
				<table>
				<tbody>
                                <?php if($is_verified == 'NO') { ?>
                                <tr>
                                    <td>Account Status</td>
                                    <td style="color:red"><strong><?php echo "Unverified";  ?></strong></td>
				</tr>  
                                <?php } else { ?>
                                <tr>
                                    <td>Account Status</td>
                                    <td style="background-color: #a9d622;"><div align="center"><img src="<?=base_url(); ?>images/id-verify.png" alt="ID Verified."></div></td>
				</tr> 
                                <?php } ?>
				<tr>
                                    <td>First Name</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo $lname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Phone (Home)</td>
                                    <td><?php echo $home_phone;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Phone (Mobile)</td>
                                    <td><?php echo $mobile_phone;  ?></td>
				</tr>
                                
                                                                
                                                                
                                <tr>
                                    <td>Willing to travel</td>
                                    <td><?php echo $distance; ?></td>
				</tr>
                                
                                                                
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $address1; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Town</td>
                                    <td><?php echo $town; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $tut_postcode; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $login_email; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Skype</td>
                                    <td><?php echo $tut_skype; ?></td>
				</tr>


 	                        
                                </tbody>
				</table>
                                <hr>
                                <h4 class="bottom-line">You are logged in as Tutor</h4>

                                </div>
		        </div>
 		    </aside>
		</div> 
                
                

	           <div class="col-sm-8 page-content">
				
		   <div class="candidates-item candidates-single-item">
                       <?php if($is_verified == 'NO') { ?>
                       
                           <?php
                           foreach($acc_error_msg as $err_msg)
                           {
                               echo $err_msg->warning_msg_detail;
                           }
                           ?>
                       
                       <?php } ?>
                      
                   
                   <h5><strong>Personal Statement</strong></h5>
                   <hr>

                    <p><?php echo $tut_personal_stat; ?></p>
                    
                    <br>
                    
                    <h5><strong>Availability</strong></h5>
                    <hr>
                    
                    <p><?php echo $tut_availability; ?></p>
                    
                    <br>
                    
                    <a class="btn btn-info" href="<?=base_url();?>tutor-edit-profile">Profile Settings</a>

                   </div>

                       
                 <div class="candidates-item">	
                     
                   <div class="responsive-tabs">
                         
		     <ul class="nav nav-tabs"> 
                        <li class="active"><a href="#tab-h-1"><strong>My Subjects</strong></a></li>
			            <li><a href="#tab-h-2"><strong>Qualification</strong></a></li>
		            	<li><a href="#tab-h-3"><strong>Experience</strong></a></li>
                        <li><a href="#tab-h-4"><strong>References</strong></a></li>
                        <li><a href="#tab-h-5"><strong>Messages</strong>
                                <?php if($tot_msgs > 0) { ?>
                                &nbsp;<span class="badge badge-msg" style="background-color: red"><?php echo $tot_msgs; ?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li><a href="#tab-h-6">
                                <strong>Payments</strong>
                                <?php foreach($tut_payment_count as $pc) { echo "(".$pc->tot_payment.")"; } ?>
                            </a>
                        </li>
                        
                         <li><a href="#tab-h-7">
                                 <strong>Feedbacks</strong>
                                 <?php foreach($tut_feedback_count as $fcc) { echo "(".$fcc->tot_feedbacks.")"; } ?>
                             </a>
                         </li>
                         
		     </ul>

	     <div class="tab-content">
                        
                <div class="tab-pane active" id="tab-h-1" style="border-color: #ebebeb">
                    
                <h4>Add Subjects which you want to teach.</h4>
                <section id="no-more-tables">
                  <table class="table table-bordered table-striped table-condensed cf">
		    <thead class="cf">
                        <tr><th>Subject</th><th>Level</th><th>Rate / H</th> <th> </th></tr>
		    </thead>

		    <tbody>
	            
                    <?php 
                    foreach($tut_subjects as $ss) { ?>
                    <tr>
                    <td data-title="Subject"><?php echo $ss->subs_title; ?></td>    
                    <td data-title="Level"><?php echo $ss->sub_level_title; ?></td>
                    <td data-title="Rate">£<?php echo $ss->rate_per_hour; ?> &nbsp; <a href="<?=base_url();?>tutor/edit-rate/<?php echo $ss->tut_sub_id; ?>">Change</a></td>
                    <td><a href="<?=base_url();?>tutor/del-subject/<?php echo $ss->tut_sub_id; ?>" style="color: red">Delete</a></td>
                    </tr>   
                    <?php } ?> 
                            
		    </tbody>
		</table>
                </section>       
                <a class="btn btn-info" href="<?=base_url();?>tutor-subjects">Add Subjects</a>
		    </div>
		    
		    
		            <!--  QUALIFICATION TAB -->
                        
                    <div class="tab-pane" id="tab-h-2"  style="border-color: #ebebeb">
		            <?php foreach($tut_qualification as $tq) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $tq->university_name; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $tq->qual_level_title; ?>. <?php echo $tq->course; ?></strong></span>
                    <div class="description">
                        <span class="" style="float:left"><strong>Year : </strong> <?php echo $tq->graduation_year; ?></span> <br>
                        <span class=""> <strong>Marks : </strong><?php echo $tq->grades; ?> % (<?php echo $tq->grades_type; ?>) </span>
                    <span class="" style="float:right">
                                            <a href="<?=base_url();?>tutor/edit-qual/<?php echo $tq->tut_qual_id; ?>" >Edit Record</a> &nbsp;

                    <a href="<?=base_url();?>tutor/del-qual/<?php echo $tq->tut_qual_id; ?>" style="color: red">Delete Record</a>

                    </span>
                    </div>
                    
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?> 
                    
                    <a class="btn btn-info" href="<?=base_url();?>tutor-qualification">Add Qualification</a>
		           </div>
		    
		    
		    <!--  EXPERIENCE TAB -->
		    
                                                
                    <div class="tab-pane" id="tab-h-3"  style="border-color: #ebebeb">
		            <?php foreach($tut_experience as $te) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de"><a href="#"><strong><?php echo $te->job_title; ?></strong></a></h4>
                    <span class="meta"><strong> <?php echo $te->employer_name; ?></strong></span>
                    <p class="">
                        <span class="" style="float:left"><strong>Level : </strong> <?php echo $te->job_level; ?></span>
                        <span class="" style="float:right"><strong>Duration : </strong><?php echo $te->years_experience; ?> Years</span>
                    </p>
                    <br>
                    <p class="description"><?php echo $te->job_description; ?></p>
                    <br>
                    <span style="float:right"> 
                                            <a href="<?=base_url();?>tutor/edit-exp/<?php echo $te->tut_experience_id; ?>">Edit Record</a> &nbsp;

                    <a href="<?=base_url();?>tutor/del-exp/<?php echo $te->tut_experience_id; ?>" style="color: red">Delete Record</a>
                    </span>
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?>
                    <a class="btn btn-info" href="<?=base_url();?>tutor-experience">Add Experience</a>
		    </div>
                 
                 
                 <!-- Reference Tab -->
                                                                 
                    <div class="tab-pane" id="tab-h-4"  style="border-color: #ebebeb">
		    <?php foreach($tut_reference as $tr) { ?>    
                    <div class="jobs-item with-thumb">                
                    <h4 class="title" style="color: #5bc0de">
                        <a href="#"><strong><?php echo $tr->ref_fname." ".$tr->ref_lname; ?></strong></a>
                    </h4>
                    <span class="meta" style="margin-top:5px;"><strong> <?php echo $tr->ref_email; ?>  -  <?php echo $tr->ref_phone; ?> </strong></span>
                    
                    <p class=""><span class="" style="float:left"><strong>Relation : </strong> <?php echo $tr->ref_relation; ?></span></p>
                    <p class=""><span class="" style="float:left"><strong>Organisation : </strong> <?php echo $tr->ref_organization; ?></span>
                    
                    <span class="" style="float:right">
                                                <a href="<?=base_url();?>tutor/edit-ref/<?php echo $tr->tut_reference_id; ?>">Edit Record</a> &nbsp;

                        <a href="<?=base_url();?>tutor/del-ref/<?php echo $tr->tut_reference_id; ?>" style="color: red">Delete Record</a>
                        </span>
                    <div class="clearfix"></div>
                    </div>
                    <hr>
                    <?php } ?>
                    <a class="btn btn-info" href="<?=base_url();?>tutor-reference">Add Reference</a>
		    </div>
                 
                    <div class="tab-pane" id="tab-h-5"  style="border-color: #ebebeb">
                        
                        <select class="form-control tutmsgs" style="width: 200px" onchange="tutormsgs();">
                            <option value="tut_inbox">INBOX MESSAGES</option>
                            <option value="tut_sent">SEND MESSAGES</option>
                        </select>
                        
		    <section id="no-more-tables">

                        
                    <!-- Tutor's Inbox Messages Start -->
                    
                  <table class="table table-bordered table-striped table-condensed cf tutinboxmsgs">
		    <thead class="cf">
                        <tr>
                            <th>FROM</th><th>SUBJECT</th><th>DATE</th> <th>STATUS</th><th> </th>
                        </tr>
		    </thead>

		    <tbody>
	            
                    <?php 
                    foreach($inbox as $inbox) { ?>
                    <tr>
                    <td data-title="FROM"> <a href="<?=base_url();?>student/profile/<?=$inbox->student_id;?>"><?php echo $inbox->std_title.". "; echo $inbox->std_fname; ?></a></td>    
                    <td data-title="SUBJECT"><?php echo $inbox->msg_subject; ?></td>
                    <td data-title="DATE"><?php echo $inbox->newdate_time; ?></td>
                    <td>
                        <?php if($inbox->is_read == 'READ') { ?>
                        <div style="background-color: #a9d622;color: #fff">  
                            <div align='center'>SEEN</div>
                        </div>
                           <?php } else { ?>
                        <div style="background-color: #ffc0cb;color: #fff">  
                            <div align='center'>UNSEEN</div>
                        </div>
                           <?php } ?>
                        
                    </td>
                    <td>
                        <form action="<?=base_url();?>MainController/view_message_details" method="post">
                            <input type="hidden" name="student_id" value="<?php echo $inbox->student_id; ?>">
                            <input type="hidden" name="msg_id" value="<?php echo $inbox->msg_id; ?>">
                            <input type="hidden" name="tutor_id" value="<?php echo $inbox->tutor_id; ?>">
                            <input type="submit" name="" class="btn btn-info" value="VIEW">
                        </form>
                    
                    </td>
                    </tr>   
                    <?php } ?> 
                            
		    </tbody>
		    </table>
                    <!-- Tutor's Inbox Messages End -->   
                    
                    
                    <!-- Tutor's Sent Messages Start -->
                    <table class="table table-bordered table-striped table-condensed cf tutsentmsgs" style="display: none;">
		    <thead class="cf">
                        <tr>
                            <th>SEND TO</th><th>SUBJECT</th><th>DATE</th> <th>STATUS</th><th> </th>
                        </tr>
		    </thead>

		    <tbody>
	            
                    <?php 
                    foreach($send_msgs as $send_msgs) { ?>
                    <tr>
                    <td data-title="TO"> <a href="<?=base_url();?>student/profile/<?=$send_msgs->student_id;?>"><?php echo $send_msgs->std_fname." ".$send_msgs->std_lname; ?></a></td>    
                    <td data-title="SUBJECT"><?php echo $send_msgs->msg_subject; ?></td>
                    <td data-title="DATE"><?php echo $send_msgs->newdate_time; ?></td>
                    <td>
                        <?php if($send_msgs->is_read == 'READ') { ?>
                        <div style="background-color: #a9d622;color: #fff">  
                            <div align='center'>SEEN</div>
                        </div>
                           <?php } else { ?>
                        <div style="background-color: #ffc0cb;color: #fff">  
                            <div align='center'>UNSEEN</div>
                        </div>
                           <?php } ?>
                        
                    </td>
                    <td>
                        <form action="<?=base_url();?>Tutor_Controller/view_sent_message_details" method="post">
                            <input type="hidden" name="student_id" value="<?php echo $send_msgs->student_id; ?>">
                            <input type="hidden" name="msg_id" value="<?php echo $send_msgs->msg_id; ?>">
                            <input type="hidden" name="tutor_id" value="<?php echo $send_msgs->tutor_id; ?>">
                            <input type="submit" name="" class="btn btn-info" value="VIEW">
                        </form>
                    
                    </td>
                    </tr>   
                    <?php } ?> 
                            
		    </tbody>
		    </table>
                    <!-- Tutor's Sent Messages End --> 
                        
                    </section>
		    </div>
                 
                    <div class="tab-pane" id="tab-h-6"  style="border-color: #ebebeb">
		       <section id="flip-scroll">
                      <table class="table table-bordered table-striped table-condensed cf">
		   <thead class="cf">
                               <tr><th>TXN ID </th><th>Student</th><th>Amount</th> <th> Date </th></tr>
		           </thead>

		    <tbody>
                    <?php
                     foreach ($tut_payment as $tut_payment) { ?>
                        <tr>
                     <td><?php echo $tut_payment->transaction_id; ?></td>
                     <td><a href="<?=base_url();?>student/profile/<?php echo $tut_payment->student_id; ?>"><?php echo $tut_payment->std_fname." ".$tut_payment->std_lname; ?></a></td>
                     <td>£<?php echo $tut_payment->amount_paid; ?></td>
                     <td><?php echo $tut_payment->newdate_time; ?></td>
                        </tr>
                     <?php } ?>
		    </tbody>
		    </table>
                       </section>
		    </div>
                 
                 <div class="tab-pane" id="tab-h-7"  style="border-color: #ebebeb">
                   <?php foreach($tut_feedback as $tf) { ?>    
                    <div class="jobs-item with-thumb">      
                        <div class="thumb">
       <a href="<?=base_url();?>student/profile/<?=$tf->student_id;?>"><img src="<?=base_url();?>images/students/<?php echo $tf->std_profile_pic ?>" alt=""></a>
                    </div>
                    <h4 class="title" style="color: #5bc0de"><strong><?php echo $tf->std_fname." ".$tf->std_lname; ?></strong></h4>
                    <span class="meta"><strong> <?php echo $tf->newdate_time; ?></strong></span>  &nbsp; &nbsp; -  &nbsp;  
                    <span class="meta">
                        <?php for($i=0;$i<$tf->tutor_rating;$i++) { ?>
                        <img src="<?=base_url();?>images/rating.png" />
                        <?php } ?> (<?php echo $tf->tutor_rating; ?>/5)
                    </span>
                    <p class="description"><?php echo $tf->feedback_description; ?></p>
                    
                    <?php if($tut_feedback_response->get_tut_feedback_response($tf->tut_feedback_id) !== '') { ?>
                    <br>
                    <div class="feedback_response">
                        <h5><strong> Your Response</strong></h5>
                        <p><?php echo $tut_feedback_response->get_tut_feedback_response($tf->tut_feedback_id); ?></p>
                    </div>
                    <?php } else { ?>
                    <br>
                    <form action="<?=base_url();?>Tutor_Controller/reply_to_feedback_form" method="post">
                        <input type="hidden" name="student_id" value="<?=$tf->student_id;?>">
                        <input type="hidden" name="tutor_id" value="<?=$tutor_id;?>">
                        <input type="hidden" name="feedback_id" value="<?=$tf->tut_feedback_id;?>">
                        <input type="submit" class="btn btn-info" value="REPLY">
                    </form>
                    <?php } ?>
                    
                    </div>
                    <?php } ?>
		    
		 </div>

							
		    </div>
	         </div>    
                </div>


		   </div> 
                
                
                
           </div>
        </div>
     </div>