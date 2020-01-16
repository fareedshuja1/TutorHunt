<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
    
    
        public function __construct() {
        parent::__construct();
        $this->load->model('General_Model');
        $this->load->model('Main_User_Model');
        $this->load->model('Student_Model');
        $this->load->model('Tutors_Model');
        $this->load->model('WebAdmin_Model');
        } 
        
    public function header($title='') {
        
        $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
        $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
        $data['town_list'] = $this->WebAdmin_Model->Town_List();
                
        $data['title'] = $title;
        
        $this->load->view('template/header_main.php',$data);
    }

    public function footer() {
        
          $data['restwords'] = $this->WebAdmin_Model->restricted_words();
        $data['blogs'] = $this->WebAdmin_Model->view_blogs();
        
        $this->load->view('template/footer.php',$data);
    }
    
    public function sidebar()
    {
    $data['adds'] = $this->WebAdmin_Model->get_all_ads();
    $this->load->view('template/sidebar.php',$data);    
    }


    public function index()
	{
            $data['tot_stds'] = $this->General_Model->Count_Total_Students();
            
            $data['tot_tuts'] = $this->General_Model->Count_Total_Tutor();  
                                            
            $data['content'] = $this->WebAdmin_Model->view_home_page_content();

                   $title = "Courses And Tutors London - find tutors in london, find maths tutors, physics tutors, english tutors, php tutors, autocad tutors, architecture tutors";
                   
                $this->header($title);                
                $this->load->view('template/banner.php', $data);
		$this->load->view('index.php');
                $this->sidebar();
                $this->footer();
	}
        
        
        public function RegistrationForm()
        {
                            $title = "SignUp - Find the best tutors in UK for your selected subjects. Find tutors for maths, architecture, autocad, programming, php, java, ms office, python, ruby.";

                $this->header($title);
		$this->load->view('registration_form.php');
                $this->sidebar();
                $this->footer();
        }
        
        
        
        public function LoginForm()
        {
                $title = "Login - Courses and Tutors, find tutors in london, find tutors in birmingham, find tutors in manchester, find tutors in sheffield, find tutors in wales, find tutors in bradford.";

                $this->header($title);
		$this->load->view('login_form.php');
                $this->footer();
        }


        public function SignUp_User_Query()
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $confirm_password = $this->input->post('confirm_password');
            $account_type = $this->input->post('account_type');
            
            $check_email = $this->Main_User_Model->Check_User_Email($email);
            foreach ($check_email as $record) {
            $tot_record = $record->tot;
            }
            
            if($tot_record > 0)
            {
            $this->session->set_flashdata('msg', 'The email address already exists.');
            redirect(base_url() . 'signup'); 
            } else {

                
            $data = array('login_email' => $email,
                          'login_password' => $password,
                          'login_account_type' => $account_type,
                          'login_account_status' => 'INACTIVE',
                          'account_created_date' => date("Y-m-d")
                    );
            
           $this->General_Model->create_record($data, "login");
           redirect(base_url() . 'Emails/Sent_Confirmation_Email/'.$email.'/'.$account_type);
                
            }
        }
        
        
        /*** USER LOGIN ***/
        
        public function User_Login()
        {
            $user_email = $this->input->post('user_email');
            $user_password = md5($this->input->post('user_password'));
            
            $check_user = $this->Main_User_Model->Check_User($user_email, $user_password);
            
            foreach ($check_user as $check_user)
            {
                $tot = $check_user->tot;
            }
            
                        if($tot > 0)
                        {
                                /* this checks if the user is Student or Tutor */

                                $is_tutor_or_student = $this->Main_User_Model->Chk_Tutor_Or_Student($user_email);
                                foreach($is_tutor_or_student as $chk)
                                {
                                  $user_type = $chk->login_account_type;
                                }

                                /* IF STUDENT, DO THIS */
                                if($user_type == 'STUDENT')
                                {
                                $this->Student_Login($user_email);
                                } 


                                /* IF TUTOR, DO THIS */

                                if($user_type == 'TUTOR')
                                {
                                $this->Tutor_Login($user_email);
                                }                

                        } else {
                        $this->session->set_flashdata('msg', 'Invalid Email or Password. Please try again.');
                        redirect(base_url() . 'login-form');
                        }
        }
        
        
        ////////////////////////  CREATE SESSION - STUDENT LOGIN FUNCTIONS   ////////////////////////
                        
        public function Student_Login($user_email)
        {   
                            
        $std_profile_true = $this->Student_Model->Check_Student_Profile_Exists($user_email);
        
        foreach($std_profile_true as $spt)
        {
            $is_profile_created = $spt->tot;
        }
            
            if($is_profile_created > 0)
            {
                $std_login = $this->Student_Model->Get_Student_Details_Login($user_email);

                $newdata = array('student_id'          => $std_login['student_id'],
                                 'login_email'         => $std_login['login_email'],
                                 'std_fname'           => $std_login['std_fname'],
                                 'std_lname'           => $std_login['std_lname'],
                                 'login_account_type'  => $std_login['login_account_type']
                       ); 

                       $this->session->set_userdata($newdata);

                       $this->session->userdata('student_id');
                       $this->session->userdata('login_email');
                       $this->session->userdata('std_fname');
                       $this->session->userdata('std_lname');
                       $this->session->userdata('login_account_type');

                       redirect(base_url() . 'student-panel');
           
            } else {
                       $get_email = $this->Student_Model->Get_Student_Email($user_email);
                       
                       $newdata2 = array('login_email'       => $get_email['login_email'],
                                         'login_account_type' => $get_email['login_account_type']
                       );

                       $this->session->set_userdata($newdata2);

                       $this->session->userdata('login_email');
                       $this->session->userdata('login_account_type');

                       redirect(base_url() . 'student-signup');
            }
        }
        

        public function EConfirmationPage()
        {
            
                    $title = "Email Confirmation - Courses And Tutors. find maths tutors, chemistry tutors, physics tutors, art tutors, music tutors, private tuitions, teaching, private tutors.";

            
        $emailid  = $this->uri->segment(3);
                
        $this->header($title);
	$this->load->view('EmailConfirmationPage.php');
        $this->footer();
        }
        

        public function Login_Form()
        {
                    $title = "Login - Find the best tutors in UK find tutors for art, programming, dancing, singing, accountring, history, business studies, drama, economics.";

        $this->header($title);
	$this->load->view('login_form.php');
        $this->footer();
        }        
        
        
        public function Confirm_Activation()
        {
        $emailid  = $this->uri->segment(3);
        
        $this->Main_User_Model->Confirm_User_Activation($emailid);
        
        $this->session->set_flashdata('msg', 'Your email ' . $emailid .'.  has been verified. Now you can signin.');
        redirect(base_url() . 'login-form');
        }
        
        
        

       ////////////////////////  CREATE SESSION - TUTOR LOGIN FUNCTIONS   ////////////////////////
        
        
       public function Tutor_Login($user_email)
       {
        
        /** It checks if the tutor has created profile or not. **/
           
        $tut_profile_true = $this->Tutors_Model->Check_Tutors_Profile_Exists($user_email);
        
        foreach($tut_profile_true as $spt)
        {
        $is_profile_created = $spt->tot;
        }
            
            if($is_profile_created > 0)
            {
                /** If Tutor has created profile, take him directly to the dashboard. **/
                
                $tut_login = $this->Tutors_Model->Get_Tutor_Details_Login($user_email);

                $newdata = array('tutor_id'            => $tut_login['tutor_id'],
                                 'login_email'         => $tut_login['login_email'],
                                 'tut_fname'           => $tut_login['tut_fname'],
                                 'tut_lname'           => $tut_login['tut_lname'],
                                 'login_account_type'  => $tut_login['login_account_type']
                       ); 

                       $this->session->set_userdata($newdata);

                       $this->session->userdata('tutor_id');
                       $this->session->userdata('login_email');
                       $this->session->userdata('tut_fname');
                       $this->session->userdata('tut_lname');
                       $this->session->userdata('login_account_type');

                       redirect(base_url() . 'tutor-panel');
           
            } else {
                
                    /** If Tutor has not created profile, take him to the create profile page. **/
                
                       $get_email = $this->Tutors_Model->Get_Tutor_Email($user_email);
                       
                       $newdata2 = array('login_email'       => $get_email['login_email'],
                                         'login_account_type' => $get_email['login_account_type']
                       );

                       $this->session->set_userdata($newdata2);

                       $this->session->userdata('login_email');
                       $this->session->userdata('login_account_type');

                       redirect(base_url() . 'tutor-signup');
            }
       }
       
       
       public function Front_User_Logout()
       {
        $this->session->unset_userdata(array("login_email"=>"",
                                             "login_account_type"=>"")
                                      );
            $this->session->sess_destroy();
            redirect(base_url() . 'index.php');
       }
       
       
       /** Main Search Form Result Functions **/
       
       public function main_search_form_result()
       {
           
       $subs_id                   = $this->input->post('subs_id'); 
       $town_id                   = $this->input->post('town_id'); 
       $search_account_type       = $this->input->post('search_account_type'); 
       $postcode                  = strtoupper($this->input->post('postcode'));
       
       $data = array("subs_id"    =>$subs_id,
                     "town_id"    =>$town_id,
                     "postcode"   =>str_replace(' ','',$postcode)
                    );
       
       /* Save form values in session and sent it to another function. */
       $this->session->set_userdata($data);
              
       
       if($search_account_type == 'SEARCH_TUTOR')
       {
        redirect(base_url() . 'tutor/search-result',$data);   
       } 
       
       if($search_account_type == 'SEARCH_STUDENT')
       {
        redirect(base_url() . 'student/search-result',$data);   
       } 
       
    }
    
    
    //** Messages Sent from Student to Tutor. **//
    
    public function msg_from_std_tutor()
    {
         $msg_subject     = $this->input->post('msg_subject');
         $msg_description = $this->input->post('msg_description');
         $tutor_id        = $this->input->post('tutor_id');
         
        if($this->session->userdata('student_id'))
        {
                $student_id = $this->session->userdata('student_id');
                
                $maxid = $this->General_Model->find_maxid("msg_id", "messages_main");
                foreach ($maxid as $maxid) {
                $Maxtype = $maxid->msg_id;
                }
                
        $data  =  array('msg_id'      => $Maxtype,
                        'student_id'  => $this->session->userdata('student_id'),
                        'tutor_id'    => $tutor_id, 
                        'msg_description' => $msg_description,
                        'msg_subject'     => $msg_subject,
                        'date_time'       => date("Y-m-d"),
                        'is_read'         => 'UNREAD',
                        'sent_by_student' => 'YES',
                        'sent_by_tutor'   => 'NO',
                        'parent_id'       => 0
                        );
        
        $insert = $this->General_Model->create_record($data, "messages_main");
       
        
        if($insert)
        {
       
        //** Sent Email to tutor **//
        redirect(base_url() . 'Emails/sent_email_to_tutor/'.$tutor_id.'/'.$student_id);

        //$this->session->set_flashdata('msg', 'Message Successfully sent to tutor.');
        //redirect(base_url() . 'Tutor_Controller/Tutor_Profile/'.$tutor_id); 
               
        }
        }
    }
    
    
    // Sent Reply
    
    
    public function reply_sent_message()
    {
    $msg_id          = $this->input->post('msg_id');
    $msg_subject     = $this->input->post('msg_subject');
    $msg_description = $this->input->post('msg_description');
    $tutor_id        = $this->session->userdata('tutor_id');
    $student_id      = $this->input->post('student_id');
    
                $maxid = $this->General_Model->find_maxid("msg_id", "messages_main");
                foreach ($maxid as $maxid) {
                $Maxtype = $maxid->msg_id;
                }
             
        $data  =  array('msg_id'          => $Maxtype,
                        'student_id'      => $student_id,
                        'tutor_id'        => $tutor_id, 
                        'msg_description' => $msg_description,
                        'msg_subject'     => $msg_subject,
                        'date_time'       => date("Y-m-d"),
                        'is_read'         => 'UNREAD',
                        'sent_by_student' => 'NO',
                        'sent_by_tutor'   => 'YES',
                        'parent_id'       => $msg_id
                        );
        
        $insert = $this->General_Model->create_record($data, "messages_main");
        if($insert)
        {
        $this->session->set_flashdata('msg', 'Message Sent Successfully to Student.');
        redirect(base_url() . 'tutor-panel'); 
        }
    }



    public function view_message_details()
    {
    $tutor_id     = $this->input->post('tutor_id');
    $student_id   = $this->input->post('student_id');
    $msg_id       = $this->input->post('msg_id');
    
    
     if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data  =  array('is_read' => 'READ');
              $wher = array('msg_id' => $msg_id,'tutor_id' => $tutor_id);
              $this->General_Model->update_record($data, "messages_main", $wher);
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $data['subj_level']  = $this->WebAdmin_Model->SubjectLevel_List();
              
              $data['message_details']  = $this->Main_User_Model->get_message_details_for_tutor($msg_id,$student_id,$tutor_id);
              
              $data['message_reply_details']  = $this->Main_User_Model->get_message_reply_details($msg_id);
              
              $data['check_reply']  = $this->Main_User_Model->check_msg_reply($msg_id);
                            $title = "Message Details - Courses And Tutors find best tutors courses IT Arts Science London.";
                           
              $this->header($title);
              $this->load->view('tutors/view_message_details',$data);
              $this->footer();
              
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    //** Update Reply Message **//
    
    public function update_reply_sent_message_by_tutor()
    {
    $msg_id    = $this->input->post('msg_id');  
    $student_id   = $this->input->post('student_id');
    $tutor_id        = $this->session->userdata('tutor_id');
      
    $reply_description = $this->input->post('reply_description'); 
    
    $data  =  array('msg_description' => $reply_description,'date_time'   => date("Y-m-d"));
    
    $wher = array('parent_id' => $msg_id,
                  'student_id' => $student_id,
                  'tutor_id' => $tutor_id,
                  'sent_by_student' => 'NO',
                  'sent_by_tutor'   => 'YES');
    
    $this->General_Model->update_record($data, "messages_main", $wher);
    
    $this->session->set_flashdata('msg', 'Message Successfully Updated.');
    
    redirect(base_url() . 'tutor-panel'); 
        
    }
    
    
    //** Message From Tutor to Student **//
    
    public function msg_from_tutor_to_student()
    {
        
         $msg_subject     = $this->input->post('msg_subject');
         $msg_description = $this->input->post('msg_description');
         $student_id      = $this->input->post('student_id');
         
        if($this->session->userdata('tutor_id'))
        {
            
                $maxid = $this->General_Model->find_maxid("msg_id", "messages_main");
                foreach ($maxid as $maxid) {
                $Maxtype = $maxid->msg_id;
                }
                
        $data  =  array('msg_id'      => $Maxtype,
                        'student_id'  => $student_id,
                        'tutor_id'    => $this->session->userdata('tutor_id'), 
                        'msg_description' => $msg_description,
                        'msg_subject'     => $msg_subject,
                        'date_time'       => date("Y-m-d"),
                        'is_read'         => 'UNREAD',
                        'sent_by_student' => 'NO',
                        'sent_by_tutor'   => 'YES',
                        'parent_id'       => 0
                        );
        
        $insert = $this->General_Model->create_record($data, "messages_main");
        if($insert)
        {
        $this->session->set_flashdata('msg', 'Message Successfully sent to student.');
        redirect(base_url() . 'student/profile/'.$student_id); 
        }
        }   
    }
    
    
    //** Forget Password **//
    
    
    public function forget_password_form()
    {
        $title = "Forget Password - Courses And Tutors Find the best tutors for business studies, project management, accounting, economics, architecture, construction, java, python.";

    $this->header($title);
    $this->load->view('forget_password/forget_password_form.php');
    $this->footer();    
    }
    
    public function reset_password_link()
    {
            $title = "Reset Password - Courses And Tutors London - PHP Web 3dsMax Training Tutors Courses.";

    $this->header($title);
    
    $emailid  = $this->uri->segment(3);
    
    $data = array('user_email' => $emailid);
    
    $this->load->view('forget_password/reset_password_link.php',$data);
    
    $this->footer();     
    }
    
    public function reset_password_confirmation()
    {
        $emailid  = $this->uri->segment(3);
                $title = "Password Changed - Courses And Tutors London - PHP, PYTHON, JAVA, C-SHARP Training Tutors Courses.";

        $this->header($title);
	$this->load->view('forget_password/reset_password_confirmation.php');
        $this->footer();    
    }
    
    public function reset_password_query()
    {
        $login_email   =  $this->input->post('login_email');
        $new_pass      =  md5($this->input->post('password'));
        
        $data  =  array('login_password' => $new_pass);
    
        $wher = array('login_email' => $login_email);
    
        $this->General_Model->update_record($data, "login", $wher);
        
        $this->session->set_flashdata('msg', 'Your password has been reseted. Please Login with your new password.');
        redirect(base_url() . 'login-form');
        
    }
    
    
    public function advert_details()
    {
     $addid  = $this->uri->segment(3);   
     
     $data['result'] = $this->WebAdmin_Model->get_ad_details($addid);
     
     $data['tot_stds'] = $this->General_Model->Count_Total_Students();
     $data['tot_tuts'] = $this->General_Model->Count_Total_Tutor();  
         $title = "Advertise with Us - Courses And Tutors London Find best tutors and courses in UK.";

     $this->header($title);                
     $this->load->view('template/banner.php', $data);
     $this->load->view('add_detail.php',$data);
     
     $this->footer();
    }
    
    
    public function browse_all_subjects()
    {
 
     $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
     $data['sub_subjs'] =  $this->Main_User_Model->get_subsubjects(2);
     
     $title = "Courses And Tutors London Birmingham, Sheffield, Find best tutors and courses all around the UK.";

                    
     $this->header($title); 
     
     $this->load->view('all_subjects.php',$data);
     $this->sidebar();
     $this->footer();   
    }
    
    public function getsubsubjects()
    {
    $idd = $this->input->post('id');
           
    if(isset($idd)) {
    $query = $this->Main_User_Model->get_subsubjects($idd);
               
                         echo '<div class="col-sm-6"><ul class="filter-list">';
                         $i = 0;
                         foreach($query as $i=>$ss)
                         {
                         if($i> 0 && $i % 5 == 0) { 
                         echo '</ul></div><div class="col-sm-6"><ul class="filter-list">';
                         }
                         echo "<li><a href=".base_url()."search-by-subject/$ss->subs_id>$ss->subs_title </a></li>";
                         }
			 echo "</ul></div>";
    
    }
    }
    
    /*** ***/
    
    public function browse_locations()
    {
     $title = "Courses And Tutors - find tutors in london, birmingham, manchester, liverpool, chelsea, shaffield, wales, bradford.";                    
     $this->header($title); 
     
     $data['town_list'] = $this->WebAdmin_Model->Town_List();
     
     $this->load->view('all_locations.php',$data);
     $this->sidebar();
     $this->footer();      
    }
   
    
   
    
   
    
}


