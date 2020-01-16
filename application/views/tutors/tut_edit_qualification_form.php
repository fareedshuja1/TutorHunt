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
        $qual_level_id    = $result->qual_level_id;
        $qual_level_title = $result->qual_level_title;
        $university_name  = $result->university_name;
        $course           = $result->course;
        $grades           = $result->grades;
        $grades_type      = $result->grades_type;
        $graduation_year  = $result->graduation_year;
        $still_in_progress  = $result->still_in_progress;
        $tut_qual_id        = $result->tut_qual_id;
        
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
                   <h5><strong>Edit Qualification</strong></h5>
                    <hr>
                 <form class="form-inline" method="post" action="<?=base_url();?>Tutor_Controller/tutor_edit_qual_query">

                    <div class="row">
                        
                        <div class="col-sm-4">
                        <label for="email">Qualification Level:</label> <br>
                        <select class="form-control" style="width: 100%" name="qual_level_id">
                            <option value="<?php echo $qual_level_id; ?>"><?php echo $qual_level_title; ?></option>
                        <?php
                         foreach ($qualification_level as $ql)
                         {
                         echo "<option value='$ql->qual_level_id'>$ql->qual_level_title</option>";
                         }
                        ?>
                        </select>
                        </div>  
                        
                        <div class="col-sm-8">
                        <label for="email">College / University:</label> <br>
                        <input type="text" class="form-control" name="university_name" style="width:100%" value="<?php echo $university_name; ?>">
                        </div>  
                        
                    </div>
                     
                     
                     <div class="row">
                         
                                            
                                                 
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Course Name:</label> <br>
                     <input type="text" class="form-control" name="course" value="<?php echo $course; ?>">
                     </div>
                         
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Grades (%):</label> <br>
                     <select class="form-control" style="width: 100%" name="grades">
                     <option value="<?php echo $grades; ?>"><?php echo $grades; ?></option>
                     <option value="70+ %">70+ %</option>
                     <option value="60-69 %">60-69 %</option>
                     <option value="50-59 %">50-59 %</option>
                     <option value="40-49 %">40-49 %</option>
                     <option value="30-39 %">30-39 %</option>
                     <option value="0-29 %">0-29 %</option>
                     </select>
                     </div>
                         
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Result Type:</label> <br>
                     <select class="form-control" style="width: 100%" name="grades_type">
                     <option value="<?php echo $grades_type; ?>"><?php echo $grades_type; ?></option>
                     <option value="Obtained">Obtained</option>
                     <option value="Predicted">Predicted</option>
                     </select>
                     </div>
                       
                     </div>
                     
                     <div class="row">
                         
                     <input type="hidden" name="tut_qual_id" value="<?php echo $tut_qual_id; ?>">
                     
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Grad. Year:</label> <br>
                     <input type="text" class="form-control" name="graduation_year" value="<?php echo $graduation_year; ?>" onkeypress='return isNumberKey(event)'>
                     </div>
                         
                     <div class="col-sm-4 singup-form2">
                     <label for="email">Still in Progress?:</label> <br>
                     <select class="form-control" style="width: 100%" name="still_in_progress">
                     <option value="<?php echo $still_in_progress; ?>"><?php echo $still_in_progress; ?></option>
                     <option value="YES">Yes</option>
                     <option value="NO">No</option>
                     </select>   
                         
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