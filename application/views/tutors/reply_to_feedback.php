<?php foreach($tut_details as $tut) 
    {
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
    
    foreach($display_feedback as $display_feedback)
    {
        $student_id = $display_feedback->student_id;
        $std_fname = $display_feedback->std_fname ;
        $std_lname = $display_feedback->std_lname ;
        $std_profile_pic = $display_feedback->std_profile_pic;
        
        $feedback_description = $display_feedback->feedback_description;
        $feedback_date_time = $display_feedback->feedback_date_time;
        $tutor_rating = $display_feedback->tutor_rating;
        $tut_feedback_id = $display_feedback->tut_feedback_id ;
        
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
                    
            <!--<h5 style="color: #5bc0de"><strong>NOTE: </strong></h5>
            <p style="color: #5bc0de"><strong>ONCE SUBMITTED, YOU CANNOT DELETE OR MODIFY YOUR RESPONSE LATER.</strong> </p>
            <hr>-->
            
            
                    <div class="jobs-item with-thumb">   
                    <div class="thumb">
                    <a href="<?=base_url();?>student/profile/<?=$student_id;?>"><img src="<?=base_url();?>images/students/<?php echo $std_profile_pic ?>" alt=""></a>
                    </div>
                    <div class="clearfix visible-xs"></div>
                    <h4 class="title" style="color: #5bc0de"><strong><?php echo $std_fname." ".$std_lname; ?></strong></h4>
                    <span class="meta"><strong> <?php echo $feedback_date_time; ?></strong></span>  &nbsp; &nbsp; -  &nbsp;  
                    <span class="meta">
                    <?php for($i=0;$i<$tutor_rating;$i++) { ?>
                    <img src="<?=base_url();?>images/rating.png" />
                    <?php } ?> (<?php echo $tutor_rating; ?>/5)
                    </span>
                    <p class="description"><?php echo $feedback_description; ?></p>
                    </div>
                       
                       <form action="<?=base_url();?>Tutor_Controller/reply_to_feedback_query" method="post" class="form-inline" >
                           <div class="row">
                            <div class="col-sm-12">
                             
                                <input type="hidden" name="tut_feedback_id" value="<?=$tut_feedback_id?>">

                            <label for="email" style="color: #5bc0de">TYPE YOUR RESPONSE HERE</label> <br>
                            <textarea rows="6"  name="response_description"></textarea>
                           </div>
                       
            
                   </div>
                           <div class="row">
                                <div class="col-sm-8 singup-form2">
                               <input class="btn btn-success" type="submit" value="SUBMIT">
                               <a class="btn btn-gray"  href="<?=base_url();?>tutor-panel" >Cancel</a>
                                </div>

                           </div>
                     </form>  
                
                
                
           </div>
        </div>
     </div>