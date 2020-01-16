
		<div class="header-page-title">
			<div class="container">
				<h1>Complete Profile</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-12 page-content">
    
	            
             <!-- PANEL 1 STARTS -->
            <div class="title-lines"> <h3 class="mt0"> Please complete your profile to continue</h3> </div>
                                     
            <div class="latest-jobs-section white-container">
                
            <?php if($this->session->flashdata('msg')) { ?>      
                    <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                                        
    <form class="form-inline cmxform createprofile" method="post" role="form" id="fileForm"
    action="<?=base_url();?>Student_Controller/Create_Std_Profile_Query" enctype="multipart/form-data">
   
                                            
                        <div class="row">
                        <div class="col-sm-2">
                        <label for="email">Title:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="std_title">
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
                        <input type="text" class="form-control txtOnly" name="fname" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="password">Last Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="lname" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-2">
                        <label for="email">Gender:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="std_gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
                        </div>
                                            
                        <div class="row">
                        <div class="col-sm-6 singup-form2">
                        <label for="email">Address Line 1:</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="address_line1" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-6 singup-form2">
                        <label for="password">Address Line 2:</label><br>
                        <input type="text" id="" class="form-control" name="std_address_line2" style="width: 100%">
                        </div>
                        </div>
                    
                    
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Town:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="town_id">
                        <?php
                        foreach($town as $town)
                        {
                        echo "<option value='$town->town_id'>$town->town_name</option>";
                        }
                        ?>
                        </select>
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Country:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="country_id">
                        <?php
                        foreach($countries as $countries)
                        {
                            echo "<option value='$countries->country_id'>$countries->country_name</option>";
                        }
                        ?>
                        </select>
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">PostCode:</label>   <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="postcode" style="width: 100%">
                        </div>
                        </div>
                    
                    
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Phone (Home):</label><br>
                        <input type="text" id="" class="form-control" name="std_phone_home" onkeypress='return isNumberKey(event)'  style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Phone (Mobile):</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" onkeypress='return isNumberKey(event)'  name="phone_mobile" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Distance Willing to Travel:</label>   <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="std_distance_travel">
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
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Profile Image: (jpg, jpeg & png only)</label>  <span class="required_star">  *</span><br>
                        <input type="file" class="form-control" name="profile_pic" style="width: 100%" accept="image/*">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                            <label for="password"> Tell us about yourself <span style="color:red"> &nbsp; (Please do not include any number and contact details. Your account will be blocked immediately.): </span> </label><br>
                        <textarea class="form-control"  style="width: 100%" name="std_personal_stat" placeholder="Tell us about yourself. Please do not include your contact details."> </textarea>
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Availability: (When are you available to learn). </label><br>
                        <textarea class="form-control"  style="width: 100%" name="std_availability" placeholder=""> </textarea>
                        </div>
                        </div>
                        
                         <div class="row">
                         <div class="form-group singup-form2">
                         <button type="submit" class="btn btn-info" name="std_create_profile_submit">Create Profile</button>
                         </div>
                         </div>
                    
                         </form>
    
                                        
	    </div> 
       <!-- PANEL 1 ENDS -->
                                    
 </div> 
<!-- PAGE MIDDLE CONTENT END -->
               
   	    
           </div>
	</div> 
   </div> 

	