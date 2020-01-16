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
    $townid            = $tut->town_id;
    $address1          = $tut->tut_address_line1;
    $address2          = $tut->tut_address_line2;
    $home_phone        = $tut->tut_phone_home;
    $mobile_phone      = $tut->tut_phone_mobile;
    $tut_postcode      = $tut->tut_postcode;
    $tut_personal_stat = $tut->tut_personal_stat;
    $tut_availability  = $tut->tut_availability;
    $tut_skype         = $tut->tut_skype;
    $country           = $tut->country_name; 
    $countryid         = $tut->country_id; 
    $tut_skype         = $tut->tut_skype;
    //$ver_doc           = $tut->tut_ver_docs;
    $is_verified       = $tut->is_verified;
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

	           <div class="col-sm-12 page-content">
				
		   <div class="candidates-item candidates-single-item">						
                   <h5><strong>Edit Profile</strong></h5>
                   <hr>
                   
<form class="form-inline cmxform createprofile" method="post" role="form" id="" action="<?=base_url();?>Tutor_Controller/Tutor_Edit_Profile_Query" enctype="multipart/form-data">
   
                                            
                        <div class="row">
                        
                        <div class="col-sm-2">
                        <label for="email">Title:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="tut_title">
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                        </select>
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="password">First Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="fname" value="<?php echo $fname; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="password">Last Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="lname" value="<?php echo $lname; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-2">
                        <label for="email">Gender:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="tut_gender">
                        <option value='<?php echo $gender; ?>'><?php echo $gender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
                        </div>
                                            
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Address Line 1:</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="address_line1" value="<?php echo $address1; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Address Line 2:</label><br>
                        <input type="text" id="" class="form-control" name="tut_address_line2" value="<?php echo $address2; ?>" style="width: 100%">
                        </div>
                            
                                                    
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Skype ID. </label><br>
                        <input type="text" class="form-control" value="<?php echo $tut_skype; ?>" name="tut_skype" style="width: 100%">
                        </div>
                        </div>
                    
                    
                        <div class="row">
                            
                        <input type="hidden" name="country_id" value="<?php echo $countryid; ?>">
                        
                        <div class="col-sm-3 singup-form2">
                        <label for="email">Town:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="town_id">
                        <option value='<?php echo $townid; ?>'><?php echo $town; ?></option>
                        <?php
                        foreach($townn as $town)
                        {
                        echo "<option value='$town->town_id'>$town->town_name</option>";
                        }
                        ?>
                        </select>
                        </div>
                            
                        <div class="col-sm-3 singup-form2">
                        <label for="password">PostCode:</label>   <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="postcode" value="<?php echo $tut_postcode; ?>" style="width: 100%">
                        </div>
                        
                                                    
                        <div class="col-sm-6 singup-form2">
                        <label for="password">Availability: (When are you available to teach?). </label><br>
                        <textarea class="form-control"  style="width: 100%" name="tut_availability"><?php echo $tut_availability; ?></textarea>
                        </div>
                            
                        </div>
                    
                    
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Phone (Home):</label><br>
                        <input type="text" id="" class="form-control" name="tut_phone_home" value="<?php echo $home_phone; ?>" onkeypress='return isNumberKey(event)'  style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Phone (Mobile):</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" value="<?php echo $mobile_phone; ?>" onkeypress='return isNumberKey(event)'  name="phone_mobile" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Distance Willing to Travel:</label>   <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="tut_distance_travel">
                        <option value='<?php echo $distance; ?>'><?php echo $distance; ?></option>
                        <option value="From Home">From Home</option>
                        <option value="1 Mile">1 Mile</option>
                        <option value="2 Miles">2 Miles</option>
                        <option value="3 Miles">3 Miles</option>
                        <option value="4 Miles">4 Miles</option>
                        <option value="5 Miles">5 Miles</option>
                        <option value="6 Miles">6 Miles</option>
                        <option value="7 Miles">7 Miles</option>
                        <option value="8 Miles">8 Miles</option>
                        <option value="9 Miles">9 Miles</option>
                        <option value="More than 10 Miles">More than 10 Miles</option>
                        </select>
                        </div>
                        </div>
                    
                                                <div class="row">
                        <div class="col-sm-12 singup-form2">
                        <label for="email">Profile Image: (JPG, JPEG & PNG files only)</label> <br>
                        <input type="file" class="form-control" name="profile_img" style="width: 100%" accept="image/*">
                        <u style="color: red"><strong>Please upload an image only if you want to change your profile picture, otherwise don't.</strong></u>
                        </div>

                        </div>
                                        
                        <div class="row">
                            
                        <div class="col-sm-12 singup-form2">
                        <label for="password"> Tell us about yourself <span style="color:red"> &nbsp; (Please do not include any number and contact details. Your account will be blocked immediately.): </span> </label><br>
                        <textarea class="form-control ckeditor"  style="width: 100%" name="tut_personal_stat"><?php echo $tut_personal_stat; ?></textarea>
                        </div>
 
                        </div>
                        

                       
                       
                        <div class="row">  
                        <div class="col-sm-4 singup-form2">
                        <label for="email"> </label> <br>
                        <button type="submit" class="btn btn-info" name="">Save Changes</button> &nbsp;
                        <a class="btn btn-gray" href="<?=base_url();?>tutor-panel" >Cancel</a>
                        </div>
                        </div>

                    
                         </form>
                   </div>
                       
                       <div class="candidates-item candidates-single-item">	
                       <h5><strong>Change Password</strong></h5>
                       <hr> 
                       
                       <form class="form-inline changepassword" role="form" method="post" action="<?=base_url();?>Tutor_Controller/Tutor_Change_Password">
                       
                        <div class="row">
                        <div class="col-sm-6">
                        <label for="email">Enter Old Password:</label>  <span class="required_star">  *</span><br>
                        <input type="password" class="form-control" name="old_pass" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-6">
                        <label for="password">Enter New Password:</label>  <span class="required_star">  *</span><br>
                        <input type="password" class="form-control" name="new_pass" style="width: 100%">
                        </div>
                        </div>
                           
                       <div class="row">
                       <div class="col-sm-6 singup-form2">
                       <button type="submit" class="btn btn-info" name="">Change</button>    
                       </div>
                       </div>
                           
                       </form>
                       
                       </div>
                       
                       <?php //if($is_verified == 'NO') { ?>
                       
                       <!--<div class="candidates-item candidates-single-item">	
                       <h5><strong>Upload New Verification Document</strong></h5>
                       <hr> 
                       
                       <form class="form-inline" method="post" action="<?=base_url();?>Tutor_Controller/Tutor_Change_VerificationDoc" enctype="multipart/form-data">
                       
                        <div class="row">
                        <div class="col-sm-12" align="center">
                        <a href="<?=base_url(); ?>emp_verification_documents/<?php //echo $ver_doc; ?>"> 
                        <img src="<?=base_url(); ?>emp_verification_documents/<?php //echo $ver_doc; ?>" width="40%" height="40%" alt="">
                        </a>
                        </div>
                        </div>  
                            
                         
                        <div class="row singup-form2">
                        <div class="col-sm-12">
                        <label for="email">Upload a new verification document <i>(Passport, BRP, or Driving Licence:  <u style="color: red">Image Formats Only</u>)</i>:</label>  <span class="required_star">  *</span><br>
                        <input type="file" class="form-control" name="tut_ver_docs" style="width: 100%" required="required">
                        </div>
                        </div>
                            
                       <div class="row">
                       <div class="col-sm-6 singup-form2">
                       <button type="submit" class="btn btn-info" name="">Upload</button>    
                       </div>
                       </div>
                           
                       </form>
                       
                       </div>-->
                       <?php //} ?>
                       
                   
                   </div> 
                
                
                
           </div>
        </div>
     </div>