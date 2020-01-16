<?php 
    foreach($std_details as $std) 
    {
    $student_id = $std->student_id;
    $fname = $std->std_fname; 
    $lname = $std->std_lname; 
    $full_name = $fname." ".$lname;
    $image = $std->std_profile_pic;
    $gender = $std->student_gender;
    $distance = $std->std_distance_travel;
    $town = $std->town_name;
    $std_personal_stat =  $std->std_personal_stat;
    $std_availability = $std->std_availability;
    $std_postcode = $std->std_postcode;

    } 

 ?>

        <div class="header-page-title">
	    <div class="container">
		<h1><?php echo $full_name; ?></h1>
     	    </div>
	</div>

     <div id="page-content">
	<div class="container">
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
                
                

	           <div class="col-sm-8 page-content">
				
                       <div class="candidates-item candidates-single-item" id="stdprofile">
        <?php
                        
        if($this->session->userdata('tutor_id') != NULL) 
        { 
            foreach($is_tutor_verified as $is_verified)
            {
             $is_verified = $is_verified->is_verified;
            }
                        
                if($is_verified == 'NO')
                {
     echo "<h4 style='color:red'><strong>NOTE:</strong></h4><span style='color:red'> You have an unverified account. You can not sent message to a student and the student cannot purchase your contact details until we verify your account.</span><hr>";                                
                } ?>      
                    
        <?php } ?>    
                       
                   <h5><strong>Personal Statement</strong></h5>

                   <p style="text-align: justify"><?php echo $std_personal_stat; ?></p>
                    
                   <hr>
                    <h5><strong>Availability</strong></h5>
                    
                    <p><?php echo $std_availability; ?></p>
                    <hr>
                    <h5><strong>Subjects</strong></h5>
                    
                    <p><?php echo $fname;  ?> is looking for tutors for the following subjects: </p>
                    
                      <section id="no-more-tables">
                  <table class="table table-bordered table-striped table-condensed cf">
		    <thead class="cf">
                        <tr><th>Subject</th><th>Level</th></tr>
		    </thead>

		    <tbody>
			<?php 
                          foreach ($std_subjects as $ss) { ?>
                            <tr>
                            <td data-title="Subject"><?php echo $ss->subs_title; ?></td>    
                            <td data-title="Level"><?php echo $ss->sub_level_title; ?></td>
                            </tr>   
                         <?php } ?>  
		    </tbody>
		</table>
                 </section>
                    
                    
                    <hr>
                    
                    <?php if($this->session->userdata('tutor_id') !== NULL) { ?>
                    
                                        <?php                     
                                        foreach($is_tutor_verified as $is_verified)
                                        {
                                        $is_verified = $is_verified->is_verified;
                                        }

                                        if($is_verified == 'YES') { ?>
                                        <button class="btn btn-default" onclick="$('#stdprofile').hide();$('#sendmsgstd').show();">Sent Message</button>
                                       <?php } ?>
                        
                    <?php } else { ?>
                    <hr>
                    <p style="color:red"><strong>IN ORDER TO SENT MESSAGE TO A STUDENT, YOU MUST FIRST LOGIN AS A TUTOR.</strong></p>
                    <p><a class="btn btn-default" href="<?=base_url();?>MainController/LoginForm">Click Here to Login</a></p>
                    <?php } ?>

                    
                   </div>
                       
                       
                       
                       <div class="candidates-item candidates-single-item" id="sendmsgstd" style="display: none;">
                           <?php foreach($error_msgs as $msg) { echo $msg->msgs_error_msg; } ?>

                       
                         <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>MainController/msg_from_tutor_to_student">
                         <table class="table-bordered">
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Subject:</label> <span class="required_star">  *</span><br>
                         <input id="email" class="form-control txtOnly msgbox" style="width:80%" name="msg_subject">
                         <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
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
                         <a class="btn btn-gray" onclick="$('#sendmsgstd').hide();$('#stdprofile').show();">Cancel</a>
                         </div>
                         </div>
                         </td></tr>
                         </table>
                         </form>
                           
                       </div>
                       
          


		   </div> 
                
                
                
           </div>
        </div>
     </div>