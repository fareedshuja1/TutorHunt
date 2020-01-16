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
    
    foreach($result as $result)
    {
        $tut_experience_id    = $result->tut_experience_id;
        $job_title            = $result->job_title; 
        $job_level            = $result->job_level ; 
        $employer_name        = $result->employer_name; 
        $years_experience     = $result->years_experience; 
        $job_description      = $result->job_description; 
        $still_doing_job      = $result->still_doing_job; 
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
                   <h5><strong>Edit Work Experience</strong></h5>
                    <hr>
                 <form class="form-inline" method="post" action="<?=base_url();?>Tutor_Controller/tutor_edit_experience_query">

                    <div class="row">
                        
                        <div class="col-sm-4">
                        <label for="email">Job Title:</label> <br>
                        <input type="text" class="form-control" name="job_title" value="<?php echo $job_title; ?>">
                        <input type="hidden" name="tut_experience_id" value="<?php echo $tut_experience_id; ?>">
                        </div>  
                        
                        <div class="col-sm-4">
                        <label for="email">Level:</label> <br>
                        <select class="form-control" style="width: 100%" name="job_level">
                        <option value="<?php echo $job_level; ?>"><?php echo $job_level; ?></option>
                        <option value="Internee">Internee</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Mid Level">Mid Level</option>
                        <option value="Senior Level">Senior Level</option>
                        <option value="Manager">Manager</option>
                        <option value="CEO / Owner">CEO / Owner</option>
                        </select>
                        </div>  
                        

                        
                     <div class="col-sm-4">
                     <label for="email">Duration (Years of experience):</label> <br>
                     <input type="text" class="form-control" name="years_experience" value="<?php echo $years_experience; ?>" onkeypress='return isNumberKey(event)'>
                     </div>
                        
                    </div>
                     
                     
                     <div class="row">
                         
                                                 
                     <div class="col-sm-8 singup-form2">
                     <label for="email">Employer / Organization:</label> <br>
                     <input type="text" class="form-control" name="employer_name" value="<?php echo $employer_name; ?>" style="width: 100%;">
                     </div>
                         
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Still Doing the Job:</label> <br>
                     <select class="form-control" style="width: 100%" name="still_doing_job">
                     <option value="<?php echo $still_doing_job; ?>"><?php echo $still_doing_job; ?></option>
                     <option value="NO">NO</option>
                     <option value="YES">YES</option>
                     </select>
                     </div>
                         
                     </div>
                         
                     <div class="row">
                     <div class="col-sm-12 singup-form2">
                     <label for="email">Roles / Responsibilities:</label> <br>
                     <textarea name="job_description" style="width:100%;" class="form-control"><?php echo $job_description; ?></textarea>
                     </div>
                       
                     </div>
                         
                     
                    
                    <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email"> </label> <br>
                        <button type="submit" class="btn btn-info" id="" name="">Save Changes</button> &nbsp;
                        <a class="btn btn-gray"  href="<?=base_url();?>tutor-panel" >Cancel</a>
                        </div>
                    </div>
       
       </form>
                   
                   </div>
                       
                
                
                
           </div>
        </div>
     </div>