<?php

foreach ($result as $result)
{
     $tut_feedback_id        = $result->tut_feedback_id;
     $feedback_description   = $result->feedback_description;
     $feedback_date_time     = $result->feedback_date_time; 
     $tutor_rating      = $result->tutor_rating;
     $student_id        = $result->student_id;  
     $std_profile_pic   = $result->std_profile_pic;
     $std_fname         = $result->std_fname;
     $std_lname         = $result->std_lname;
}    

foreach($reply as $reply )
{
    $response_date_time        = $reply->response_date_time;
    $response_description      = $reply->response_description; 
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
                              FEEDBACK DETAILS
                              <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                          </header>
                          <div class="panel-body">
                              <div class="timeline-messages">
                                  
                               <!-- FEEDBACK -->
                                  <div class="msg-time-chat">
                                      
                                      <a href="<?=base_url();?>images/students/<?php echo $std_profile_pic; ?>" class="message-img fancybox">
                                      <img class="avatar"   src="<?=base_url();?>images/students/<?php echo $std_profile_pic; ?>" alt="">
                                      </a>
                                        
                                      <div class="message-body msg-in">
                                          <span class="arrow"></span>
                                          <div class="text">
                                              
                                              <p class="attribution"> 
                                            <a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $student_id; ?>'><?php echo $std_fname." ".$std_lname; ?></a> 
                                                                    <?php for($i=0;$i<$tutor_rating;$i++) { ?>
                                                                    <img src="<?=base_url();?>images/rating.png" />
                                                                    <?php } ?> (<?php echo $tutor_rating; ?>/5)
                                            -  <?php echo $feedback_date_time; ?>
                                              </p>
                                              <p><?php echo $feedback_description; ?></p>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /FEEDBACK -->    
                                  
                                  
                                  <?php if($tot > 0) { ?>
                                  
                                 <!-- REPLY -->
                                  <div class="msg-time-chat">
                                       <div class="message-body msg-in">
                                          <span class="arrow"></span>
                                          <div class="text">
                                              
                                              <p class="attribution"> 
                                            <a href='#'>Tutor's Response</a> -  <?php echo $response_date_time; ?>
                                              </p>
                                              <p><?php echo $response_description; ?></p>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /REPLY -->  
                                  
                                  <?php } ?>
                                  
                                  
                          </div>
                             
                          </div>
                      </section>
                  </div>
                          
                          
                          
                          
                          
                          <!-- Panel End -->
          
              </section>
              

          </section>
      </section>
