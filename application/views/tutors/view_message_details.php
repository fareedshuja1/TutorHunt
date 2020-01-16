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
    $tutor_id          = $tut->tutor_id;

    } 
    
    foreach($message_details as $md)
    {
        $student_id      = $md->student_id;
        $std_title       = $md->std_title;
        $std_image       = $md->std_profile_pic;
        $std_fname       = $md->std_fname;
        $std_lname       = $md->std_lname;
        $std_fullname    = $std_title.". ".$std_fname." ".$std_lname;
        $msg_subject     = $md->msg_subject;
        $msg_description = $md->msg_description;
        $msg_date_time   = $md->newDate;
        $msg_id          = $md->msg_id;
        
    }
    
    foreach($message_reply_details as $mrd)
    {
        $reply_description = $mrd->msg_description;
        $reply_date_time   = $mrd->newDate2;
        $reply_is_read     = $mrd->is_read;
        
        if($reply_is_read == 'READ')
        {
            $status = "<div style='background-color:#a9d622;color: #fff;width:100px'><div align='center'>SEEN</div></div>";
        } else {
            $status = "<div style='background-color: #ffc0cb;color: #fff;width:100px;'><div align='center'>UNSEEN</div></div>";
        }
    }
    
    foreach($check_reply as $tot)
    {
        $tot = $tot->tot;
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
		        
                       
            <div class="white-container">
                            
                <div class="jobs-item with-thumb">                
                <div class="thumb">
                    <a href="<?=base_url();?>student/profile/<?=$student_id;?>"><img src="<?=base_url();?>images/students/<?php echo $std_image ?>" alt=""></a>
                </div>
                <div class="clearfix visible-xs"></div>
                <h4 class="title" style="color: #5bc0de">
                    <a href="<?=base_url();?>student/profile/<?=$student_id;?>"><strong><?php echo $std_fullname; ?></strong></a>
                </h4>
                <br>
                <span class="meta"><strong><?php echo $msg_subject; ?></strong> &nbsp; (<?php echo $msg_date_time; ?>)</span>
                <p class="description" style="text-align: justify"><?php echo $msg_description; ?></a></p>
                <hr>
                <div class="clearfix">
                    <?php if($tot == 0) { ?>
                    <a href="#" class="btn btn-default" style="float:right;" onclick="$('.reply-box').show();">REPLY</a>
                    <?php } ?>
                </div>
                </div>
                
                <?php if($tot >0) { ?>
                <div class="">   
                    <table style="margin-top: -2px;margin-bottom: 2px;">
                    <tr>
                    <td><h5><strong>You replied on <?php echo $reply_date_time; ?> </strong></h5>  <?php echo $status; ?> </td>
                   
                    </tr>
                    </table>
                    
                <div class="clearfix visible-xs"></div>
                               
                <p class="description" style="text-align: justify"><?php echo $reply_description; ?></a></p>
                <?php if($reply_is_read == 'UNREAD') { ?>
                <br>
                <div class="clearfix"><a href="#" class="btn btn-default" onclick="$('.update-reply-box').show();">EDIT MESSAGE</a></div>
                <?php } ?>
                </div>
                <?php } ?>
                
            </div>
                 
                       
            <div class="white-container reply-box" style="display: none;">
            <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>MainController/reply_sent_message">
                         <table class="table-bordered">
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Subject:</label> <span class="required_star">  *</span><br>
                         <h5><strong><?php echo $msg_subject; ?></strong></h5>
                         <input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
                         <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                         <input type="hidden" name="msg_subject" value="<?php echo $msg_subject; ?>">
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
                         </div>
                         </div>
                         </td></tr>
                         </table>
            </form>               
            </div>
                       
            <div class="white-container update-reply-box" style="display: none;">
            <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>MainController/update_reply_sent_message_by_tutor">
                         <table class="table-bordered">
                         <tr><td>
                         
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Message:</label> <span class="required_star">  *</span><br>
                         <input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
                         <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                         <textarea class="form-control txtOnly msgbox" style="width:80%; height: 200px;" name="reply_description"><?php echo $reply_description; ?></textarea>
                         </div>
                         </div>
                         </td></tr>
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">
                         <button type="submit" class="btn btn-info" name="">Edit Message</button>
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