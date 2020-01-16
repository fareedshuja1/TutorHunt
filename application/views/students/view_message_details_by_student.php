<?php foreach($std_details as $std) 
    {
    $student_id    = $std->student_id; 
    $login_email   = $std->login_email; 
    $fname         = $std->std_fname; 
    $lname         = $std->std_lname; 
    $full_name     = $fname." ".$lname;
    $image         = $std->std_profile_pic;
    $gender        = $std->student_gender;
    $distance      = $std->std_distance_travel;
    $town          = $std->town_name;
    $address1      = $std->std_address_line1;
    $address2      = $std->std_address_line2;
    $home_phone    = $std->std_phone_home;
    $mobile_phone  = $std->std_phone_mobile;
    $std_postcode  = $std->std_postcode;
    $std_personal_stat =  $std->std_personal_stat;
    $std_availability  = $std->std_availability;
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
    
     foreach($message_details as $md)
    {
        $tutor_id        = $md->tutor_id;
        $tut_title       = $md->tut_title;
        $tut_image       = $md->tut_profile_pic;
        $tut_fname       = $md->tut_fname;
        $tut_lname       = $md->tut_lname;
        $tut_fullname    = $tut_title.". ".$tut_fname." ".$tut_lname;
        $msg_subject     = $md->msg_subject;
        $msg_description = $md->msg_description;
        $msg_date_time   = $md->newDate;
        $msg_id          = $md->msg_id;
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
                
            <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                
            <?php if($this->session->flashdata('msg2')) { ?>      
                <div class="alert alert-error" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg2');?> </strong>
                    </div>
            <?php } ?>
                
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
                                    <td><?php echo $std_postcode; ?></td>
				</tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $login_email; ?></td>
				</tr>


 	                        
                                </tbody>
				</table>
                                <hr>
                                <h5 class="bottom-line">You are logged in as Student</h5>
                                </div>
		        </div>
 		    </aside>
		</div> 
                
                

	<div class="col-sm-8 page-content">
                       
                       
		<div class="white-container">
                            
                <div class="jobs-item with-thumb">                
                <div class="thumb">
                    <a href="<?=base_url();?>Tutor_Controller/Tutor_Profile/<?=$tutor_id;?>"><img src="<?=base_url();?>images/tutors/<?php echo $tut_image ?>" alt=""></a>
                </div>
                <div class="clearfix visible-xs"></div>
                <h4 class="title" style="color: #5bc0de">
                    <a href="<?=base_url();?>Tutor_Controller/Tutor_Profile/<?=$tutor_id;?>"><strong><?php echo $tut_fullname; ?></strong></a>
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
                <div class="jobs-item">   
                    <table style="margin-top: -2px;margin-bottom: 2px">
                    <tr>
                    <td><i><h5><strong>You replied on <?php echo $reply_date_time; ?> </strong></h5></i></td>
                    <td><?php echo $status; ?></td>
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
            <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>Student_Controller/sent_reply_to_tutor">
                         <table class="table-bordered">
                         <tr><td>
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Subject:</label>
                         <u><strong><?php echo $msg_subject; ?></strong></u>
                         <input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
                         <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
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
            <form class="form-inline cmxform sent_message_form" method="post" role="form" action="<?=base_url();?>Student_Controller/update_reply_message_by_student">
                         <table class="table-bordered">
                         <tr><td>
                         
                         <div class="row">
                         <div class="form-group singup-form">      
                         <label for="email">Message:</label> <span class="required_star">  *</span><br>
                         <input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
                         <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
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