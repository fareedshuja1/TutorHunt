
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
                                        
 <form class="form-inline cmxform createprofile" method="post" role="form" id="fileForm" action="<?=base_url();?>Tutor_Controller/Create_Tut_Profile_Query" enctype="multipart/form-data">
   
                                            
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
                        <input type="text" class="form-control txtOnly" name="fname" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4">
                        <label for="password">Last Name:</label> <span class="required_star">  *</span><br>
                        <input type="text" class="form-control txtOnly" name="lname" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-2">
                        <label for="email">Gender:</label>  <span class="required_star">  *</span><br>
                        <select class="form-control" style="" name="tut_gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
                        </div>
                                            
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Address Line 1:</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="address_line1" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Address Line 2:</label><br>
                        <input type="text" id="" class="form-control" name="tut_address_line2" style="width: 100%">
                        </div>
                            
                                                        
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Skype ID. </label><br>
                        <input type="text" class="form-control" name="tut_skype" style="width: 100%">
                        </div>
                        </div>
                    
                    
                        <div class="row">

                            
                            <div class="col-sm-3 singup-form2">
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
                            
                            
                        <div class="col-sm-3 singup-form2">
                        <label for="password">PostCode:</label>   <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" name="postcode" style="width: 100%" placeholder="Please enter a valid UK postcode.">
                        </div>
                       
                                                   
                        <div class="col-sm-6 singup-form2">
                        <label for="password">Availability: (When are you available to teach?). </label><br>
                        <input type="text" id="" class="form-control" name="tut_availability" style="width: 100%" placeholder="Example: I am available to teach to on friday, saturday and sunday.">
                        </div>
                        
                        </div>
                    
                    
                        <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email">Phone (Home/Office):</label><br>
                        <input type="text" id="" class="form-control" name="tut_phone_home" onkeypress='return isNumberKey(event)'  style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Phone (Mobile):</label>  <span class="required_star">  *</span><br>
                        <input type="text" id="" class="form-control" onkeypress='return isNumberKey(event)'  name="phone_mobile" style="width: 100%">
                        </div>
                            
                        <div class="col-sm-4 singup-form2">
                        <label for="password">Distance Willing to Travel:</label>   <span class="required_star">  *</span><br>
                        <select class="form-control" style="width: 100%" name="tut_distance_travel">
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
                        <label for="email">Profile Image: </label>  <span class="required_star">  *</span><br>
                        <input type="file" class="form-control" name="profile_pic" style="width: 100%" accept="image/*"> 
                        <u style="color: red"><strong>Please upload a clear image showing your full face.</strong></u>
                        </div>
                            
                       <!-- <div class="col-sm-8 singup-form2">
<label for="email">ID Verification Document <i><u style="color: red">(JPG, JPEG & PNG files only)</u></i></label>  <span class="required_star">  *</span><br>
                        <input type="file" class="form-control" name="tut_ver_docs" style="width: 100%">
                        <span><strong>Upload a verification document like a copy of your Passport, Driving Licence, or Residence Card.</strong></span>
                        </div> -->
                        </div>
     
                         
                        <div class="row">
                        <div class="col-sm-12 singup-form2">
                            <label for="password"> Tell us about yourself <span style="color:red"> &nbsp; (Please do not include any number and contact details. Your account will be blocked immediately.): </span> </label><br>
                        <textarea class="form-control ckeditor" rows="6"  style="width: 100%" name="tut_personal_stat"> </textarea>
                        </div>


                        </div>
                        
                         <div class="row">
                         <div class="form-group singup-form2">
                         <button type="submit" class="btn btn-info" name="tut_create_profile_submit">Create Profile</button>
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

	