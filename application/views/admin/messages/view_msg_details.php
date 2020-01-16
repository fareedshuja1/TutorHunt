<?php

foreach($result as $result )
{
    $date_time         = $result->date_time;
    $is_read           = $result->is_read; 
    $msg_id            = $result->msg_id;
    $msg_description   = $result->msg_description;
    $msg_subject       = $result->msg_subject;
    $sent_by_student   = $result->sent_by_student;
    $sent_by_tutor     = $result->sent_by_tutor;
    $student_id        = $result->student_id;
    $tutor_id          = $result->tutor_id;
    $std_title         = $result->std_title;
    $std_fname         = $result->std_fname;
    $std_lname         = $result->std_lname;
    $tut_title         = $result->tut_title;
    $tut_fname         = $result->tut_fname;
    $tut_lname         = $result->tut_lname;
    $std_profile_pic   = $result->std_profile_pic;
    $tut_profile_pic   = $result->tut_profile_pic;
    $newdate_time       = $result->newdate_time;
}

foreach($reply as $reply )
{
    $reply_date_time         = $reply->date_time;
    $reply_is_read           = $reply->is_read; 
    $reply_msg_id            = $reply->msg_id;
    $reply_msg_description   = $reply->msg_description;
    $reply_msg_subject       = $reply->msg_subject;
    $reply_sent_by_student   = $reply->sent_by_student;
    $reply_sent_by_tutor     = $reply->sent_by_tutor;
    $reply_student_id        = $reply->student_id;
    $reply_tutor_id          = $reply->tutor_id;
    $reply_std_title         = $reply->std_title;
    $reply_std_fname         = $reply->std_fname;
    $reply_std_lname         = $reply->std_lname;
    $reply_tut_title         = $reply->tut_title;
    $reply_tut_fname         = $reply->tut_fname;
    $reply_tut_lname         = $reply->tut_lname;
    $reply_std_profile_pic   = $reply->std_profile_pic;
    $reply_tut_profile_pic   = $reply->tut_profile_pic;
    $reply_newdate_time      = $reply->newdate_time;
}
    
foreach($check_reply as $tot)
{
$tot = $tot->tot;
}

?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            
              <section class="panel">
          
          
                          <!-- Panel Start -->
                          
                          
                          <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              SUBJECT : <?php echo $msg_subject; ?>
                              <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                          </header>
                          <div class="panel-body">
                              <div class="timeline-messages">
                                  
                                  
                                  <!-- Comment -->
                                  <div class="msg-time-chat">
                                      
                                          <?php if($sent_by_student == 'YES') { ?>
                                          <a href="<?=base_url();?>images/students/<?php echo $std_profile_pic; ?>" class="message-img fancybox">
                                           <img class="avatar"   src="<?=base_url();?>images/students/<?php echo $std_profile_pic; ?>" alt="">
                                          </a>
                                          <?php } else { ?>
                                          <a href="<?=base_url();?>images/tutors/<?php echo $tut_profile_pic; ?>" class="message-img fancybox">
                                          <img class="avatar"   src="<?=base_url();?>images/tutors/<?php echo $tut_profile_pic; ?>" alt="">
                                          </a>
                                          <?php } ?>
                                      
                                      
                                      <div class="message-body msg-in">
                                          <span class="arrow"></span>
                                          <div class="text">
                                              
                                              <p class="attribution"> 
                                                <?php if($sent_by_student == 'YES') { ?>
                                                 <a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $result->student_id; ?>'><?php echo $result->std_title.". ".$result->std_fname." ".$result->std_lname; ?></a> (Student)  -  <?php echo $newdate_time; ?>
                                                <?php } else { ?>
                                                  <a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $result->tutor_id; ?>'><?php echo $result->tut_title.". ".$result->tut_fname." ".$result->tut_lname; ?></a> (Tutor) -  <?php echo $newdate_time; ?>
                                                <?php } ?>
                                              </p>
                                              <p><?php echo $msg_description; ?></p>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /comment -->

                                  
                                  <!-- Message Reply -->
                                  <?php if($tot>0) { ?>
                                  <div class="msg-time-chat">
                                      
                                          <?php if($reply_sent_by_student == 'YES') { ?>
                                          <a href="<?=base_url();?>images/students/<?php echo $reply_std_profile_pic; ?>" class="message-img fancybox">
                                           <img class="avatar"   src="<?=base_url();?>images/students/<?php echo $reply_std_profile_pic; ?>" alt="">
                                          </a>
                                          <?php } else { ?>
                                          <a href="<?=base_url();?>images/tutors/<?php echo $reply_tut_profile_pic; ?>" class="message-img fancybox">
                                          <img class="avatar"   src="<?=base_url();?>images/tutors/<?php echo $reply_tut_profile_pic; ?>" alt="">
                                          </a>
                                          <?php } ?>
                                      
                                      
                                      <div class="message-body msg-in">
                                          <span class="arrow"></span>
                                          <div class="text">
                                              
                                              <p class="attribution"> 
                                                <?php if($reply_sent_by_student == 'YES') { ?>
                                                  <a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $reply->student_id; ?>'><?php echo $reply->std_title.". ".$reply->std_fname." ".$reply->std_lname; ?></a> (Student) - <?php echo $reply_newdate_time; ?> 
                                                <?php } else { ?>
                                                  <a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $reply->tutor_id; ?>'><?php echo $reply->tut_title.". ".$reply->tut_fname." ".$reply->tut_lname; ?></a> (Tutor) - <?php echo $reply_newdate_time; ?>
                                                <?php } ?>
                                              </p>
                                              <p><?php echo $reply_msg_description; ?></p>
                                          </div>
                                      </div>
                                  </div>
                                  <?php } ?>
                                  <!-- /Message Reply -->

                                

                                
                              </div>
                             
                          </div>
                      </section>
                  </div>
                          
                          
                          
                          
                          
                          <!-- Panel End -->
          
              </section>
              

          </section>
      </section>