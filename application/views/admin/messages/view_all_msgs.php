 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">



              
              <section class="panel">
          
          <header class="panel-heading"><strong>LIST OF ALL MESSAGES</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                             <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>STUDENT</th>
                                          <th>TUTOR</th>
                                          <th>SUBJECT </th>
                                          <th>DATE </th>
                                          <th>SEND BY</th>
                                          <th>MESSAGE </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                      <?php 
                                      foreach($result as $result) { ?>
                                      <tr>
<td data-title="STUDENT"><a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $result->student_id; ?>'><?php echo $result->std_fname." ".$result->std_lname; ?></a></td>
<td data-title="TUTOR"><a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $result->tutor_id; ?>'><?php echo $result->tut_fname." ".$result->tut_lname; ?></a></td>
                                          <td data-title="SUBJECT"><?php echo $result->msg_subject; ?></td>
                                          <td data-title="DATE"><?php echo $result->newdate_time; ?></td>
                                          <?php if($result->sent_by_student == 'NO') { ?>
                                          <td data-title="SEND BY">TUTOR </td>
                                          <?php } else { ?>
                                          <td data-title="SEND BY">STUDENT </td>
                                          <?php } ?>
<td data-title="MESSAGE"><?php echo substr($result->msg_description, 0, 50); ?>...<strong> <a href='<?=base_url();?>WebAdmin/view_message_details/<?php echo $result->msg_id; ?>'>READ MORE</a></strong></td>
                                     <?php } ?>  
                              </tbody>
                          </table>
                                            </section>
              
          </div>
               
          </div>
          
      </section>
              
<!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Course Details</h4>
                                          </div>
                                          <div class="modal-body">

                                             

                                          </div>
                                          
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

          </section>
      </section>