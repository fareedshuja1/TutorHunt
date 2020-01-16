 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
              
              
              
              <!--state overview start-->
                  
              <?php if ($this->session->userdata('admin_id')) { ?>
              
                  
             <!--Students Count Start-->
            
              <div class="row state-overview">
                  
                  
                  <div class="col-lg-3 col-sm-6">
                   <section class="panel">
                    <div class="symbol terques">
                     <i class="fa fa-users"></i>
                      </div>
                       <div class="value">
                        <h1 class="">
                         <?php foreach($tot_students as $tot_students) echo $tot_students->stdtotal; ?>
                        </h1>
                        <p>Total Active Students</p>
                          </div>
                      </section>
                  </div>
                  
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-male"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                            <?php foreach($tot_students_today as $tot_students_today) echo $tot_students_today->stdtotal_today; ?>
                              </h1>
                              <p>Students Registered Today.</p>
                          </div>
                      </section>
                  </div>
                                    
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-calendar-o"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                                  <!-- Students registered in this month -->
                              <?php foreach($tot_students_this_month  as $tot_students_this_month ) echo $tot_students_this_month->stdtotal_this_month; ?>  
                              </h1>
                              <p>Students Registered This Month </p>
                          </div>
                      </section>
                  </div>
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-calendar"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <!-- Students registered last month, excluding records of this month. -->
                              <?php foreach($tot_students_last_month  as $tot_students_last_month ) echo $tot_students_last_month ->stdtotal_month; ?>  
                              </h1>
                              <p>Students Registered Last Month</p>
                          </div>
                      </section>
                  </div>
                  
              </div>
                               
              <!--Tutors Count End-->
              
                                
             <!-- Tutors Count Start-->
             
              <div class="row state-overview">
               <div class="col-lg-3 col-sm-6">
                <section class="panel">
                 <div class="symbol terques">
                  <i class="fa fa-users"></i>
                 </div>
                 <div class="value">
                 <h1 class=""><?php foreach($tot_tutors as $tot_tutors) echo $tot_tutors->tuttotal; ?></h1>
                 <p>Total Active Tutors</p>
                 </div>
                </section>
               </div>
              
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-male"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php foreach($tot_tutors_today as $tot_tutors_today) echo $tot_tutors_today->tuttotal_today; ?></h1>
                              <p>Tutors Registered Today.</p>
                          </div>
                      </section>
                  </div>
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-calendar-o"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <h1 class=""><?php foreach($tot_tutors_this_month as $tot_tutors_this_month) echo $tot_tutors_this_month->tuttotal_this_month; ?></h1>
                              </h1>
                              <p>Tutors Registered This Month</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-calendar"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <h1 class=""><?php foreach($tot_tutors_last_month as $tot_tutors_last_month) echo $tot_tutors_last_month->tuttotal_last_month; ?></h1>
                              </h1>
                              <p>Tutors Registered Last Month</p>
                          </div>
                      </section>
                  </div>
                  
              </div>
             
              <!--Tutors Count End-->
             
              
                  
              
              

                  
              <?php } else { redirect(base_url() . 'WebAdmin/admin_login'); } ?>
              
              <!--state overview end-->

              
              


          </section>
      </section>
      <!--main content end-->
 