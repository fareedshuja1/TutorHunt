      
   <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="<?= base_url();?>WebAdmin/webadministrator">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>USER MANAGEMENT</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/add_user_form">ADD / VIEW USER</a></li>
                      </ul>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>COURSES</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/add_main_course_form">MAIN COURSES</a></li>
                      </ul>
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/add_sub_course_form">SUB COURSES</a></li>
                      </ul>
                  </li>
                  
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>STUDENTS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/view_all_students">VIEW ALL STUDENTS</a></li>
                      </ul>
                      
                  </li>
                                    
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>TUTORS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/view_all_tutors">VIEW ALL TUTORS</a></li>
                      </ul>
                      
                  </li>
                  
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>GENERAL SETTINGS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/add_country">ADD / VIEW COUNTRIES</a></li>
                      </ul>
                      
                      <ul class="sub">
                          <li><a  href="<?= base_url();?>WebAdmin/add_town">ADD / VIEW TOWNS</a></li>
                      </ul>
                      
                       <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/edit_profile">EDIT PROFILE</a></li>
                      </ul>
                      
                     <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/add_subject_level">ADD / VIEW SUBJECT LEVELS</a></li>
                      </ul>

                                            
                     <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/add_qual_level">QUALIFICATION LEVEL</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/restricted_words_form">RESTRICTED WORDS</a></li>
                      </ul>
                      
                         <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/advertisements_form">ADVERTISEMENTS</a></li>
                      </ul>
                      
                  </li>
                  
                  <li class="sub-menu">
                      
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>WARNING MESSAGES</span>
                      </a>   
                                            
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/unverified_tutor_error_msg">UNVERIFIED TUTORS</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/sending_msgs_error_msg">SENDING MESSAGES</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/warning_msg_paypal_payment">PAYPAL PAYMENT</a></li>
                      </ul>
                      
                  </li>
                  
                                                      
                  <li class="sub-menu">
                      
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>PAGES</span>
                      </a>   
                            
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>Pages/view_home_page_content">HOME PAGE</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>Pages/view_faqs_page_content">FAQs PAGE</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a href="<?= base_url();?>Pages/view_contact_page_content">CONTACT_US PAGE</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a href="<?= base_url();?>Pages/view_resources_page_content">RESOURCES PAGE</a></li>
                      </ul>
                      
                      
                  </li>
                  
                                    
                  <li class="sub-menu">
                      
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>MESSAGES</span>
                      </a>   
                            
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/view_all_msgs">VIEW ALL MESSAGES</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/view_all_msgs_sent_by_students">SENT BY STUDENTS</a></li>
                      </ul>
                      
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/view_all_msgs_sent_by_tutors"">SENT BY TUTORS</a></li>
                      </ul>
                      
                  </li>
                  
                   <li class="sub-menu">
                      
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>ACCOUNT / PAYMENTS</span>
                      </a>   
                            
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/view_all_payments">VIEW ALL PAYMENTS</a></li>
                      </ul>
                      
                       <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/paypal_settings_form">PAYPAL SETTINGS</a></li>
                      </ul>
                      
                      
                     
                  </li>
                  
                   <li class="sub-menu">
                      
                      <a href="javascript:;" >
                          <i class="fa fa-arrow-circle-down"></i>
                          <span>BLOGS</span>
                      </a>   
                            
                      <ul class="sub">
                      <li><a  href="<?= base_url();?>WebAdmin/add_blog_form">ADD / VIEW BLOGS</a></li>
                      </ul>
                     
                  </li>
                  
                  
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->