 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">



              
              <section class="panel">
          
          <header class="panel-heading"><strong>LIST OF ALL PAYMENTS</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                             <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>STUDENT</th>
                                          <th>TUTOR</th>
                                          <th>TRANSACTION ID </th>
                                          <th>DATE </th>
                                          <th>AMOUNT</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                      <?php 
                                      foreach($result as $result) { ?>
                                      <tr>
<td data-title="STUDENT"><a href='<?=base_url();?>WebAdmin/Student_Detail/<?php echo $result->student_id; ?>'><?php echo $result->std_fname." ".$result->std_lname; ?></a></td>
<td data-title="TUTOR">  <a href='<?=base_url();?>WebAdmin/Tutor_Detail/<?php echo $result->tutor_id; ?>'><?php echo $result->tut_fname." ".$result->tut_lname; ?></a></td>
                                          <td data-title="TRANSACTION ID"><?php echo $result->transaction_id; ?></td>
                                          <td data-title="DATE"><?php echo $result->newdate_time; ?></td>
                                          <td data-title="AMOUNT">£<?php echo $result->amount_paid; ?> </td>
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