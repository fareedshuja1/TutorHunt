<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor_Controller extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->model('General_Model');
        $this->load->model('WebAdmin_Model');
        $this->load->model('Main_User_Model');
        $this->load->model('Student_Model');
        $this->load->model('Tutors_Model');
        $this->load->library('upload');
        
        if( ! ini_get('date.timezone') )
        {
        date_default_timezone_set('GMT');
        }  
        
        $config = Array('protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'faridshuja1@gmail.com',
                        'smtp_pass' => 'intel91555',
                        'charset' => 'iso-8859-1',
                        'mailtype' => 'html',
                        'wordwrap' => TRUE);
        
        $this->load->library('email',$config);
        
 

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
       
    
    public function Tutor_Create_Profile()
    {
    if($this->session->userdata('login_email') && !$this->session->userdata('tutor_id'))
    {
        $login_email =  $this->session->userdata('login_email');
        $login_account_type=  $this->session->userdata('login_account_type');
             
        $data['countries'] = $this->WebAdmin_Model->Countries_List();
        $data['town'] = $this->WebAdmin_Model->Town_List();
        $title = "Create Profile - Courses And Tutors Find Courses Tutors Students Subject London UK";      
        $this->header($title);
    	$this->load->view('tutors/tut_create_profile_form.php', $data);
        $this->footer();
             
    } else {
        redirect(base_url() . 'MainController/Front_User_Logout');
    }
}




       /** LOG OUT  **/
       
       public function Tutor_Logout()
       {
        $this->session->unset_userdata(array("login_email"=>"",
                                             "tutor_id"=>"",
                                             "tut_lname"=>"",
                                             "tut_fname"=>"",
                                             "login_account_type"=>"")
                                        );
            $this->session->sess_destroy();
            redirect(base_url() . 'index.php');
       }
       
       
       /** Create Tutor Profile Query **/
    
      public function Create_Tut_Profile_Query()
      {
         if($this->session->userdata('login_email'))
        {
        $login_email         = $this->session->userdata('login_email');
        $tut_title           = ucwords($this->input->post('tut_title'));
        $fname               = ucwords($this->input->post('fname'));
        $lname               = ucwords($this->input->post('lname'));
        $tut_gender          = $this->input->post('tut_gender');
        $address_line1       = ucwords($this->input->post('address_line1'));
        $tut_address_line2   = ucwords($this->input->post('tut_address_line2'));
        $town_id             = $this->input->post('town_id');
        //$country_id          = $this->input->post('country_id');
        $country_id          = 1;
        $postcode            = strtoupper($this->input->post('postcode'));
        $tut_phone_home      = $this->input->post('tut_phone_home');
        $phone_mobile        = $this->input->post('phone_mobile');
        $tut_distance_travel = $this->input->post('tut_distance_travel');
        $tut_personal_stat   = $this->input->post('tut_personal_stat');
        $tut_availability    =  $this->input->post('tut_availability'); 
        $tut_create_profile  = $this->input->post('tut_create_profile_submit');
        $tut_skype           =  $this->input->post('tut_skype');
        
        $maxid = $this->General_Model->find_maxid("tutor_id", "tutor_main");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->tutor_id;
        }
        

        /** UPLOAD PROFILE IMAGE **/
        
        //$this->load->library('upload');

        
        $prof_pic = $_FILES['profile_pic']['name'];
        
        if($prof_pic != '') 
        {
        $extension = pathinfo($prof_pic);
        $ext = $extension['extension'];
        } else {
        $image = 'no_pic.jpg';  
        $ext = 'jpg';
        }
        
        
        //$tut_ver_docs = $_FILES['tut_ver_docs']['name'];
        //$extension2 = pathinfo($tut_ver_docs);
        //$ext2 = $extension2['extension'];


        
     if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG')
     {
         
            /** UPLOAD PROFILE IMAGE **/
            $config = array ('upload_path' => './images/tutors/',
                             'allowed_types' => "jpeg|jpg|png",
                             'overwrite' => TRUE,
                             'file_name' => str_replace(' ','-',$Maxtype."-".$fname."-".$lname)
                            );

            $this->upload->initialize($config);
            $this->upload->do_upload('profile_pic');
            
            if($prof_pic != '') {
            $image = str_replace(' ','-',$config['file_name'].".".$ext); 
            }else {
            $image = 'no_pic.jpg';  
            }
            
            
            /** UPLOAD VERIFICATION DOCUMENT **/
            //$new_config = array ('upload_path' => './emp_verification_documents/',
            //                     'allowed_types' => "jpeg|jpg|png",
            //                     'overwrite' => TRUE,
            //                     'file_name' => str_replace(' ','-',$Maxtype."-Ver-".$fname."-".$lname)
            //                    );
        

            //$this->upload->initialize($new_config);
            //$this->upload->do_upload('tut_ver_docs');
            //$image2 = str_replace(' ','-',$new_config['file_name'].".".$ext2);
            
            
        /** INSERT DATA INTO DATABASE **/    
        $data  =  array('tutor_id'            => $Maxtype,
                        'town_id'             => $town_id,
                        'country_id'          => $country_id, 
                        'tut_title'           => $tut_title,
                        'tut_fname'           => $fname,
                        'tut_lname'           => $lname,
                        'tut_address_line2'   => $tut_address_line2,
                        'tut_address_line1'   => $address_line1,
                        'tut_postcode'        => str_replace(' ','',$postcode),
                        'tut_phone_home'      => $tut_phone_home,
                        'tut_phone_mobile'    => $phone_mobile,
                        'tut_distance_travel' => $tut_distance_travel,
                        'tut_profile_pic'     => $image,
                       //'tut_ver_docs'        => $image2,
                        'tut_personal_stat'   => $tut_personal_stat,
                        'tut_availability'    => $tut_availability,
                        'login_email'         => $login_email,
                        'tut_gender'          => $tut_gender,
                        'tut_skype'           => $tut_skype,
                        'is_verified'         => 'NO'
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_main");
        
     }  else {
        
         $this->session->set_flashdata('msg', 'Profile picture should be in a valid image format like JPG, JPEG, or PNG.');
         redirect(base_url() . 'tutor-signup'); 
     }
        
        if($insert == TRUE)
        {  
          $tut_login = $this->Tutors_Model->Get_Tutor_Details_Login($login_email);
          
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
          
         // Sent a notification email to info@coursesandtutors.co.uk 
         $this->notify_admin_email($this->session->userdata('tutor_id'), $this->session->userdata('tut_fname'), $this->session->userdata('tut_lname'),$this->session->userdata('login_email'));
         
        } 
     }
      }
  


  /** Tutor Panel **/  
  
    public function Tutor_Panel()
    {
        if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $tut_details['tut_details']  = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $tut_details['tut_subjects'] = $this->Tutors_Model->GetTutorsSubjects($tutor_id);
              $tut_details['tut_qualification'] = $this->Tutors_Model->GetTutor_Qualification($tutor_id);
              $tut_details['tut_experience'] = $this->Tutors_Model->GetTutor_Experience($tutor_id);
              $tut_details['tut_reference'] = $this->Tutors_Model->GetTutor_Reference($tutor_id);
              $tut_details['acc_error_msg'] = $this->WebAdmin_Model->Unverified_Tutor_Error_Message();
              
              /* Tutor Feedbacks */
              $tut_details['tut_feedback']       = $this->Tutors_Model->get_tutor_feedbacks($tutor_id);
              $tut_details['tut_feedback_count'] = $this->Tutors_Model->get_tutor_feedbacks_count($tutor_id);
              
              $tut_details['tut_feedback_response'] = $this;

              
              //$tut_details['tut_messages'] = $this->Tutors_Model->get_tutor_messages($tutor_id);
              
              $tut_details['inbox']             = $this->Tutors_Model->get_tutor_inbox_msgs($tutor_id);
              $tut_details['send_msgs']         = $this->Tutors_Model->get_tutor_send_msgs($tutor_id);
              
              $tut_details['count_unread_msgs'] = $this->Tutors_Model->count_unread_msgs_for_tutor($tutor_id);
                            
              $tut_details['tut_payment'] = $this->Tutors_Model->get_tutor_payment_details($tutor_id);
              
              $tut_details['tut_payment_count'] = $this->Tutors_Model->get_tutor_payment_count($tutor_id);
              $title = "Tutor Panel - Courses And Tutors find courses tuition tutors students in London UK.";
              $this->header($title);              
              $this->load->view('tutors/tutor_panel.php',$tut_details);
              $this->footer();
             
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }      
    
    
    /** ADD / VIEW / DELETE SUBJECTS **/
    
    public function Tutor_Add_Subjects_Form()
    {
     if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $data['main_subjs']  = $this->Main_User_Model->GetMainSubjects();
              $data['subj_level']  = $this->WebAdmin_Model->SubjectLevel_List();
              
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs']  = $this->WebAdmin_Model->SubCourse_List();
              
              $title = "Add Subjects Tutors - find best tution tutor student courses in london uk.";            
              $this->header($title);
              $this->load->view('tutors/tut_add_subject_form.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function tutor_addSubjuect_query()
    {
          $subs_id          =  $this->input->post('subs_id'); 
          $sub_level_id     =  $this->input->post('sub_level_id');
          $tut_sub_notes    =  $this->input->post('tut_sub_notes'); 
          $tutor_id         =  $this->session->userdata('tutor_id');
          $rate_per_hour    =  $this->input->post('rate_per_hour');
           
          
        
        for($i=0; $i<sizeof($sub_level_id);$i++)
        {
            
        $maxid = $this->General_Model->find_maxid("tut_sub_id", "tutor_subjects");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->tut_sub_id;
        }
          
          
        $data  =  array('tut_sub_id'     => $Maxtype,
                        'subs_id'        => $subs_id,
                        'sub_level_id'   => $sub_level_id[$i], 
                        'tut_sub_notes'  => $tut_sub_notes,
                        'tutor_id'     => $tutor_id,
                        'rate_per_hour'  => $rate_per_hour
                        );
        
        $this->General_Model->create_record($data, "tutor_subjects");
        }
          
        $this->session->set_flashdata('msg', 'Record added successfully.');
        redirect(base_url() . 'tutor-panel');   
    }
    
    
    public function Tutor_delete_subject()
    {
       if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
       {
       $sub_id = $this->uri->segment(3);
       $wher = array('tut_sub_id' => $sub_id, 'tutor_id' => $this->session->userdata('tutor_id'));
       $this->General_Model->delete_record('tutor_subjects', $wher);
       $this->session->set_flashdata('msg2', 'Record deleted successfully.');
       redirect(base_url() . 'tutor-panel');  
       } else {
                       redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
       }
    }
    
    
    
    /** ADD / VIEW / DELETE QUALIFICATION **/
    
    public function Tutor_Add_Qualification_Form()
    {
    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $data['qualification_level'] = $this->Main_User_Model->Get_Qualification_Level();
              $title = "Add Qualification - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_add_qualification_form.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function Tutor_Add_Qualification_Query()
    {
          $tutor_id          =  $this->session->userdata('tutor_id');
          $qual_level_id     =  $this->input->post('qual_level_id'); 
          $university_name   =  strtoupper($this->input->post('university_name'));
          $course            =  strtoupper($this->input->post('course')); 
          $grades            =  $this->input->post('grades');
          $grades_type       =  $this->input->post('grades_type'); 
          $graduation_year   =  $this->input->post('graduation_year');
          $still_in_progress = $this->input->post('still_in_progress');
          
          
          $maxid = $this->General_Model->find_maxid("tut_qual_id", "tutor_qualification");
          foreach ($maxid as $maxid) {
          $Maxtype = $maxid->tut_qual_id;
          }
          
          
        $data  =  array('tut_qual_id'       => $Maxtype,
                        'tutor_id'          => $tutor_id,
                        'qual_level_id'     => $qual_level_id, 
                        'university_name'   => $university_name,
                        'course'            => $course,
                        'grades'            => $grades,
                        'grades_type'       => $grades_type,
                        'graduation_year'   => $graduation_year,
                        'still_in_progress' => $still_in_progress
                       );
        
        $insert = $this->General_Model->create_record($data, "tutor_qualification");
        
        if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Qualification added successfully.');
        redirect(base_url() . 'tutor-panel');   
        }
    }
    
    public function Tutor_delete_Qualification()
    {
       if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
       {
       $tut_qual_id = $this->uri->segment(3);
       $wher        = array('tut_qual_id' => $tut_qual_id, 'tutor_id' => $this->session->userdata('tutor_id'));
       $this->General_Model->delete_record('tutor_qualification', $wher);
       $this->session->set_flashdata('msg2', 'Qualification Record Deleted Successfully.');
       redirect(base_url() . 'tutor-panel'); 
       } else {
       redirect(base_url() . 'Tutor_Controller/Tutor_Logout');    
       }
    }
      
    
    
    /** ADD / VIEW / DELETE EXPERIENCE **/
    
    public function Tutor_Add_Experience_Form()
    {
    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $title = "Add Experience - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_add_experience_form.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function Tutor_Add_Experience_Query()
    {
          $tutor_id         =  $this->session->userdata('tutor_id');
          $job_title        =  strtoupper($this->input->post('job_title')); 
          $job_level        =  strtoupper($this->input->post('job_level'));
          $employer_name    =  strtoupper($this->input->post('employer_name')); 
          $years_experience =  $this->input->post('years_experience');
          $still_doing_job  =  $this->input->post('still_doing_job'); 
          $job_description  =  $this->input->post('job_description');
          
          
          $maxid = $this->General_Model->find_maxid("tut_experience_id", "tutor_experience");
          foreach ($maxid as $maxid) {
          $Maxtype = $maxid->tut_experience_id;
          }
          
          
        $data  =  array('tut_experience_id' => $Maxtype,
                        'tutor_id'          => $tutor_id,
                        'job_title'         => $job_title, 
                        'job_level'         => $job_level,
                        'employer_name'     => $employer_name,
                        'years_experience'  => $years_experience,
                        'still_doing_job'   => $still_doing_job,
                        'job_description'   => $job_description
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_experience");
        
        if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Experience added successfully.');
        redirect(base_url() . 'tutor-panel');   
        }    
    }
    
    
    public function Tutor_delete_Experience()
    {
       if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
       {
       $tut_experience_id = $this->uri->segment(3);
       $wher        = array('tut_experience_id' => $tut_experience_id, 'tutor_id' => $this->session->userdata('tutor_id'));
       $this->General_Model->delete_record('tutor_experience', $wher);
       $this->session->set_flashdata('msg2', 'Experience Record Deleted Successfully.');
       redirect(base_url() . 'tutor-panel');  
       } else {
       redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
       }
    }
    

        /** ADD / VIEW / DELETE REFERENCES **/

    
    public function Tutor_Add_Reference_Form()
    {
    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $title = "Add Reference - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_add_reference_form.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function Tutor_Add_Reference_Query()
    {
          $tutor_id         =  $this->session->userdata('tutor_id');
          $ref_fname        =  ucwords($this->input->post('ref_fname')); 
          $ref_lname        =  ucwords($this->input->post('ref_lname'));
          $ref_email        =  $this->input->post('ref_email'); 
          $ref_phone        =  $this->input->post('ref_phone');
          $ref_relation     =  $this->input->post('ref_relation'); 
          $ref_organization =  $this->input->post('ref_organization'); 
          
          
          $maxid = $this->General_Model->find_maxid("tut_reference_id", "tutor_references");
          foreach ($maxid as $maxid) {
          $Maxtype = $maxid->tut_reference_id;
          }
          
          
        $data  =  array('tut_reference_id'  => $Maxtype,
                        'tutor_id'          => $tutor_id,
                        'ref_fname'         => $ref_fname, 
                        'ref_lname'         => $ref_lname,
                        'ref_email'         => $ref_email,
                        'ref_phone'         => $ref_phone,
                        'ref_relation'      => $ref_relation,
                        'ref_organization'  => $ref_organization
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_references");
        
        if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Reference added successfully.');
        redirect(base_url() . 'tutor-panel');   
        }    
    }
    
    
    public function Tutor_delete_Reference()
    {
       if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
       {
       $tut_reference_id = $this->uri->segment(3);
       $wher        = array('tut_reference_id' => $tut_reference_id,'tutor_id' => $this->session->userdata('tutor_id'));
       $this->General_Model->delete_record('tutor_references', $wher);
       $this->session->set_flashdata('msg2', 'Reference Record Deleted Successfully.');
       redirect(base_url() . 'tutor-panel');   
       } else {
       redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
       }
    }
    
    
    /** EDIT PROFILE **/
    
    public function Tutor_Edit_Profile_Form()
    {
    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              
              $data['countries'] = $this->WebAdmin_Model->Countries_List();
              $data['townn'] = $this->WebAdmin_Model->Town_List();
              $title = "Edit Profile - find the best tuition tutor student courses in london Uk.";

              $this->header($title);
              $this->load->view('tutors/tutor_edit_profile.php',$data);
              $this->footer();
              
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }   
    }
    
    
    
    public function Tutor_Edit_Profile_Query()
    {
        
        $tutor_id            =  $this->session->userdata('tutor_id');
        $login_email         =  $this->session->userdata('login_email'); 
       
        $fname               = ucwords($this->input->post('fname'));
        $lname               = ucwords($this->input->post('lname'));
        $tut_gender          = $this->input->post('tut_gender');
        $address_line1       = ucwords($this->input->post('address_line1'));
        $tut_address_line2   = ucwords($this->input->post('tut_address_line2'));
        $town_id             = $this->input->post('town_id');
        $country_id          = $this->input->post('country_id');
        $postcode            = strtoupper($this->input->post('postcode'));
        $tut_phone_home      = $this->input->post('tut_phone_home');
        $phone_mobile        = $this->input->post('phone_mobile');
        $tut_distance_travel = $this->input->post('tut_distance_travel');
        $tut_personal_stat   = $this->input->post('tut_personal_stat');
        $tut_availability    =  $this->input->post('tut_availability'); 
        $tut_skype           =  $this->input->post('tut_skype');
        
        $prof_pic = $_FILES['profile_img']['name'];
        
        if($prof_pic == '') {
        $data  =  array('town_id'             => $town_id,
                        'country_id'          => $country_id, 
                        'tut_fname'           => $fname,
                        'tut_lname'           => $lname,
                        'tut_address_line2'   => $tut_address_line2,
                        'tut_address_line1'   => $address_line1,
                        'tut_postcode'        => str_replace(' ','',$postcode),
                        'tut_phone_home'      => $tut_phone_home,
                        'tut_phone_mobile'    => $phone_mobile,
                        'tut_distance_travel' => $tut_distance_travel,
                        'tut_personal_stat'   => $tut_personal_stat,
                        'tut_availability'    => $tut_availability,
                        'login_email'         => $login_email,
                        'tut_gender'          => $tut_gender,
                        'tut_skype'           => $tut_skype
                        );
        
        $wher = array('tutor_id' => $tutor_id);
        $this->General_Model->update_record($data, "tutor_main", $wher);
        
        $this->session->set_flashdata('msg', 'Profile Updated Successfully.');
        redirect(base_url() . 'tutor-panel');   
        
        } else {
        
                    $extension = pathinfo($prof_pic);
                    $ext = $extension['extension'];    
        
                    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG')
                    {
                   
                    /** UPLOAD PROFILE IMAGE **/
                    
                    $config = array ('upload_path' => './images/tutors/',
                                     'allowed_types' => "jpeg|jpg|png",
                                     'overwrite' => TRUE,
                                     'file_name' => str_replace(' ','-',$tutor_id."-".$fname."-".$lname)
                                    );

                    $this->upload->initialize($config);
                    $this->upload->do_upload('profile_img');
                    $image = str_replace(' ','-',$config['file_name'].".".$ext);     
                    
                    $data  =  array('town_id'             => $town_id,
                                    'country_id'          => $country_id, 
                                    'tut_fname'           => $fname,
                                    'tut_lname'           => $lname,
                                    'tut_address_line2'   => $tut_address_line2,
                                    'tut_address_line1'   => $address_line1,
                                    'tut_postcode'        => str_replace(' ','',$postcode),
                                    'tut_phone_home'      => $tut_phone_home,
                                    'tut_phone_mobile'    => $phone_mobile,
                                    'tut_distance_travel' => $tut_distance_travel,
                                    'tut_profile_pic'     => $image,
                                    'tut_personal_stat'   => $tut_personal_stat,
                                    'tut_availability'    => $tut_availability,
                                    'login_email'         => $login_email,
                                    'tut_gender'          => $tut_gender,
                                    'tut_skype'           => $tut_skype
                                    );
        
                        $wher = array('tutor_id' => $tutor_id);
                        $this->General_Model->update_record($data, "tutor_main", $wher);
                        $this->session->set_flashdata('msg', 'Profile Updated Successfully.');
                        redirect(base_url() . 'tutor-panel');  
                        } else {

                        $this->session->set_flashdata('msg2', 'Profile image cannot be updated. Please use a valid image format.');
                        redirect(base_url() . 'tutor-panel');   
                        }
        }    
}


       /** CHANGE PASSWORD **/
       
       public function Tutor_Change_Password()
       {
       $login_email  =  $this->session->userdata('login_email');    
       $old_pass      = md5($this->input->post('old_pass'));
       $new_pass      = md5($this->input->post('new_pass'));
       
       
       $check = $this->Tutors_Model->Change_Password($login_email,$old_pass);
       
       foreach($check as $count) {
       $cc = $count->tot;
       }
       
       if($cc > 0)
       {
           
       $data = array('login_password' => $new_pass);
       $wher = array('login_email' => $login_email);
       $this->General_Model->update_record($data, "login", $wher);
       
       $this->session->set_flashdata('msg', 'Password changed successfully. Please login again with your new password.');
       redirect(base_url() . 'tutor-panel');   
       
       } else {
           
       $this->session->set_flashdata('msg2', 'Password cannot be changed. Old password does not match our record.');
       redirect(base_url() . 'tutor-panel');   
       }

       }
       
       
    /** CHANGE VERIFICATION DOCUMENT **/
    
    public function Tutor_Change_VerificationDoc()
   {
           
        $tutor_id            =  $this->session->userdata('tutor_id');
        $login_email         =  $this->session->userdata('login_email');
        $tut_fname           =  $this->session->userdata('tut_fname');
        $tut_lname           =  $this->session->userdata('tut_lname');
        $login_account_type  =  $this->session->userdata('login_account_type');
              
        $tut_ver_docs        = $_FILES['tut_ver_docs']['name'];
        $extension2          = pathinfo($tut_ver_docs);
        $ext2                = $extension2['extension'];
        
        
       if($ext2 == 'jpg' || $ext2 == 'jpeg' || $ext2 == 'png' || $ext2 == 'JPG' || $ext2 == 'JPEG' || $ext2 == 'PNG')
        {
                           
        $new_config = array ('upload_path' => './emp_verification_documents/',
                             'allowed_types' => "jpeg|jpg|png",
                             'overwrite' => TRUE,
                             'file_name' => str_replace(' ','-',$tutor_id."-Ver-".$tut_fname."-".$tut_lname)
                            );

        $this->upload->initialize($new_config);
        $this->upload->do_upload('tut_ver_docs');
        $image2 = str_replace(' ','-',$new_config['file_name'].".".$ext2);
                
        $data  =  array('tut_ver_docs' => $image2);
        $wher = array('tutor_id' => $tutor_id);
        $this->General_Model->update_record($data, "tutor_main", $wher);
        $this->session->set_flashdata('msg', 'You have successfully uploaded a new verification document.');
        redirect(base_url() . 'tutor-panel');
        
        } else {
        $this->session->set_flashdata('msg2', 'Verification document must be in a valid image format.');
        redirect(base_url() . 'tutor-panel'); 
        } 
    }    
    
    
    /** TUTOT SEARCH FORM RESULT **/
   
    public function tutor_search_result()
    {
        $subs_id  =  $_SESSION['subs_id'];   //$this->session->userdata('subs_id');
        $town_id  =  $_SESSION['town_id'];   //$this->session->userdata('town_id');
        $postcode =  $_SESSION['postcode'];  //$this->session->userdata('postcode');

          
          $result['search_subj'] = $this->WebAdmin_Model->Get_SubSubject_Name($subs_id);
          
           if($postcode != '')
           {
           $result['tut_search'] = $this->Tutors_Model->search_tutor_with_postcode($postcode,$subs_id); 
           $result['tut_search_count'] = $this->Tutors_Model->search_tutor_with_postcode_count($postcode,$subs_id); 
           } else {
           $result['tut_search'] = $this->Tutors_Model->search_tutor_with_town($town_id,$subs_id);
           $result['tut_search_count'] = $this->Tutors_Model->search_tutor_with_town_count($town_id,$subs_id); 
           }
           
           $title = "Find best tutors courses students subjects in london uk - courses and tutors";
           $this->header($title);
           $this->load->view('tutors/tutor_search.php',$result);
            //$this->load->view('template/sidebar.php');
           $this->footer();
            
    }
    
    
    /** Tutor Profile for Public. This is how public will see tutor's profile. **/

    
    public function Tutor_Profile()
    {
    $tutor_id = $this->uri->segment(3); 
    
    // Check if tutor exists
    $query = $this->General_Model->fetch_CoustomQuery("SELECT COUNT(`tutor_id`) AS tottut FROM `tutor_main` WHERE `tutor_id` = $tutor_id");
    
    foreach($query as $query)
    {
        $tottut = $query->tottut;
    }

    if($tottut > 0) {      
    $tut_details['tut_details']        = $this->Tutors_Model->View_Tutor_Profile($tutor_id);
    $tut_details['tut_qualification']  = $this->Tutors_Model->GetTutor_Qualification($tutor_id);
    $tut_details['tut_experience']     = $this->Tutors_Model->GetTutor_Experience($tutor_id);
    $tut_details['tut_reference']      = $this->Tutors_Model->GetTutor_Reference($tutor_id);
    
    /* Tutor Feedbacks */
    $tut_details['tut_feedback']       = $this->Tutors_Model->get_tutor_feedbacks($tutor_id);
    $tut_details['tut_feedback_count'] = $this->Tutors_Model->get_tutor_feedbacks_count($tutor_id);
    
    $tut_details['tut_feedback_response'] = $this;
    
    $tut_details['std_payment_check'] = $this; // this checks if the student is able to give feedback or not. If student has purchased the contact details, then he can give feedback.
    
    $tut_details['std_feedback_check'] = $this; // this checks if the student has given feedback or not. If yes, the student is not allowed to give another feedback.
    
    $tut_details['count_tut_subjects']   = $this->Tutors_Model->count_tutor_subject($tutor_id);
    $tut_details['tut_subjects']         = $this->Tutors_Model->GetTutorsSubjects2($tutor_id);
    $tut_details['subj_levels']          = $this->WebAdmin_Model->SubjectLevel_List();
    $tut_details['error_msgs']           = $this->WebAdmin_Model->sending_msgs_error_msg();
    $tut_details['payment_warning_msg']  = $this->WebAdmin_Model->warning_msg_paypal_payment();
    $tut_details['purchase_amount']      = $this->WebAdmin_Model->paypal_settings();
    
    $tut_details['call_get_rates_function'] = $this; // Call Controller
    
    /* Check if student has purchased contact details or not */
    
    if($this->session->userdata('student_id') !== NULL) {
        
       $tut_details['std_check'] = $this->Tutors_Model->chk_std_buy_contactdetails($tutor_id, $this->session->userdata('student_id'));
        
    }
    
	$title = "Tutor Profile - find best tutors courses subjects in london - courses and tutors";
      $this->header($title);
      $this->load->view('tutors/tutor_profile.php',$tut_details);
      $this->footer();
    } else {
        echo "<h3>Tutor profile not found.</h3>";
    }
    }
    
    
    /* Check if the student has purchased the contact details of tutor or not */
    
    public function std_payment_check($student_id, $tutor_id)
    {
        
        $std_check = $this->General_Model->fetch_CoustomQuery("SELECT COUNT(*) AS tot_result FROM `payment` AS p WHERE p.`tutor_id` = $tutor_id AND p.`student_id` = $student_id");  
        $resultt = 0;
        foreach($std_check as $std_check) { $resultt = $std_check->tot_result; }
        return $resultt;
    }
    
    
    /* Check if the student has given feedback or not */
    
    public function std_feedback_check($student_id, $tutor_id)
    {
    $std_check = $this->General_Model->fetch_CoustomQuery("SELECT COUNT(*) AS tot_result FROM `tutor_feedbacks` AS tf WHERE tf.`tutor_id` = $tutor_id AND tf.`student_id` = $student_id");    
    $resultt = 0;
    foreach($std_check as $std_check) { $resultt = $std_check->tot_result; }
    return $resultt;
    }


    /* Get Feedback Response */
    
    public function get_tut_feedback_response($feedback_id)
    {
        $feedback_response = $this->General_Model->fetch_CoustomQuery("SELECT fr.`response_description` 
                                                                       FROM `tut_feedback_response` fr JOIN `tutor_feedbacks` tf ON tf.`tut_feedback_id` = fr.`tut_feedback_id`
                                                                       WHERE fr.`tut_feedback_id` = $feedback_id");
        
        $response = "";
        
        foreach ($feedback_response as $fr) { $response = $fr->response_description; }
        
        return $response;
    }

    
    /* Give feedback to tutor */
    
    public function give_feedback_to_tutor_form($tutor_id)
    {

    $tut_details['tut_details']        = $this->Tutors_Model->View_Tutor_Profile($tutor_id);   
    $title = "Give feedback to tutor - find best tutors courses subjects students in london - courses and tutors";
    $this->header($title);
    $this->load->view('tutors/feedback_form.php',$tut_details);
    $this->footer();
    }
    
    
    public function give_feedback_to_tutor_query()
    {
        if($this->session->userdata('student_id') !== '')
        {
        
        $student_id = $this->session->userdata('student_id');
        $tutor_id = $this->input->post('tutor_id');
        $tutor_rating = $this->input->post('tutor_rating');
        $feedback_description = $this->input->post('feedback_description');
        
        $maxid = $this->General_Model->find_maxid("tut_feedback_id", "tutor_feedbacks");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->tut_feedback_id;
        }
          
          
        $data2  =  array('tut_feedback_id'   => $Maxtype,
                         'tutor_id'          => $tutor_id,
                         'student_id'        => $student_id,
                         'tutor_rating'      => $tutor_rating,
                         'feedback_description'   => $feedback_description,
                         'feedback_date_time'     => date("Y-m-d")
                        );
        
        $insert = $this->General_Model->create_record($data2, "tutor_feedbacks");
        
        if($insert)
        {
        $this->session->set_flashdata('msg', 'Your feedback has been submitted.');
        redirect(base_url() . 'tutor/profile/'.$tutor_id); 
        }
        
        } 
    }
    
    
    /* Reply to Feedback */
    
    public function reply_to_feedback_form()
    {
 

    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
                      
              $student_id   = $this->input->post('student_id');
              $tut_feedback_id = $this->input->post('feedback_id'); 
    
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              
              $data['display_feedback'] = $this->Tutors_Model->get_the_feedback($tut_feedback_id,$tutor_id,$student_id);
                  $title = "Feedback Response - find best tutors courses subjects students in london - courses and tutors";

              $this->header($title);
              $this->load->view('tutors/reply_to_feedback.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    
    }
    
    
    public function reply_to_feedback_query()
    {
     $tut_feedback_id = $this->input->post('tut_feedback_id');  
     $response_description = $this->input->post('response_description'); 
     
        $maxid = $this->General_Model->find_maxid("tut_response_id", "tut_feedback_response");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->tut_response_id;
        }
          
          
        $data2  =  array('tut_response_id'   => $Maxtype,
                         'tut_feedback_id'   => $tut_feedback_id,
                         'response_description'   => $response_description,
                         'response_date_time'     => date("Y-m-d")
                        );
        
        $insert = $this->General_Model->create_record($data2, "tut_feedback_response");
        
        if($insert)
        {
        $this->session->set_flashdata('msg', 'Your Response has been submitted.');
        redirect(base_url() . 'tutor-panel');  
        }
    }

    
    public function get_rates($tutor_id,$sub_id,$level_id) {
    	
    $get_r = $this->General_Model->fetch_CoustomQuery("SELECT ts. * , st.subs_title FROM  `tutor_subjects` AS ts, sub_subjects AS st 
                                                       WHERE ts.subs_id = st.subs_id AND ts.tutor_id =$tutor_id AND ts.subs_id =$sub_id 
                                                       AND ts.sub_level_id = $level_id");

    $res = "";
    foreach($get_r as $gr ) {
            $res = $gr->rate_per_hour;
    }
		
    return $res;
		
   }
   
   
   /* View Message Details Sent By Tutor */
   
   public function view_sent_message_details()
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
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $data['subj_level']  = $this->WebAdmin_Model->SubjectLevel_List();
              
              $data['message_details']        = $this->Main_User_Model->get_sent_message_details_for_tutor($msg_id,$student_id,$tutor_id);
              
              $data['message_reply_details']  = $this->Main_User_Model->get_message_reply_details($msg_id);
              
              $data['check_reply']            = $this->Main_User_Model->check_msg_reply($msg_id);
              
              $title = "Message details - Courses And Tutors";              
              $this->header($title);
              $this->load->view('tutors/view_sent_message_details',$data);
              $this->footer();
              
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }   
   }
   
   
   
   /* Sent email to admin that a new tutor has signed up */
     
  public function notify_admin_email($tutor_id,$tut_fname,$tut_lname,$tutor_email)
  {
  $tutor_profile = base_url().'tutor/profile/'.$tutor_id;
  
  @$msg .= "<html> <body class='' style='font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;'>";
  @$msg .= "<table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;' width='100%' bgcolor='#f6f6f6'>
                  <tr>
                   <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                    <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px;' width='580' valign='top'>
                      <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'>
                       <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'></span>
          
                         <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;' width='100%'>
                          <tr>
                           <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                            <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                             <tr>
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hello,</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>
                                This email is a notification that a new tutor has just signed up at <a href='http://coursesandtutors.co.uk/' target='_blank'>Courses And Tutors.</a>
                                </p>
                        
                             <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Tutor Details:
                            <ul><li> First Name : $tut_fname </li><li> Last Name : $tut_lname</li><li> Email : $tutor_email</li></ul><br>
                                <a href='$tutor_profile' target='_blank'>Click Here</a> to view tutor's profile.
                            </p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Kind Regards, <br> Team Courses And Tutors </a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <div class='footer' style='clear: both; padding-top: 10px; text-align: center; width: 100%;'>
              <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                <tr>
                  <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;' valign='top' align='center'>
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Please do not reply to this email.</span>
                    <br> For general enquiries please email us at:   info@coursesandtutors.co.uk 
                    
                  </td>
                </tr>
       
              </table>
            </div>

         </div>
        </td>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
      </tr>
    </table>";
    @$msg .= "</body></html>";
    
  
  
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from("faridshuja1@gmail.com");
        $this->email->to("fareedshuja@gmail.com");
        $this->email->subject("New Tutor SignUp Notification - Courses and Tutors");
        $this->email->message($msg);
        
        if(!$this->email->send())
        {
        show_error($this->email->print_debugger());
        } 
   
  redirect(base_url() . 'tutor-panel');
  }

  /* Change Subject Rate */
  
  public function change_sub_rate()
  {
      $id =  $this->uri->segment(3); 
      
      if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);

              $data['result'] = $this->Tutors_Model->get_subject_rate($id,$tutor_id);
                            
              $title = "Edit Subject Rate - find best tution tutor student courses in london uk.";            
              $this->header($title);
              $this->load->view('tutors/change_subject_rate.php',$data);
              $this->footer();
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
  }
  
  
  public function change_sub_rate_query()
  {
    $tut_sub_id = $this->input->post('tut_sub_id');
    $rate_per_hour = $this->input->post('rate_per_hour');
      
    if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
    {
      $tutor_id =  $this->session->userdata('tutor_id');
      
      $data  =  array('rate_per_hour' => $rate_per_hour);
    
      $wher = array('tut_sub_id' => $tut_sub_id,
                    'tutor_id' => $tutor_id
                    );
    
    $this->General_Model->update_record($data, "tutor_subjects", $wher);
    
    $this->session->set_flashdata('msg', 'Record Successfully Updated.');
    
    redirect(base_url() . 'tutor-panel'); 
  }
  }
  
  
  /* Tutor Edit Qualification */
  
  public function tutor_edit_qual_form()
  {
       $qual_id =  $this->uri->segment(3); 
      
      if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              $data['qualification_level'] = $this->Main_User_Model->Get_Qualification_Level();
              $data['result'] = $this->Tutors_Model->edit_tut_qual($qual_id,$tutor_id);
              
              $title = "Edit Qualification - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_edit_qualification_form.php',$data);
              $this->footer();
        
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
  }
  
  
  public function  tutor_edit_qual_query()
  {
      $tut_qual_id = $this->input->post('tut_qual_id');
      $tutor_id = $this->session->userdata('tutor_id');
      
          $qual_level_id     =  $this->input->post('qual_level_id'); 
          $university_name   =  strtoupper($this->input->post('university_name'));
          $course            =  strtoupper($this->input->post('course')); 
          $grades            =  $this->input->post('grades');
          $grades_type       =  $this->input->post('grades_type'); 
          $graduation_year   =  $this->input->post('graduation_year');
          $still_in_progress = $this->input->post('still_in_progress');
          
        $data  =  array('qual_level_id'     => $qual_level_id, 
                        'university_name'   => $university_name,
                        'course'            => $course,
                        'grades'            => $grades,
                        'grades_type'       => $grades_type,
                        'graduation_year'   => $graduation_year,
                        'still_in_progress' => $still_in_progress
                       );
        
    $wher = array('tut_qual_id' => $tut_qual_id,'tutor_id' => $tutor_id);
    
    $this->General_Model->update_record($data, "tutor_qualification", $wher);
    
    $this->session->set_flashdata('msg', 'Record Successfully Updated.');
    
    redirect(base_url() . 'tutor-panel'); 
  }
  
  
  /* EDIT EXPERIENCE */
  
  public function tutor_edit_experience_form()
  {
   $exp_id =  $this->uri->segment(3);    
   
   if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);
              
              $data['result'] = $this->Tutors_Model->edit_tut_experience($exp_id,$tutor_id);
              
              $title = "Edit Experience - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_edit_experience_form.php',$data);
              $this->footer();
        
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }  
  }
  
  public function tutor_edit_experience_query()
  {
          $tutor_id          =  $this->session->userdata('tutor_id');
          $job_title         =  strtoupper($this->input->post('job_title')); 
          $job_level         =  strtoupper($this->input->post('job_level'));
          $employer_name     =  strtoupper($this->input->post('employer_name')); 
          $years_experience  =  $this->input->post('years_experience');
          $still_doing_job   =  $this->input->post('still_doing_job'); 
          $job_description   =  $this->input->post('job_description');
          $tut_experience_id = $this->input->post('tut_experience_id');
          
        $data  =  array('job_title'         => $job_title, 
                        'job_level'         => $job_level,
                        'employer_name'     => $employer_name,
                        'years_experience'  => $years_experience,
                        'still_doing_job'   => $still_doing_job,
                        'job_description'   => $job_description
                        );    
        
        $wher = array('tut_experience_id' => $tut_experience_id,'tutor_id' => $tutor_id);
    
        $this->General_Model->update_record($data, "tutor_experience", $wher);
    
        $this->session->set_flashdata('msg', 'Record Successfully Updated.');
    
        redirect(base_url() . 'tutor-panel'); 
  }
  
  public function tutor_edit_reference_form()
  {
      $ref_id =  $this->uri->segment(3); 
      
      if($this->session->userdata('tutor_id') && $this->session->userdata('login_email'))
        {
              $tutor_id            =  $this->session->userdata('tutor_id');
              $login_email         =  $this->session->userdata('login_email');
              $tut_fname           =  $this->session->userdata('tut_fname');
              $tut_lname           =  $this->session->userdata('tut_lname');
              $login_account_type  =  $this->session->userdata('login_account_type');
              
              $data['tut_details'] = $this->Tutors_Model->GetTutorDetails($tutor_id,$login_email);

              $data['result'] = $this->Tutors_Model->edit_tut_reference($ref_id,$tutor_id);
              
              $title = "Edit Reference - find the best tuition tutor student courses in london Uk.";
              $this->header($title);
              $this->load->view('tutors/tut_edit_reference_form.php',$data);
              $this->footer();
        
        } else {
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
  }
  
  public function tutor_edit_reference_query()
  {
          $tutor_id         =  $this->session->userdata('tutor_id');
          $ref_fname        =  ucwords($this->input->post('ref_fname')); 
          $ref_lname        =  ucwords($this->input->post('ref_lname'));
          $ref_email        =  $this->input->post('ref_email'); 
          $ref_phone        =  $this->input->post('ref_phone');
          $ref_relation     =  $this->input->post('ref_relation'); 
          $ref_organization =  $this->input->post('ref_organization'); 
          $tut_reference_id = $this->input->post('tut_reference_id'); 
          
          
         $data  =  array('ref_fname'         => $ref_fname, 
                         'ref_lname'         => $ref_lname,
                         'ref_email'         => $ref_email,
                         'ref_phone'         => $ref_phone,
                         'ref_relation'      => $ref_relation,
                         'ref_organization'  => $ref_organization
                        );
         
        $wher = array('tut_reference_id' => $tut_reference_id,'tutor_id' => $tutor_id);
    
        $this->General_Model->update_record($data, "tutor_references", $wher);
    
        $this->session->set_flashdata('msg', 'Record Successfully Updated.');
    
        redirect(base_url() . 'tutor-panel');
             
  }
  
  
  /**** Browse tutors by popular subjects only ****/
  
  public function browse_tutors()
  {
      
          $subs_id =  $this->uri->segment(2); 
           
          $result['tut_search'] = $this->Tutors_Model->browse_all_tutors_by_subj($subs_id); 
          $result['tut_search_count'] = $this->Tutors_Model->browse_all_tutors_by_subj_count($subs_id); 
          $result['search_subj'] = $this->WebAdmin_Model->Get_SubSubject_Name($subs_id);


          $title = "Browse all tutors - Courses And Tutors London Tuition private tutoring";
          $this->header($title);
          $this->load->view('tutors/browse_tutors_by_subj.php',$result);
          $this->footer();
      
  }
   
  
   public function by_location()
  {
      
          $town_id =  $this->uri->segment(2); 
           
          $result['tut_search'] = $this->Tutors_Model->browse_all_tutors_by_town($town_id); 
          
          
          $result['tut_search_count'] = $this->Tutors_Model->browse_all_tutors_by_town_count($town_id); 
          
          $result['search_town'] = $this->WebAdmin_Model->get_town_name($town_id);


          $title = "Find Tutors in London Manchester Birmingham Bradford Sheffield";
          $this->header($title);
          $this->load->view('tutors/browse_tutors_by_town.php',$result);
          $this->footer();
      
  }
  
}