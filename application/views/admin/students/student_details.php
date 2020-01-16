

     <section id="main-content">
         <section class="wrapper">


              
                     <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Student Account Re-Activated Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                              <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Student account deactivated. </strong>
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
                      
                      <section class="panel">
                          
                          
                          <div class="user-heading round">
                              <a class="fancybox"  href="<?=base_url();?>images/students/<?php echo $row->std_profile_pic; ?>"> 
                              <img src="<?=base_url();?>images/students/<?php echo $row->std_profile_pic; ?>" width="200" height="200" alt="">
                              </a>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#"> <i class="fa fa-user"></i> <?php echo $row->std_fname; echo " "; echo $row->std_lname; ?></a></li>
                              <li><a href="#"> <i class="fa fa-envelope"></i> <?php echo $row->login_email; ?></a></li>
                              <li><a href="#"> <i class="fa fa-phone"></i> <?php echo $row->std_phone_mobile; ?></a></li>
                              </ul>
                          </section>
                      
                              <!--<a href="#" class='btn btn-success' > SENT MESSAGE</a>-->
                              <?php if($row->login_account_status == 'ACTIVE') { ?>
                              <a data-toggle="modal" href="#myModal2" class='btn btn-danger' > BLOCK ACCOUNT</a>
                              <?php } else { ?>
                              <a data-toggle="modal" href="#myModal3" class='btn btn-warning' > ACTIVATE ACCOUNT</a>
                              <?php } ?>
                            
                  </aside>
               
                             <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Deactivate Student's Account</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to deactivate student's account?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/DeactivateStudent/<?=$row->student_id; ?>" >YES</a>
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
                                   <h4 class="modal-title">Activate Student's Account</h4>
                                 </div>
                                 <div class="modal-body">
                                     
                                     Are you sure to re-activate student's account?
                                  
                                    <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <a class="btn btn-info" href="<?=base_url();?>WebAdmin/Activate_Student_Account/<?=$row->student_id; ?>" >YES</a>
                                    </div>
                                             

                                 </div>
                                 </div>
                                </div>
                               </div>
                              <!-- Modal -->
               
               
                  
                    <aside class="profile-info col-lg-9">
                          
                          <!--tab nav start-->
                      <section class="panel">
                         <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#tabb1"><i class="fa fa-home"></i> </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb4"><i class="fa fa-book"></i> &nbsp; SUBJECTS </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb2"><i class="fa fa-envelope"></i> &nbsp; INBOX MESSAGES </a>
                                  </li>
                                  
                                   <li class=""><a data-toggle="tab" href="#tabb3"><i class="fa fa-pencil-square-o"></i> &nbsp; SEND MESSAGES </a>
                                  </li>
                                  
                                  <li class=""><a data-toggle="tab" href="#tabb5"><i class="fa fa-money"></i> &nbsp; PURCHASES / PAYMENT </a>
                                  </li>
                                  
                              </ul>
                              
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <!-- Home Tab: Contact Information -->
                    <div id="tabb1" class="tab-pane active"> 
                                      
                                      
                                  <div class="panel-body bio-graph-info">
                                  
                                  <div class="row">
                                  <div class="bio-row">
                                  <p> <span><strong>First Name</strong></span>:    <?php echo   $row->std_fname; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Last Name</strong> </span>:     <?php echo   $row->std_lname; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Country</strong> </span>:    <?php echo   $row->country_name; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>DOB </strong> </span>:   <?php echo $row->std_dob; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Address Line 1 </strong></span>:   <?php echo $row->std_address_line1; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Address Line 2</strong> </span>:   <?php echo $row->std_address_line2; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Town</strong> </span>:   <?php echo $row->town_name; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Post Code </strong></span>:   <?php echo $row->std_postcode; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Phone - Home</strong> </span>:   <?php echo $row->std_phone_home; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span><strong>Phone - Mobile</strong> </span>:   <?php echo $row->std_phone_mobile; ?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><strong>Distance Willing to Travel </strong> :   <?php echo $row->std_distance_travel; ?></p>
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
                                  <p style="text-align: justify"> <?php echo $row->std_personal_stat; ?></p>
                                  </div>
                                      
                                      
                                      
                              </div>
                          </div>
                    </div>
                                  
                                  
                                  
                                  <!-- Tab 2: Subjects Tab -->
                                  <div id="tabb2" class="tab-pane">
                                      <h4>INBOX</h4>
                                      <hr>
                                 
                                        <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                            <tr><th>MESSAGE FROM</th><th>SUBJECT</th><th>DATE</th><th>MESSAGE</th></tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach($inbox as $inbox) { ?>
                                            <tr>
 <td data-title="FROM"><a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $inbox->tutor_id; ?>'><?php echo $inbox->tut_fname." ".$inbox->tut_lname; ?></a></td>
                                           <td data-title="SUBJECT"><?php echo $inbox->msg_subject; ?></td>
                                           <td data-title="DATE"><?php echo $inbox->newdate_time; ?></td>
<td data-title="MESSAGE"><?php echo substr($inbox->msg_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_message_details/<?php echo $inbox->msg_id; ?>'>READ MORE</a></strong></td>

                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                     </table>
                                        </section>
                                  </div>
                                  
                                  
                                  <!-- Tab 2: Subjects Tab -->
                                  <div id="tabb3" class="tab-pane">
                                      <h4>SEND MESSAGES</h4>
                                      <hr>
                                  
                                      <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                            <tr><th>MESSAGE TO</th><th>SUBJECT</th><th>DATE</th><th>MESSAGE</th></tr>
                                        </thead>

                                        <tbody>
<?php foreach($send_msgs as $send_msgs) { ?>
                                            <tr>
 <td data-title="TO"><a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $send_msgs->tutor_id; ?>'><?php echo $send_msgs->tut_fname." ".$send_msgs->tut_lname; ?></a></td>
                                           <td data-title="SUBJECT"><?php echo $send_msgs->msg_subject; ?></td>
                                           <td data-title="DATE"><?php echo $send_msgs->newdate_time; ?></td>
<td data-title="MESSAGE"><?php echo substr($send_msgs->msg_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_message_details/<?php echo $send_msgs->msg_id; ?>'>READ MORE</a></strong></td>

                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                     </table>
                                      </section>
                                  </div>
                                  
                                  
                                  <!-- Tab 2: Subjects Tab -->
                                  <div id="tabb4" class="tab-pane">
                                      <h4>THIS STUDENT WANTS TO STUDY THE FOLLOWING SUBJECTS</h4>
                                      <hr>
                                  
                                        <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                            <tr><th>SUBJECT</th><th>LEVEL</th><th>WILLING TO PAY</th><th>NOTE</th></tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach($std_subjects as $ss) { ?>
                                        <tr>
                                        <td data-title="SUBJECT"><?php echo $ss->subs_title; ?></td>    
                                        <td data-title="LEVEL"><?php echo $ss->sub_level_title; ?></td>
                                        <td data-title="WILLING TO PAY">£<?php echo $ss->std_rate_per_hour; ?> / Hour</td>
                                        <td data-title="NOTE"><?php echo $ss->std_sub_notes; ?></td>
                                        </tr>   
                                        <?php }  ?> 
                                        </tbody>
                                     </table>
                                        </section>      
                                  </div>
                                  
                                  
                                  
                                  
                                <div id="tabb5" class="tab-pane">
                                 <h4> This student has purchased contact details of following tutors.</h4>
                                      <hr>
                                    <section id="no-more-tables">
                                        <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                            <tr><th>TRANSACTION ID</th><th>STUDENT</th><th>AMOUNT</th><th>DATE</th></tr>
                                        </thead>

                                         <tbody>
                                          <?php
                     foreach ($std_payment as $std_payment) { ?>
                        <tr> 
                     <td data-title="TRANSACTION ID"><?php echo $std_payment->transaction_id; ?></td>
                     <td data-title="STUDENT"><a href="<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $std_payment->tutor_id; ?>"><?php echo $std_payment->tut_fname." ".$std_payment->tut_lname; ?></a></td>
                     <td data-title="AMOUNT">£<?php echo $std_payment->amount_paid; ?></td>
                     <td data-title="DATE"><?php echo $std_payment->newdate_time; ?></td>
                        </tr>
                     <?php } ?>

                                        </tbody>
                                     </table>
                                    </section>         
                                  </div> 
                                  
                                  
                                
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->
                      
                      
                                 
                                  
                                
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->
 

                          
                  </aside>              
               
                              
                              
                              
                              
              </div>

            <?php } ?>

             
             
             
             
      </section>
   </section>

