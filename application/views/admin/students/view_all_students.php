

     <section id="main-content">
         <section class="wrapper">

                               <section class="panel">
                                <header class="panel-heading"><strong> LIST OF ALL STUDENTS</strong> </header>

                          <div class="panel-body">
                                            
                        <div class="adv-table">
                                            

                                   <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>Student Name</th>
                                          <th>Email</th>
                                          <th>Town </th>
                                          <th>Mobile </th>
                                          <th>Date Registered </th>
                                          <th>Status </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          
                                      <?php foreach($students as $result_data) { ?>
                                          <tr>
                                              
                                              <td data-title="Name"><a href="<?=base_url();?>WebAdmin/Student_Detail/<?=$result_data->student_id; ?>"><?php echo $result_data->std_fname; echo " "; echo $result_data->std_lname; ?></a></td>
                                              <td data-title="Email"><?php echo $result_data->login_email; ?></td>
                                              <td data-title="Town"><?php echo $result_data->town_name; ?></td>
                                              <td data-title="Mobile"><?php echo $result_data->std_phone_home; ?></td>
                                              <td data-title="Date"><?php echo $result_data->stddate; ?></td>
                                              <td data-title="Status"><?php echo $result_data->login_account_status; ?></td>
                                              
                                          </tr>
                                      <?php  } ?>
                                            
                              </tbody>
                          </table>
                                           
                         </div>
                              
                          </div>
                  </section>

         </section>
      </section>

