

     <section id="main-content">
         <section class="wrapper">

                                            
                                <section class="panel">
                                <header class="panel-heading"><strong> LIST OF ALL TUTORS</strong> </header>

                          <div class="panel-body">
                                            
                        <div class="adv-table">
                                            

                                     <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>Name</th>
                                          <th>Email </th>
                                          <th>Town </th>
                                          <th>PostCode </th>
                                          <th>Mobile </th>
                                          <th>Date Registered </th>
                                          <th>Account </th>
                                          <th>Is_Verified </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                             <?php foreach($tutors as $result) {  ?>                                              
                                          <tr>
                                              
                                              <td data-title="Name"><a href="<?=base_url();?>WebAdmin/Tutor_Detail/<?=$result->tutor_id; ?>"> <?php echo $result->tut_fname; echo " "; echo $result->tut_lname; ?></a></td>
                                              <td data-title="Email"><?php echo $result->login_email; ?></td>
                                              <td data-title="Town"><?php echo $result->town_name; ?></td>
                                              <td data-title="PostCode"><?php echo $result->tut_postcode; ?></td>
                                              <td data-title="Mobile"><?php echo $result->tut_phone_mobile; ?></td>
                                              <td data-title="Date Registered"><?php echo $result->recdate; ?></td>
                                              <td data-title="Account"><?php echo $result->login_account_status; ?></td>
                                              <td data-title="Is_Verified"><?php echo $result->is_verified; ?></td>
                                              
                                          </tr>
                                      <?php  } ?>
                                            
                              </tbody>
                          </table>
                                     </section>
                                           
          </div>
                              
                          </div>
                  </section>

         </section>
      </section>

