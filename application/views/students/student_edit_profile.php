<?php foreach($std_details as $std) 
    { 
    $fname = $std->std_fname; 
    $lname = $std->std_lname; 
    $full_name = $fname." ".$lname;
    $image = $std->std_profile_pic;
    $address1 = $std->std_address_line1;
    $address2 = $std->std_address_line2;
    $gender = $std->student_gender;
    $distance = $std->std_distance_travel;
    $std_postcode = $std->std_postcode;
    $std_personal_stat =  $std->std_personal_stat;
    $std_availability = $std->std_availability;
    
    $home_phone = $std->std_phone_home;
    $mobile_phone = $std->std_phone_mobile;
    $country = $std->country_name; 
    $countryid = $std->country_id; 
    $town = $std->town_name;
    $townid = $std->town_id;
    } 
 ?>

        <div class="header-page-title">
	    <div class="container">
		<h1><?php echo "EDIT PROFILE"; ?></h1>
     	    </div>
	</div>

     <div id="page-content">
	<div class="container">
              <div class="row">
                  
                 <div class="col-sm-12 page-content">
				
		   <div class="candidates-item candidates-single-item">						
                   
                   <form class="form-inline cmxform createprofile" method="post" role="form" id="" action="<?=base_url();?>Student_Controller/Student_Edit_Profile_Query" enctype="multipart/form-data">
   
                                            
                        <div class="row">
                            
                        <div class="col-sm-4">
                        <label for="password">First Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="fname" value="<?php echo $fname; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="password">Last Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="lname" value="<?php echo $lname; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="email">Gender:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="std_gender">
                        <option value='<?php echo $gender; ?>'><?php echo $gender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
                        </div>
                                            
                        <div class="row">
                        <div class="col-sm-6 singup-form2">
                        <label for="email">Address Line 1:</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="address_line1" value="<?php echo $address1; ?>" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-6 singup-form2">
                        <label for="password">Address Line 2:</label><br>
                        <input type="text" id="" class="form-control" name="std_address_line2" value="<?php echo $address2; ?>" style="width: 100%">
                        </div>
                        </div>
                    
                    
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
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
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">PostCode:</label>   <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="postcode" value="<?php echo $std_postcode; ?>" style="width: 100%">
                        </div>
                            
                                                        
                        <div class="col-sm-4 singup-form2">
                        <input type="hidden" name="country_id" value="<?php echo $countryid; ?>">
                        <label for="password">Distance Willing to Travel:</label>   <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="std_distance_travel">
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
                    
                    
                        <div class="row">
                        <div class="col-sm-3 singup-form2">
                        <label for="email">Phone (Home):</label><br>
                        <input type="text" id="" class="form-control" name="std_phone_home" value="<?php echo $home_phone; ?>" onkeypress='return isNumberKey(event)'  style="width: 100%">
                        </div>
                            
                        <div class="col-sm-3 singup-form2">
                        <label for="password">Phone (Mobile):</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" value="<?php echo $mobile_phone; ?>" onkeypress='return isNumberKey(event)'  name="phone_mobile" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-6 singup-form2">
                        <label for="email">Profile Image: (jpg, jpeg & png only)</label> <br>
                        <input type="file" class="form-control" name="profile_img" style="width: 100%" accept="image/*">
                        </div>
                        </div>
                    
                                        
                        <div class="row">
                            
                        <div class="col-sm-6 singup-form2">
                            <label for="password"> Tell us about yourself <span style="color:red"> &nbsp; (Please do not include any number and contact details. Your account will be blocked immediately.): </span> </label><br>
                        <textarea class="form-control"  style="width: 100%" name="std_personal_stat"><?php echo $std_personal_stat; ?></textarea>
                        </div>
                            
                        <div class="col-sm-6 singup-form2">
                        <label for="password">Availability: (When are you available to learn). </label><br>
                        <textarea class="form-control"  style="width: 100%" name="std_availability"><?php echo $std_availability; ?></textarea>
                        </div>
                        </div>
                       
                        
                       
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email"> </label> <br>
                        <button type="submit" class="btn btn-info" name="">Edit Profile</button> &nbsp;
                        <a class="btn btn-gray" href="<?=base_url();?>student-panel" >Cancel</a>
                        </div>

                        </div>
                    
                         </form>



                   </div>
                       
                  
                   
                   </div> 
                
                
                
           </div>
        </div>
     </div>