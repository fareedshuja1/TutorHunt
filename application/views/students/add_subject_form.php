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

    
    $home_phone = $std->std_phone_home;
    $mobile_phone = $std->std_phone_mobile;

    $town = $std->town_name;
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
                                    <img src="<?=base_url(); ?>images/students/no_pic.jpg" alt="">
                                    <?php } else { ?>
                                    <img src="<?=base_url(); ?>images/students/<?php echo $image; ?>" alt="">
                                    <?php } ?>
                                </div>

				<table>
				<tbody>
				<tr>
                                    <td>First Name</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo $lname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $gender; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Distance willing to travel</td>
                                    <td><?php echo $distance; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Town</td>
                                    <td><?php echo $town; ?></td>
				</tr>
                                
                                                                
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $std_postcode; ?></td>
				</tr>
 	                        
                                </tbody>
				</table>
                                
                                </div>
		        </div>
 		    </aside>
		</div> 
                
                

	           <div class="col-sm-8 page-content">
				
		   <div class="candidates-item candidates-single-item">						
                   <h5><strong>Add the subject which you want to study</strong></h5>
                    <hr>
                 <form class="form-inline" method="post" action="<?=base_url();?>Student_Controller/Student_AddSubjuect_Query">

                    <div class="row">
                        
                        <div class="col-sm-6">
                        <label for="email">Select Main Subject:</label> <br>
                        <select class="form-control" style="width: 100%" name="mains_id" id="mains_id" onchange="student_addsubj();">
                        <?php
                         foreach ($main_subjs as $ms)
                         {
                         echo "<option value='$ms->mains_id'>$ms->mains_title</option>";
                         }
                        ?>
                        </select>
                        </div>  
                        
                        <div class="col-sm-6">
                        <label for="email">Select Sub Subject:</label> <br>
                        <select class="form-control" style="width: 100%" name="subs_id" id="subs_subj">
                        
                        </select>
                        </div>  
                        
                    </div>
                     
                     
                     <div class="row">
                         
                     <div class="col-sm-12 singup-form2">
                     <label for="email">Select Level:</label> <br>
                        <?php
                         foreach ($subj_level as $sl)
                         {
                           echo "<input class='' type='checkbox' name='sub_level_id[]' value='$sl->sub_level_id' checked> &nbsp; $sl->sub_level_title &nbsp; &nbsp;";
                         }
                        ?>
                      </select>
                     </div>
                     
                       
                     </div>
                 
                    
                    <div class="row">
                        <div class="col-sm-4 singup-form2">
                        <label for="email"> </label> <br>
                        <button type="submit" class="btn btn-info" id="add_subject_btn" name="" style="display:none">Add Subject</button> &nbsp;
                        <a class="btn btn-gray"  href="<?=base_url();?>student-panel" >Cancel</a>
                        </div>
                    </div>
       
       </form>
                   
                   </div>
                       
                
                
                
           </div>
        </div>
     </div>