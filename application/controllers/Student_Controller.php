<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Controller extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->model('General_Model');
        $this->load->model('WebAdmin_Model');
        $this->load->model('Main_User_Model');
        $this->load->model('Student_Model');
        $this->load->model('Tutors_Model');
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
        
    
    
    public function Student_Create_Profile()
    {
        if($this->session->userdata('login_email') && !$this->session->userdata('student_id'))
        {
        $login_email =  $this->session->userdata('login_email');
        $login_account_type =  $this->session->userdata('login_account_type');
        
        $data['countries'] = $this->WebAdmin_Model->Countries_List();
        $data['town'] = $this->WebAdmin_Model->Town_List();
                $title = "Create Profile - Courses And Tutors Find best tutors courses students in London and UK.";
          
        $this->header($title);
	$this->load->view('students/std_create_profile_form.php', $data);
        $this->footer();
        
        } else {
        redirect(base_url() . 'MainController/Front_User_Logout');
        }
    }
    
    
    public function Create_Std_Profile_Query()
    {
         
        if($this->session->userdata('login_email'))
        {
        $login_email         = $this->session->userdata('login_email');
        $std_title           = ucwords($this->input->post('std_title'));
        $fname               = ucwords($this->input->post('fname'));
        $lname               = ucwords($this->input->post('lname'));
        $std_gender          = $this->input->post('std_gender');
        $address_line1       = ucwords($this->input->post('address_line1'));
        $std_address_line2   = ucwords($this->input->post('std_address_line2'));
        $town_id             = $this->input->post('town_id');
        $country_id          = $this->input->post('country_id');
        $postcode            = strtoupper($this->input->post('postcode'));
        $std_phone_home      = $this->input->post('std_phone_home');
        $phone_mobile        = $this->input->post('phone_mobile');
        $std_distance_travel = $this->input->post('std_distance_travel');
        $std_personal_stat   = $this->input->post('std_personal_stat');
        $std_availability    =  $this->input->post('std_availability'); 
        $std_create_profile  = $this->input->post('std_create_profile_submit');
        
        
        $maxid = $this->General_Model->find_maxid("student_id", "student_main");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->student_id;
        }
        
        
        $prof_pic = $_FILES['profile_pic']['name'];
        
        
        if($prof_pic != '') 
        {
        $config = array ('upload_path' => './images/students/',
                         'allowed_types' => "jpeg|jpg|png",
                         'overwrite' => TRUE,
                         'file_name' => str_replace(' ','-',$Maxtype."-".$fname."-".$lname)
                        );
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('profile_pic');
        
        $extension = pathinfo($prof_pic);
        $ext = $extension['extension'];
        
        $image = str_replace(' ','-',$config['file_name'].".".$ext);
        
        } else {
        $image = 'no_pic.jpg';  
        $ext = 'jpg';
        }
        
        
        
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG')
        {
        $data  =  array('student_id'          => $Maxtype,
                        'town_id'             => $town_id,
                        'country_id'          => $country_id, 
                        'std_title'           => $std_title,
                        'std_fname'           => $fname,
                        'std_lname'           => $lname,
                        'std_address_line2'   => $std_address_line2,
                        'std_address_line1'   => $address_line1,
                        'std_postcode'        => str_replace(' ','',$postcode),
                        'std_phone_home'      => $std_phone_home,
                        'std_phone_mobile'    => $phone_mobile,
                        'std_distance_travel' => $std_distance_travel,
                        'std_profile_pic'     => $image,
                        'std_personal_stat'   => $std_personal_stat,
                        'std_availability'    => $std_availability,
                        'login_email'         => $login_email,
                        'student_gender'      => $std_gender
                        );
        
        $insert = $this->General_Model->create_record($data, "student_main");
        
        } else {
        $this->session->set_flashdata('msg', 'Please use a valid image format.');
        redirect(base_url() . 'Student_Controller/Student_Create_Profile'); 
        }
        
        
        
        
        if($insert == TRUE)
        {  
          $std_login = $this->Student_Model->Get_Student_Details_Login($login_email);
          
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
        } 
      }  
    }
    
    
            
  public function Student_Panel()
    {
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
              $student_id          =  $this->session->userdata('student_id');
              $login_email         =  $this->session->userdata('login_email');
              $std_fname           =  $this->session->userdata('std_fname');
              $std_lname           =  $this->session->userdata('std_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              
              $std_details['std_details'] = $this->Student_Model->GetStudentDetails($student_id,$login_email);
              
              $std_details['std_subjects'] = $this->Student_Model->GetStudentSubjects($student_id);
              
              $std_details['std_payment'] = $this->Student_Model->get_student_payment_details($student_id);
              
              $std_details['std_feedback'] = $this->Student_Model->get_student_feedbacks($student_id);
              
              $std_details['std_feedback_response'] = $this;
             
              //$std_details['std_messages'] = $this->Student_Model->get_student_messages($student_id);
              
              $std_details['inbox']             = $this->Student_Model->get_student_inbox_msgs($student_id);
              $std_details['send_msgs']         = $this->Student_Model->get_student_send_msgs($student_id);
              
              $std_details['count_unread_msgs'] = $this->Student_Model->count_unread_msgs_for_student($student_id);
              $title = "Student Panel - Find Tutors And Courses IT Web Academics Maths History tuition.";

              $this->header($title);
              $this->load->view('students/student_panel.php',$std_details);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Student_Controller/Student_Logout');
        }
    }
    
    
        /* Get Feedback Response */
    
    public function get_std_feedback_response($feedback_id)
    {
        $feedback_response = $this->General_Model->fetch_CoustomQuery("SELECT fr.`response_description` 
                                                                       FROM `tut_feedback_response` fr JOIN `tutor_feedbacks` tf ON tf.`tut_feedback_id` = fr.`tut_feedback_id`
                                                                       WHERE fr.`tut_feedback_id` = $feedback_id");
        
        $response = "";
        
        foreach ($feedback_response as $fr) { $response = $fr->response_description; }
        
        return $response;
    }

       /** LOG OUT  **/
       
       public function Student_Logout()
       {
        $this->session->unset_userdata(array("login_email"=>"",
                                             "student_id"=>"",
                                             "std_fname"=>"",
                                             "std_lname"=>"",
                                             "login_account_type"=>"")
                                        );
            $this->session->sess_destroy();
            redirect(base_url() . 'index.php');
       }
       
       
       
       
       /** EDIT PROFILE **/
       
       public function Student_Edit_Profile_Form()
       {
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
              $student_id          =  $this->session->userdata('student_id');
              $login_email         =  $this->session->userdata('login_email');
              $std_fname           =  $this->session->userdata('std_fname');
              $std_lname           =  $this->session->userdata('std_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              
                $data['std_details'] = $this->Student_Model->GetStudentDetails($student_id,$login_email);
              
                $data['countries'] = $this->WebAdmin_Model->Countries_List();
                $data['townn'] = $this->WebAdmin_Model->Town_List();
                
                              $title = "Edit Profile Info = Find Tutors Courses Maths IT Science Games Autocad Java.";

            
              $this->header($title);
              $this->load->view('students/student_edit_profile.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Student_Controller/Student_Logout');
        }
       }
       
       
       public function Student_Edit_Profile_Query()
       {
       $student_id   =  $this->session->userdata('student_id');
       $login_email  =  $this->session->userdata('login_email'); 
       
        $fname               = ucwords($this->input->post('fname'));
        $lname               = ucwords($this->input->post('lname'));
        $std_gender          = $this->input->post('std_gender');
        $address_line1       = ucwords($this->input->post('address_line1'));
        $std_address_line2   = ucwords($this->input->post('std_address_line2'));
        $town_id             = $this->input->post('town_id');
        $country_id          = $this->input->post('country_id');
        $postcode            = strtoupper($this->input->post('postcode'));
        $std_phone_home      = $this->input->post('std_phone_home');
        $phone_mobile        = $this->input->post('phone_mobile');
        $std_distance_travel = $this->input->post('std_distance_travel');
        $std_personal_stat   = $this->input->post('std_personal_stat');
        $std_availability    =  $this->input->post('std_availability'); 
        
        
        $profile_img   =  $_FILES['profile_img']['name']; 
        
        if($profile_img == '') {
        $data  =  array('std_fname'           => $fname,
                        'std_lname'           => $lname,
                        'std_address_line2'   => $std_address_line2,
                        'std_address_line1'   => $address_line1,
                        'std_postcode'        => str_replace(' ','',$postcode),
                        'std_phone_home'      => $std_phone_home,
                        'std_phone_mobile'    => $phone_mobile,
                        'std_distance_travel' => $std_distance_travel,
                        'town_id'             => $town_id,
                        'country_id'          => $country_id,                         
                        'std_personal_stat'   => $std_personal_stat,
                        'std_availability'    => $std_availability,
                        'student_gender'      => $std_gender
                        );
        
        $wher = array('student_id' => $student_id);
        $this->General_Model->update_record($data, "student_main", $wher);
        
        $this->session->set_flashdata('msg', 'Profile Updated Successfully.');
        redirect(base_url() . 'student-panel');
        
        } else {
            
        $config = array ('upload_path' => './images/students/',
                         'allowed_types' => "jpeg|jpg|png",
                         'overwrite' => TRUE,
                          'file_name' => str_replace(' ','-',$student_id."-".$fname."-".$lname)
                        );
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('profile_img');
        
        $extension = pathinfo($profile_img);
        $ext = $extension['extension'];
        
        $image = $config['file_name'].".".$ext;
        
        $imagenew = str_replace(' ', '-', $image);
        
        $data  =  array('std_fname'           => $fname,
                        'std_lname'           => $lname,
                        'std_address_line2'   => $std_address_line2,
                        'std_address_line1'   => $address_line1,
                        'std_postcode'        => $postcode,
                        'std_phone_home'      => $std_phone_home,
                        'std_phone_mobile'    => $phone_mobile,
                        'std_distance_travel' => $std_distance_travel,
                        'town_id'             => $town_id,
                        'country_id'          => $country_id,                         
                        'std_personal_stat'   => $std_personal_stat,
                        'std_availability'    => $std_availability,
                        'std_profile_pic'     => $imagenew,
                        'student_gender'      => $std_gender
                        );   
        }
        
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG')
        {
        $wher = array('student_id' => $student_id);
        $this->General_Model->update_record($data, "student_main", $wher);
        
        $this->session->set_flashdata('msg', 'Profile Updated Successfully.');
        redirect(base_url() . 'student-panel');
        
        } else {
            
        $this->session->set_flashdata('msg', 'Please use a valid image format.');
        redirect(base_url() . 'student-panel');
        }
       
       }
       
       
       /** CHANGE PASSWORD **/
       
       public function Student_Change_Password()
       {
       $login_email  =  $this->session->userdata('login_email');    
       $old_pass      = md5($this->input->post('old_pass'));
       $new_pass      = md5($this->input->post('new_pass'));
       
       
       $check = $this->Student_Model->Change_Password($login_email,$old_pass);
       
       foreach($check as $count) {
       $cc = $count->tot;
       }
       
       if($cc > 0)
       {
           
       $data = array('login_password' => $new_pass);
       $wher = array('login_email' => $login_email);
       $this->General_Model->update_record($data, "login", $wher);
       
       $this->session->set_flashdata('msg', 'Password changed successfully. Please login with your new password.');
       redirect(base_url() . 'student-panel');
       
       } else {
           
       $this->session->set_flashdata('msg2', 'Password cannot be changed.');
       redirect(base_url() . 'student-panel');
       }

       }
       
       
       /** ADD / DELETE SUBJECTS FOR STUDENT  **/
       
       public function Student_delete_subject()
       {
       $sub_id = $this->uri->segment(3);
       $wher = array('std_sub_id' => $sub_id);
       $this->General_Model->delete_record('student_subjects', $wher);
       $this->session->set_flashdata('msg', 'Record deleted successfully.');
       redirect(base_url() . 'student-panel');
       }
       
       
       public function Student_Add_Subjects_Form()
       {
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
              $student_id          =  $this->session->userdata('student_id');
              $login_email         =  $this->session->userdata('login_email');
              $std_fname           =  $this->session->userdata('std_fname');
              $std_lname           =  $this->session->userdata('std_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['std_details'] = $this->Student_Model->GetStudentDetails($student_id,$login_email);
              $data['main_subjs']  = $this->Main_User_Model->GetMainSubjects();
              $data['subj_level']  = $this->WebAdmin_Model->SubjectLevel_List();
              $data['sub_subjs']   = $this->WebAdmin_Model->SubCourse_List();
              
                            $title = "Add Subjects Courses - Courses And Tutors find tuition for IT games science maths.";

                            
              $this->header($title);
              $this->load->view('students/add_subject_form.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Student_Controller/Student_Logout');
        }
       }
       
       
       public function Std_Add_Sub_Subjs()
       {
           $idd = $this->input->post('id');
           if(isset($idd)) {
           $query = $this->Main_User_Model->get_subsubjects($idd);
           
           foreach ($query as $q){
               echo "<option value='$q->subs_id'>$q->subs_title</option>";
           }
           } else {
           redirect(base_url() . 'MainController/index');    
           }
       }
       
       
       public function Student_AddSubjuect_Query()
       {
          $subs_id    =  $this->input->post('subs_id'); 
          $sub_level_id    =  $this->input->post('sub_level_id');
          $student_id   =  $this->session->userdata('student_id');
           
        for($i=0; $i<sizeof($sub_level_id);$i++)
         {
          $maxid = $this->General_Model->find_maxid("std_sub_id", "student_subjects");
          foreach ($maxid as $maxid) {
          $Maxtype = $maxid->std_sub_id;
          }
          
          
        $data  =  array('std_sub_id'     => $Maxtype,
                        'subs_id'        => $subs_id,
                        'sub_level_id'   => $sub_level_id[$i], 
                        'student_id'     => $student_id,
                        );
        
         $this->General_Model->create_record($data, "student_subjects");
         }
 
        $this->session->set_flashdata('msg', 'Record added successfully.');
        redirect(base_url() . 'student-panel');   
           
    }

    
    /** VIEW STUDENT PROFILE **/

    public function view_student_profile()
    {
    
    $student_id = $this->uri->segment(3);         
    
    $std_details['std_details'] = $this->Student_Model->view_student_profile($student_id);
    
    $std_details['std_subjects'] = $this->Student_Model->GetStudentSubjects($student_id);

    $std_details['error_msgs'] = '';             
             
    if($this->session->userdata('tutor_id') != NULL)
    {
        $tutor_id = $this->session->userdata('tutor_id');
        $std_details['error_msgs']              = $this->WebAdmin_Model->sending_msgs_error_msg();
        $std_details['is_tutor_verified']       = $this->Tutors_Model->check_is_tutor_verified($tutor_id);
    }
    
        $title = "Student Profile - Find Students Courses Tutors - London best tutors and courses.";

                            
    $this->header($title);
    $this->load->view('students/student_profile.php',$std_details);
    $this->footer();
    }
    
    
    /** Accept Student By Tutor **/
    
    public function accept_student()
    {
    $student_id = $this->input->post('student_id'); 
    $tutor_id   = $this->session->userdata('tutor_id'); 
    
     $maxid = $this->General_Model->find_maxid("accept_id", "tutor_accept_students");
     foreach ($maxid as $maxid) 
     {
     $Maxtype = $maxid->accept_id;
     }
             
      $data  =  array('accept_id'      => $Maxtype,
                      'tutor_id'      => $tutor_id,
                      'student_id'    => $student_id,
                      'accepted_date' => date("Y-m-d"),
                      'status'        => 'ACCEPTED'
                    );
        
    $insert = $this->General_Model->create_record($data, "tutor_accept_students");
    if($insert)
    {
        $this->session->set_flashdata('msg', 'You have accepted the student. The student can now purchase your contact details and give you feedback.');
        redirect(base_url() . 'student/profile/'.$student_id); 
    }
    
    }
    
    
    /** STUDENT SEARCH FORM RESULT **/
   
    public function student_search_result()
    {
        $subs_id  =  $_SESSION['subs_id'];   //$this->session->userdata('subs_id');
        $town_id  =  $_SESSION['town_id'];   //$this->session->userdata('town_id');
        $postcode =  $_SESSION['postcode'];  //$this->session->userdata('postcode');

           
        $result['search_subj'] = $this->WebAdmin_Model->Get_SubSubject_Name($subs_id);
          
        if($postcode != '')
        {
        $result['std_search']         = $this->Student_Model->search_student_with_postcode($postcode,$subs_id); 
        $result['std_search_count']   = $this->Student_Model->search_tutor_with_postcode_count($postcode,$subs_id); 
        } else {
        $result['std_search']         = $this->Student_Model->search_tutor_with_town($town_id,$subs_id);
        $result['std_search_count']   = $this->Student_Model->search_tutor_with_town_count($town_id,$subs_id); 
        }
           
                $title = "Find Students Tutors Tuition Courses Subjects London UK - find best tutors.";
   
        $this->header($title);
        $this->load->view('students/students_search.php',$result);
        //$this->load->view('template/sidebar.php');
        $this->footer();
    
    }
    
    /* INBOX MESSAGES */
    
    public function view_message_details_by_student()
    {
    $tutor_id     = $this->input->post('tutor_id');
    $msg_id       = $this->input->post('msg_id');   
    
    
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
              $student_id          =  $this->session->userdata('student_id');
              $login_email         =  $this->session->userdata('login_email');
              $std_fname           =  $this->session->userdata('std_fname');
              $std_lname           =  $this->session->userdata('std_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data  =  array('is_read' => 'READ');
              $wher = array('msg_id' => $msg_id,'tutor_id' => $tutor_id, 'student_id' => $student_id);
              $this->General_Model->update_record($data, "messages_main", $wher);
              
              
              $data['std_details'] = $this->Student_Model->GetStudentDetails($student_id,$login_email);
              $data['subj_level'] = $this->WebAdmin_Model->SubjectLevel_List();
              
              $data['message_details']  = $this->Student_Model->get_message_details_for_student($msg_id,$student_id,$tutor_id);
              
              $data['message_reply_details']  = $this->Main_User_Model->get_message_reply_details($msg_id);
              
              $data['check_reply']  = $this->Main_User_Model->check_msg_reply($msg_id);
                            
                                          $title = "Message details - find courses contact tutors best tution in london UK.";

              $this->header($title);
              $this->load->view('students/view_message_details_by_student',$data);
              $this->footer();
        }
    }
    
    /* DETAILS OF SEND MESSAGES */
    
    public function view_sent_message_details_by_student()
    {
    $tutor_id     = $this->input->post('tutor_id');
    $msg_id       = $this->input->post('msg_id');   
    
    
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
              $student_id          =  $this->session->userdata('student_id');
              $login_email         =  $this->session->userdata('login_email');
              $std_fname           =  $this->session->userdata('std_fname');
              $std_lname           =  $this->session->userdata('std_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');

              $data['std_details'] = $this->Student_Model->GetStudentDetails($student_id,$login_email);
              $data['subj_level']  = $this->WebAdmin_Model->SubjectLevel_List();
             
              
              $data['message_details']        = $this->Student_Model->get_sent_message_details_for_student($msg_id,$student_id,$tutor_id);
              
              $data['message_reply_details']  = $this->Main_User_Model->get_message_reply_details($msg_id);
              
              $data['check_reply']            = $this->Main_User_Model->check_msg_reply($msg_id);
                                                        $title = "Message details - find courses contact tutors best tution in london UK.";

              $this->header($title);
              $this->load->view('students/view_sent_message_details_by_student',$data);
              $this->footer();
        }    
    }
    
    
    
    public function sent_reply_to_tutor()
    {
    $msg_id          = $this->input->post('msg_id');
    $msg_subject     = $this->input->post('msg_subject');
    $msg_description = $this->input->post('msg_description');
    $tutor_id        = $this->input->post('tutor_id');
    $student_id      = $this->session->userdata('student_id');
    
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
                        'sent_by_student' => 'YES',
                        'sent_by_tutor'   => 'NO',
                        'parent_id'       => $msg_id
                        );
        
        $insert = $this->General_Model->create_record($data, "messages_main");
        if($insert)
        {
         
        //** Sent Email to tutor **//
        redirect(base_url() . 'Emails/sent_email_to_tutor/'.$tutor_id.'/'.$student_id);
         
        //$this->session->set_flashdata('msg', 'Message Sent Successfully to Tutor.');
        //redirect(base_url() . 'student-panel');   
        }    
    }
    
    
    public function update_reply_message_by_student()
    {
    $msg_id       = $this->input->post('msg_id');  
    $tutor_id        = $this->input->post('tutor_id');
    $student_id      = $this->session->userdata('student_id');
      
    $reply_description = $this->input->post('reply_description'); 
    
    $data  =  array('msg_description' => $reply_description,'date_time'   => date("Y-m-d"));
    
    $wher = array('parent_id' => $msg_id,
                  'student_id' => $student_id,
                  'tutor_id' => $tutor_id,
                  'sent_by_student' => 'YES',
                  'sent_by_tutor'   => 'NO');
    
    $this->General_Model->update_record($data, "messages_main", $wher);
    
    $this->session->set_flashdata('msg', 'Message Successfully Updated.');
    
    redirect(base_url() . 'student-panel');   
    }
    
    
    
}