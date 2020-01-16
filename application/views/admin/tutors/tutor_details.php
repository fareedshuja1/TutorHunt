

     <section id="main-content">
         <section class="wrapper">


              
        <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Tutor's Account Re-Activated Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                              <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Tutor's Account Deactivated. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-info fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
        <?php } ?>
              
              
             <?php foreach($record as $row) { ?>
             
           <div class="row">
               
                  <aside class="profile-nav col-lg-3">
                      <br>
                      <section class="panel">
                          
                          
                          <div class="user-heading round">
                             
                              <?php if($row->tut_profile_pic != "") { ?>
                              <a class="fancybox"  href="<?=base_url();?>images/tutors/<?php echo $row->tut_profile_pic; ?>"> 
                                  <img src="<?=base_url();?>images/tutors/<?php echo $row->tut_profile_pic; ?>" alt=""> 
                              </a>
                              <?php } else { ?>
                              <a class="fancybox"  href="<?=base_url(); ?>images/tutors/no_pic.jpg"> 
                                  <img src="<?=base_url(); ?>images/tutors/no_pic.jpg" alt=""> 
                              </a>
                              <?php } ?>
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#"> <i class="fa fa-user"></i> <?php echo $row->tut_fname; echo " "; echo $row->tut_lname; ?></a></li>
                              <li><a href="#"> <i class="fa fa-envelope"></i> <?php echo $row->login_email; ?></a></li>
                              <li><a href="#"> <i class="fa fa-phone"></i> <?php echo $row->tut_phone_mobile; ?></a></li>
                              
                              
                              <!--<a href="#" class='btn btn-success' > SENT MESSAGE</a>-->
                              <?php if($row->login_account_status == 'ACTIVE') { ?>
                              <li><a data-toggle="modal" href="#myModal2" class='btn btn-danger' style="color:#fff" > BLOCK TUTOR</a></li>
                              <?php } else { ?>
                              <li><a data-toggle="modal" href="#myModal3" class='btn btn-warning' style="color:#fff" > ACTIVATE ACCOUNT</a></li>
                              <?php } ?>
                              
                              
                               <!-- Verify Tutor Account -->
                               <?php if($row->is_verified == 'NO') { ?>
                               <li> <a data-toggle="modal" href="#myModal4" class='btn btn-success' style="color:#fff" > VERIFY THIS TUTOR</a></li>
                              <?php } else { ?>
                              
                               <li> <a href="#" class='btn' style="color:#000">THIS ACCOUNT IS VERIFIED</a></li>
                              <?php } ?>
                              
                              
                          </ul>
                          </section>
                      
                              
                              
                              
                             
                              
                  </aside>
               <br>
               
                             <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Deactivate Tutor's Account</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to deactivate tutor's account?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/Deactivate_Tutor_Account/<?=$row->tutor_id; ?>" >YES</a>
                                    </div>
                                             

                                 </div>
                                 </div>
                                </div>
                               </div>
                              <!-- Modal -->
                              
                                             
                             <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Activate Tutor's Account</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to re-activate tutor's account?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/Activate_Tutor_Account/<?=$row->tutor_id; ?>" >YES</a>
                                    </div>
                                             

                                 </div>
                                 </div>
                                </div>
                               </div>
                              <!-- Modal -->
                              
                              <!-- Modal -->
                              <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Verify This Tutor</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to verify this tutor?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/Verify_Tutor_Account/<?=$row->tutor_id; ?>" >YES</a>
                                    </div>
                                             

                                 </div>
                                 </div>
                                </div>
                               </div>
                              <!-- Modal -->
                              
                              
                              
                               <aside class="profile-info col-lg-9">
                          
                      <section class="panel">
                         <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs">
                                  
                                  <li class="active"><a data-toggle="tab" href="#tabb8"><i class="fa fa-envelope"></i> &nbsp; INBOX MESSAGES </a>
                                  </li>
                                  
                                   <li class=""><a data-toggle="tab" href="#tabb9"><i class="fa fa-pencil-square-o"></i> &nbsp; SEND MESSAGES </a>
                                  </li>
                                  
                                    <li class=""><a data-toggle="tab" href="#tabb10"><i class="fa fa-money"></i> &nbsp; PURCHASES / PAYMENT </a>
                                  </li>
                                  
                              </ul>
                              
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  
                                   <!-- Tab 2: Subjects Tab -->
                    <div id="tabb8" class="tab-pane active"> 
                                    <h4>INBOX MESSAGES</h4>
                                      <hr>
                               
                                        <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                            <tr><th>MESSAGE FROM</th><th>SUBJECT</th><th>DATE</th><th>MESSAGE</th></tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach($inbox as $inbox) { ?>
                                            <tr>
<td data-title="MESSAGE FROM"><a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $inbox->student_id; ?>'><?php echo $inbox->std_fname." ".$inbox->std_lname; ?></a></td>
                                           <td data-title="SUBJECT"><?php echo $inbox->msg_subject; ?></td>
                                           <td data-title="DATE"><?php echo $inbox->newdate_time; ?></td>
<td data-title="MESSAGE"><?php echo substr($inbox->msg_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_message_details/<?php echo $inbox->msg_id; ?>'>READ MORE</a></strong></td>

                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                     </table>
                                        </section>
                                      
                                            
                                  </div>   
                                  
                                <div id="tabb9" class="tab-pane">
                                      <h4>SEND MESSAGES</h4>
                                      <hr>
                                    <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                            <tr><th>MESSAGE TO</th><th>SUBJECT</th><th>DATE</th><th>MESSAGE</th></tr>
                                        </thead>

                                        <tbody>
<?php foreach($send_msgs as $send_msgs) { ?>
                                            <tr>
<td data-title="MESSAGE TO"><a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $send_msgs->student_id; ?>'><?php echo $send_msgs->std_fname." ".$send_msgs->std_lname; ?></a></td>
                                           <td data-title="SUBJECT"><?php echo $send_msgs->msg_subject; ?></td>
                                           <td data-title="DATE"><?php echo $send_msgs->newdate_time; ?></td>
<td data-title="MESSAGE"><?php echo substr($send_msgs->msg_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_message_details/<?php echo $send_msgs->msg_id; ?>'>READ MORE</a></strong></td>

                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                     </table>
                                    </section>         
                                  </div>
                                   
                                   
                                   
                                  <div id="tabb10" class="tab-pane">
       <h4> Total of <?php foreach($tut_payment_count as $pc) { echo $pc->tot_payment; } ?> students have purchased this tutor contact details</h4>
                                      <hr>
                                    <section id="no-more-tables">
                                        <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                            <tr><th>TRANSACTION ID</th><th>STUDENT</th><th>AMOUNT</th><th>DATE</th></tr>
                                        </thead>

                                         <tbody>
                                         <?php  foreach ($tut_payment as $tut_payment) { ?>

                                            <tr>
                     <td data-title="TRANSACTION ID"><?php echo $tut_payment->transaction_id; ?></td>
                     <td data-title="STUDENT"><a href="<?=base_url();?>WebAdmin/Student_Detail/<?php echo $tut_payment->student_id; ?>"><?php echo $tut_payment->std_fname." ".$tut_payment->std_lname; ?></a></td>
                     <td data-title="AOUNT">£<?php echo $tut_payment->amount_paid; ?></td>
                     <td data-title="DATE"><?php echo $tut_payment->newdate_time; ?></td>
                                           </tr>
                                            
                                          <?php } ?>

                                        </tbody>
                                     </table>
                                    </section>         
                                  </div> 
                                   
                                   
                                   
                                  
                              </div>  
                          </div>
                          
                      </section>
                     </aside>
                              
               
               
                      <aside class="profile-info col-lg-12">
                          
                          <!--tab nav start-->
                      <section class="panel">
                         <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#tabb1"><i class="fa fa-home"></i> </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb2"><i class="fa fa-pencil-square-o"></i> &nbsp; Subjects </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb3"><i class="fa fa-book"></i> &nbsp; Qualification </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb4"><i class="fa fa-suitcase"></i> &nbsp; Experience </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb5"><i class="fa fa-users"></i> &nbsp; References </a>
                                  </li>
                                                                    
                                  <li class=""><a data-toggle="tab" href="#tabb7"><i class="fa fa-thumbs-up"></i> &nbsp; Feedbacks 
                                      <?php
                                      foreach($tut_feedback_count as $fcc) { echo "(".$fcc->tot_feedbacks.")"; }
                                      ?>
                                      </a>
                                  </li>
                                  
                                  <!--<li class=""> <a data-toggle="tab" href="#ver_doc"><i class="fa fa-check-square"></i> &nbsp; Verification Document</a>
                                  </li>-->
                                  
                                  
                              </ul>
                              
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <!-- Home Tab: Contact Information -->
                    <div id="tabb1" class="tab-pane active"> 
                                      
                                      
                                  <div class="panel-body bio-graph-info">
                                  
                                  <div class="row">
                                  <div class="bio-row">
                                      <p> <span><strong>    First Name</strong></span>:    <?php echo   $row->tut_fname; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Last Name</strong> </span>:     <?php echo   $row->tut_lname; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Country</strong> </span>:    <?php echo   $row->country_name; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Is Verified? </strong> </span>:   <?php echo $row->is_verified; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Address Line 1 </strong></span>:   <?php echo $row->tut_address_line1; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Address Line 2</strong> </span>:   <?php echo $row->tut_address_line2; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Town</strong> </span>:   <?php echo $row->town_name; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Post Code </strong></span>:   <?php echo $row->tut_postcode; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Phone - Home</strong> </span>:   <?php echo $row->tut_phone_home; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Phone - Mobile</strong> </span>:   <?php echo $row->tut_phone_mobile; ?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><strong>Distance Willing to Travel </strong> :   <?php echo $row->tut_distance_travel; ?></p>
                                  </div>
                                  
                                  <div class="bio-row">
                                      <p><span><strong>Account Status </strong> </span>:   <?php echo $row->login_account_status; ?></p>
                                  </div>  
                                      
                                  <div class="bio-row">
                                      <p style="text-align: justify"><strong>Personal Statement </strong> : </p>
                                  </div>
                                      
                                  <div class="bio-row">
                                      <p> &nbsp; </p>
                                  </div>
                                      
                                  <div class="bio-row">
                                  <p style="text-align: justify"> <?php echo $row->tut_personal_stat; ?></p>
                                  </div>
                                      
                                      
                                      
                              </div>
                          </div>
                    </div>
                                  
                                  
                                  
                                  <!-- Tab 2: Subjects Tab -->
                                  <div id="tabb2" class="tab-pane">
                                      <h4>SUBJECTS / COURSES</h4>
                                      <hr>
                                      <section id="no-more-tables">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                            <tr><th>Subject Name</th><th>Level</th><th>Rate / H</th><th>Note</th></tr>
                                        </thead>

                                        <tbody>

                                        <?php 
                                        foreach($tut_subjects as $ss) { ?>
                                        <tr>
                                        <td data-title="Subject"><?php echo $ss->subs_title; ?></td>    
                                        <td data-title="Level"><?php echo $ss->sub_level_title; ?></td>
                                        <td data-title="Rate / H">£<?php echo $ss->rate_per_hour; ?></td>
                                        <td data-title="Note"><?php echo $ss->tut_sub_notes; ?></td>
                                        </tr>   
                                        <?php } ?> 
                                        </tbody>
                                     </table>
                                      </section>
                                  </div>
                                  
                                  
                                  <!-- Tab 3: Qualification Tab -->
                                  <div id="tabb3" class="tab-pane">
                                      <h4>Degree, Diploma, Certificates.</h4>
                                      <hr>

                                   <section id="no-more-tables">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                        <tr><th>Level</th><th>Course</th><th>Institute</th><th>Grades / Result</th><th>Grades Status</th> <th>Grad. Year</th> </tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                                    foreach($tut_qualification as $tq) { ?>
                                    <tr>
                                    <td data-title="Level"><?php echo $tq->qual_level_title; ?></td>    
                                    <td data-title="Course"><?php echo $tq->course; ?></td>
                                    <td data-title="Institute"><?php echo $tq->university_name; ?></td>
                                    <td data-title="Grades"><?php echo $tq->grades; ?></td>
                                    <td data-title="Status"><?php echo $tq->grades_type; ?></td>
                                    <td data-title="Year"><?php echo $tq->graduation_year; ?></td>
                                    </tr>   
                                    <?php } ?> 

                                    </tbody>
                                    </table>
                                   </section>
                                       
                                  </div>
                                  
                                    <!-- Tab 4: Experience Tab -->                                  
                                    <div id="tabb4" class="tab-pane">
                                    <h4>Employment History.</h4>
                                    <hr>              

                                       <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                        <tr><th>Designation</th><th>Level</th><th>Employer</th><th>Duration</th> <th>Still Doing</th></tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                                    foreach($tut_experience as $te) { ?>
                                    <tr>
                                    <td data-title="Designation"><?php echo $te->job_title; ?></td>    
                                    <td data-title="Level"><?php echo $te->job_level; ?></td>
                                    <td data-title="Employer"><?php echo $te->employer_name; ?></td>
                                    <td data-title="Duration"><?php echo $te->years_experience; ?> years</td>
                                    <td data-title="Still Doing"><?php echo $te->still_doing_job; ?></td>
                                    </tr>   
                                    <?php } ?> 

                                    </tbody>
                                    </table>
                                       </section>
                                    </div>
                                  
                                    
                                     <!-- Tab 5: References Tab -->                                  
                                    <div id="tabb5" class="tab-pane">
                                    <h4>References.</h4>
                                    <hr>              

                                   <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                        <tr><th>First Name</th><th>Last Name</th><th>Relation</th><th>Phone</th><th>Email</th> </tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                                    foreach($tut_reference as $tr) { ?>
                                    <tr>
                                    <td data-title="First Name"><?php echo $tr->ref_fname; ?></td>    
                                    <td data-title="Last Name"><?php echo $tr->ref_lname; ?></td>
                                    <td data-title="Relation"><?php echo $tr->ref_relation; ?></td>
                                    <td data-title="Phone"><?php echo $tr->ref_phone; ?></td>
                                    <td data-title="Email"><?php echo $tr->ref_email; ?></td>
                                    </tr>   
                                    <?php } ?> 
                                    </tbody>
                                    </table>
                                   </section>
                                    
                                    </div>
                                  
                                     
                                  <!-- Tab 7: Feedback Tab -->                                  
                                  <div id="tabb7" class="tab-pane">
                                  <h4>Feedbacks given by students to this tutor.</h4>
                                      <hr>

                                      <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                        <tr><th>Student</th><th>Date</th><th>Feedback</th><th>Rating</th></tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                                    foreach($tut_feedback as $tq) { ?>
                                    <tr>
                                    <td data-title="Student"><a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $tq->student_id; ?>'><?php echo $tq->std_fname." ".$tq->std_lname; ?></a></td>
                                    <td data-title="Date"><?php echo $tq->newdate_time; ?></td>
 <td data-title="Feedback"><?php echo substr($tq->feedback_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_feedback_details/<?php echo $tq->tut_feedback_id; ?>'>READ MORE</a></strong></td>

                                    <td data-title="Rating"><?php echo $tq->tutor_rating; ?> / 5</td>
                                    </tr>   
                                    <?php } ?> 

                                    </tbody>
                                    </table>
                                      </section>
                                  </div>
                                    
                                     
                                     
                                    
                                  <!-- Tab 5: Verification Document -->                                  
                                  <!--<div id="ver_doc" class="tab-pane">
                                      <h4>Tutor's Verification Document.</h4>
                                      <hr>
                                      
                                   <a class="fancybox"  href="<?=base_url();?>emp_verification_documents/<?php //echo $row->tut_ver_docs; ?>"> 
                                    <img src="<?=base_url();?>emp_verification_documents/<?php //echo $row->tut_ver_docs; ?>" style="width: 40%; height: 30%" alt=""> 
                                   </a>
                                      
                                      <hr>
                                          
                                        <?php //if($row->is_verified == 'NO') { ?>
                                       <a data-toggle="modal" href="#myModal4" class='btn btn-success' > VERIFY THIS DOCUMENT</a>
                                       <?php //} else { ?>
                              
                                       <a href="#" class='btn btn-info'> DOCUMENT IS VERIFIED.</a>
                                       <?php //} ?>
                                       
                                  </div>-->
                                  
                                  
                                  
                                  
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->
 

                          
                  </aside>    
                              
                              
                             
                              
                              
              </div>
             

          <?php } ?>

        </section>
      </section>

