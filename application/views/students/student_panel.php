<?php foreach($std_details as $std) 
    {
    $student_id    = $std->student_id; 
    $login_email   = $std->login_email; 
    $fname         = $std->std_fname; 
    $lname         = $std->std_lname; 
    $full_name     = $fname." ".$lname;
    $image         = $std->std_profile_pic;
    $gender        = $std->student_gender;
    $distance      = $std->std_distance_travel;
    $town          = $std->town_name;
    $address1      = $std->std_address_line1;
    $address2      = $std->std_address_line2;
    $home_phone    = $std->std_phone_home;
    $mobile_phone  = $std->std_phone_mobile;
    $std_postcode  = $std->std_postcode;
    $std_personal_stat =  $std->std_personal_stat;
    $std_availability  = $std->std_availability;
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
                                    <img src="<?=base_url(); ?>images/students/no_pic.jpg" alt="">
                                    <?php } else { ?>
                                    <img src="<?=base_url(); ?>images/students/<?php echo $image; ?>" alt="">
                                    <?php } ?>
                                </div>

				<table>
				<tbody>
				<tr>
                                    <td>Forename</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Surname</td>
                                    <td><?php echo $lname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Home</td>
                                    <td><?php echo $home_phone;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Mobile</td>
                                    <td><?php echo $mobile_phone;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Town</td>
                                    <td><?php echo $town; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $std_postcode; ?></td>
				</tr>

                                </tbody>
				</table>
                                <hr>
                                <h5 class="bottom-line">You are logged in as Student</h5>
                                </div>
		        </div>
 		    </aside>
		</div> 
                
                

	           <div class="col-sm-8 page-content">
				
		   <div class="candidates-item candidates-single-item">
                       
                   
                   <h5><strong>Personal Statement</strong></h5>
                   <hr>

                    <p><?php echo $std_personal_stat; ?></p>
                    
                    <br>
                    
                    <h5><strong>Availability</strong></h5>
                    <hr>
                    
                    <p><?php echo $std_availability; ?></p>
                    
                    <br>
                    
                    <a class="btn btn-info" href="<?=base_url();?>student-edit-profile">EDIT INFO</a>

                   </div>

                       
                 <div class="candidates-item">	
                     
             <div class="responsive-tabs">
                         
		     <ul class="nav nav-tabs"> 
                         <li class="active"><a href="#tab-h-1"><strong>My Subjects</strong></a></li>
			<li><a href="#tab-h-2"><strong>Messages</strong>
                                <?php if($tot_msgs > 0) { ?>
                                &nbsp;<span class="badge badge-msg" style="background-color: red"><?php echo $tot_msgs; ?></span>
                                <?php } ?>
                            </a>
                        </li>
			<li><a href="#tab-h-3"><strong>My Payments</strong></a></li>
                        <li><a href="#tab-h-4"><strong>Feedbacks</strong></a></li>
                        <li><a href="#tab-h-5"><strong>Settings</strong></a></li>
		     </ul>

	     <div class="tab-content">
                        
                 <div class="tab-pane active" id="tab-h-1" style="border-color: #ebebeb">
                 <h4>Add Subject which you want to learn.</h4>
                 <h6><strong>Note: Tutors will be able to search your profile based on the subjects you choose to study.</strong></h6>
                 <section id="no-more-tables">
                  <table class="table table-bordered table-striped table-condensed cf">
		    <thead class="cf">
                        <tr><th>Subject</th><th>Level</th> <th> </th></tr>
		    </thead>

		    <tbody>
			<?php 
                          foreach ($std_subjects as $ss) { ?>
                            <tr>
                            <td data-title="Subject"><?php echo $ss->subs_title; ?></td>    
                            <td data-title="Level"><?php echo $ss->sub_level_title; ?></td>
                            <td><a href="<?=base_url();?>student/del-subject/<?php echo $ss->std_sub_id; ?>" style="color: red">Delete</a></td>
                            </tr>   
                         <?php } ?>  
		    </tbody>
		</table>
                 </section>
                  <a class="btn btn-info" href="<?=base_url();?>student-add-subject">Add Subjects</a>                      
		    </div>
                        
                    <div class="tab-pane" id="tab-h-2"  style="border-color: #ebebeb">
                        
                         <select class="form-control stdmsgs" style="width: 200px" onchange="studentmsgs();">
                            <option value="std_inbox">INBOX MESSAGES</option>
                            <option value="std_sent">SEND MESSAGES</option>
                        </select>
                        
		     <section id="no-more-tables">
                  <table class="table table-bordered table-striped table-condensed cf stdinboxmsgs">
		    <thead class="cf">
                        <tr>
                            <th>FROM</th><th>SUBJECT</th><th>DATE</th> <th>STATUS</th><th> </th>
                        </tr>
		    </thead>

		    <tbody>
	            
                    <?php 
                    foreach($inbox as $inbox) { ?>
                    <tr>
                    <td data-title="From"> <a href="<?=base_url();?>tutor/profile/<?=$inbox->tutor_id;?>"><?php echo $inbox->tut_fname." ".$inbox->tut_lname; ?></a></td>    
                    <td data-title="Subject"><?php echo $inbox->msg_subject; ?></td>
                    <td data-title="Date"><?php echo $inbox->newdate_time; ?></td>
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
                        <form action="<?=base_url();?>view-msg-detail" method="post">
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
                         
                         <table class="table table-bordered table-striped table-condensed cf stdsentmsgs" style="display:none">
		    <thead class="cf">
                        <tr>
                            <th>SEND TO</th><th>SUBJECT</th><th>DATE</th> <th>STATUS</th><th> </th>
                        </tr>
		    </thead>

		    <tbody>
	            
                    <?php 
                    foreach($send_msgs as $send_msgs) { ?>
                    <tr>
                    <td data-title="To"> <a href="<?=base_url();?>tutor/profile/<?=$send_msgs->tutor_id;?>"><?php echo $send_msgs->tut_fname." ".$send_msgs->tut_lname; ?></a></td>    
                    <td data-title="Subject"><?php echo $send_msgs->msg_subject; ?></td>
                    <td data-title="Date"><?php echo $send_msgs->newdate_time; ?></td>
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
                        <form action="<?=base_url();?>view-msg-details" method="post">
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
                    </section>
		    </div>
                                                
                    <div class="tab-pane" id="tab-h-3"  style="border-color: #ebebeb">
                  <section id="flip-scroll">
                      <table class="table table-bordered table-striped table-condensed cf">
		   <thead class="cf">
                               <tr><th>TXN ID </th><th>Tutor</th><th>Amount</th> <th> Date </th></tr>
		           </thead>

		    <tbody>
                    <?php
                     foreach ($std_payment as $std_payment) { ?>
                        <tr> 
                     <td><?php echo $std_payment->transaction_id; ?></td>
                     <td><a href="<?=base_url();?>tutor/profile/<?php echo $std_payment->tutor_id; ?>"><?php echo $std_payment->tut_fname." ".$std_payment->tut_lname; ?></a></td>
                     <td>£<?php echo $std_payment->amount_paid; ?></td>
                     <td><?php echo $std_payment->newdate_time; ?></td>
                        </tr>
                     <?php } ?>
		    </tbody>
		    </table>
                  </section>
		    </div>
                 
                                                                 
                    <div class="tab-pane" id="tab-h-4"  style="border-color: #ebebeb">
		    <?php foreach($std_feedback as $sf) { ?>
                        <div class="jobs-item with-thumb">      
                        <div class="thumb">
       <a href="<?=base_url();?>tutor/profile/<?=$sf->tutor_id;?>"><img src="<?=base_url();?>images/tutors/<?php echo $sf->tut_profile_pic ?>" alt=""></a>
                    </div>
                    <h4 class="title" style="color: #5bc0de"><strong><?php echo $sf->tut_fname." ".$sf->tut_lname; ?></strong></h4>
                    <span class="meta"><strong> <?php echo $sf->newdate_time; ?></strong></span>  &nbsp; &nbsp; -  &nbsp;  
                    <span class="meta">
                        <?php for($i=0;$i<$sf->tutor_rating;$i++) { ?>
                        <img src="<?=base_url();?>images/rating.png" />
                        <?php } ?> (<?php echo $sf->tutor_rating; ?>/5)
                    </span>
                    <p class="description"><?php echo $sf->feedback_description; ?></p>
                    
                    <?php if($std_feedback_response->get_std_feedback_response($sf->tut_feedback_id) !== '') { ?>
                    <br>
                    <div class="feedback_response">
                        <h5><strong> Tutor's Response</strong></h5>
                        <p><?php echo $std_feedback_response->get_std_feedback_response($sf->tut_feedback_id); ?></p>
                    </div>
                    <?php } ?>
                    
                    </div> 
                    <?php } ?>
		    </div>
                 
                 <div class="tab-pane" id="tab-h-5"  style="border-color: #ebebeb">
                  <h5><strong>Change Password</strong></h5>
                       <hr> 
                       
                       <form class="form-inline changepassword" method="post" action="<?=base_url();?>Student_Controller/Student_Change_Password">
                       
                        <div class="row">
                        <div class="col-sm-6">
                        <label for="email">Enter Old Password:</label>  <span class="required_star">  *</span><br>
                        <input type="password" class="form-control" name="old_pass" style="width: 100%" required="required">
                        </div>
                            
                        <div class="col-sm-6">
                        <label for="password">Enter New Password:</label>  <span class="required_star">  *</span><br>
                        <input type="password" class="form-control" name="new_pass" required="required" style="width: 100%">
                        </div>
                        </div>
                           
                       <div class="row">
                       <div class="col-sm-6 singup-form2">
                       <button type="submit" class="btn btn-info" name="">Change</button>    
                       </div>
                       </div>
                           
                       </form>
                          
                     
                 </div>

							
		    </div>
	         </div>    
                </div>


	      </div> 
           </div>
        </div>
     </div>