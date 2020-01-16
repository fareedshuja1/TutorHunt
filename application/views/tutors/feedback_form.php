<?php foreach($tut_details as $tut) 
    {
    $title             = $tut->tut_title;
    $tutor_id          = $tut->tutor_id;
    $fname             = $tut->tut_fname; 
    $lname             = $tut->tut_lname; 
    $full_name         = $fname." ".$lname;
    $image             = $tut->tut_profile_pic;
    $gender            = $tut->tut_gender;
    $distance          = $tut->tut_distance_travel;
    $town              = $tut->town_name;
    $tut_postcode      = $tut->tut_postcode;
    $tut_personal_stat = $tut->tut_personal_stat;
    $tut_availability  = $tut->tut_availability;
    $is_verified       = $tut->is_verified;
    

    
    } 
 ?>

        <div class="header-page-title">
	    <div class="container">
		<h1><?php echo $full_name; ?></h1>
     	    </div>
	</div>

<div id="page-content">
    <div class="container" style="width:80%">
            <div class="row">
                
                  <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
                <?php } ?>
                
		<div class="col-sm-3 page-sidebar">
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
                                
				<table>
				<tbody>
                                <br>
                                    <tr>
                                    <td>Status</td>
                                    <td style="background-color: #a9d622;"><div align="center"><img src="<?=base_url(); ?>images/id-verify.png" alt="ID Verified."></div></td>
				</tr> 
				<tr>
                                    <td>First Name</td>
                                    <td><?php echo $fname;  ?></td>
				</tr>
                                
                                <tr>
                                    <td>Last Name</td>
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
                                
                                <tr>
                                    <td>Postcode</td>
                                    <td><?php echo $tut_postcode; ?></td>
				</tr>
                                   
                                </tbody>
				</table>
                               
                                </div>
                         
		        </div>
 		    </aside>
		</div> 
                
                
    <div class="col-sm-9 page-content">
				
		   <div class="candidates-item candidates-single-item">						
            
            <h5 style="color: #5bc0de"><strong>NOTE: </strong></h5>
            <p><strong>YOU CAN GIVE FEEDBACK TO A TUTOR ONLY ONCE. YOU CANNOT DELETE OR MODIFY YOUR FEEDBACK LATER.</strong> </p>
            <hr>

           <form class="form-inline" method="post" action="<?=base_url();?>Tutor_Controller/give_feedback_to_tutor_query">
               <div class="row">
              <input type="hidden" name="tutor_id" value="<?=$tutor_id;?>">
              <div class="col-sm-3">
                <label for="email" style="color: #5bc0de">RATE TUTOR (OUT OF 5):</label> <br>
                <select class="form-control" style="width: 100%" name="tutor_rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>   
                
                <div class="col-sm-9">
                <label for="email" style="color: #5bc0de">FEEDBACK</label> <br>
                <textarea rows="6" name="feedback_description"></textarea>
                </div> 
               </div>
               <div class="row">
                   <input type="submit" class="btn btn-success" value="Give Feedback" style="margin-left: 20px;">
                   <a class="btn btn-gray"  href="<?=base_url();?>tutor/profile/<?=$tutor_id;?>" >Cancel</a>
               </div>
            </form> 
            
            
            
        </div>


            </div> 
        </div>
    </div>
</div>