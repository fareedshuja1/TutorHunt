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
        } 

    
    
    public function Tutor_Create_Profile()
    {
    if($this->session->userdata('login_email') && !$this->session->userdata('tutor_id'))
    {
        $login_email =  $this->session->userdata('login_email');
        $login_account_type=  $this->session->userdata('login_account_type');
             
        $data['countries'] = $this->WebAdmin_Model->Countries_List();
        $data['town'] = $this->WebAdmin_Model->Town_List();
              
        $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
        $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
        $data['town_list'] = $this->WebAdmin_Model->Town_List();
              
              
        $this->load->view('template/header_main.php', $data);
	$this->load->view('tutors/tut_create_profile_form.php', $data);
        $this->load->view('template/footer.php');
             
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
        $country_id          = $this->input->post('country_id');
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
        
        
        $tut_ver_docs = $_FILES['tut_ver_docs']['name'];
        $extension2 = pathinfo($tut_ver_docs);
        $ext2 = $extension2['extension'];


        
     if(($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG') &&
        ($ext2 == 'jpg' || $ext2 == 'jpeg' || $ext2 == 'png' || $ext2 == 'JPG' || $ext2 == 'JPEG' || $ext2 == 'PNG'))
     {
         
            /** UPLOAD PROFILE IMAGE **/
            $config = array ('upload_path' => './images/tutors/',
                             'allowed_types' => "jpeg|jpg|png",
                             'overwrite' => TRUE,
                             'file_name' => $Maxtype."-".$fname."-".$lname
                            );

            $this->upload->initialize($config);
            $this->upload->do_upload('profile_pic');
            $image = $config['file_name'].".".$ext;        
            
            
            /** UPLOAD VERIFICATION DOCUMENT **/
            $new_config = array ('upload_path' => './emp_verification_documents/',
                                 'allowed_types' => "jpeg|jpg|png",
                                 'overwrite' => TRUE,
                                 'file_name' => $Maxtype."-Ver-".$fname."-".$lname
                                );
        

            $this->upload->initialize($new_config);
            $this->upload->do_upload('tut_ver_docs');
            $image2 = $new_config['file_name'].".".$ext2;
            
            
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
                        'tut_ver_docs'        => $image2,
                        'tut_personal_stat'   => $tut_personal_stat,
                        'tut_availability'    => $tut_availability,
                        'login_email'         => $login_email,
                        'tut_gender'          => $tut_gender,
                        'tut_skype'           => $tut_skype,
                        'is_verified'         => 'NO'
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_main");
        
     }  else {
        
         $this->session->set_flashdata('msg', 'Verification document must be in a valid Image format.');
         redirect(base_url() . 'Tutor_Controller/Tutor_Create_Profile'); 
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
          
         redirect(base_url() . 'Tutor_Controller/Tutor_Panel');
         
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
              $tut_details['acc_error_msg'] = $this->Tutors_Model->Unverified_Account_Error_Msg();
              
              $tut_details['tut_messages'] = $this->Tutors_Model->Get_Tutor_Messages($tutor_id);
              
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
              $data['town_list'] = $this->WebAdmin_Model->Town_List();
              
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tutor_panel.php',$tut_details);
              $this->load->view('template/footer.php');
             
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
              $data['town_list']  = $this->WebAdmin_Model->Town_List();
                            
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tut_add_subject_form.php',$data);
              $this->load->view('template/footer.php');
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function Tutor_AddSubjuect_Query()
    {
          $subs_id          =  $this->input->post('subs_id'); 
          $sub_level_id     =  $this->input->post('sub_level_id');
          $tut_sub_notes    =  $this->input->post('tut_sub_notes'); 
          $tutor_id         =  $this->session->userdata('tutor_id');
          $rate_per_hour    =  $this->input->post('rate_per_hour');
           
          $maxid = $this->General_Model->find_maxid("tut_sub_id", "tutor_subjects");
          foreach ($maxid as $maxid) {
          $Maxtype = $maxid->tut_sub_id;
          }
          
          
        $data  =  array('tut_sub_id'     => $Maxtype,
                        'subs_id'        => $subs_id,
                        'sub_level_id'   => $sub_level_id, 
                        'tut_sub_notes'  => $tut_sub_notes,
                        'tutor_id'     => $tutor_id,
                        'rate_per_hour'  => $rate_per_hour
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_subjects");
        
         if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Record added successfully.');
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
        }
    }
    
    
    public function Tutor_delete_subject()
    {
       $sub_id = $this->uri->segment(3);
       $wher = array('tut_sub_id' => $sub_id);
       $this->General_Model->delete_record('tutor_subjects', $wher);
       $this->session->set_flashdata('msg2', 'Record deleted successfully.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
                 
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
              $data['town_list'] = $this->WebAdmin_Model->Town_List();
              
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tut_add_qualification_form.php',$data);
              $this->load->view('template/footer.php');
              
        } else {
            
            redirect(base_url() . 'Tutor_Controller/Tutor_Logout');
        }
    }
    
    
    public function Tutor_Add_Qualification_Query()
    {
          $tutor_id         =  $this->session->userdata('tutor_id');
          $qual_level_id    =  $this->input->post('qual_level_id'); 
          $university_name  =  strtoupper($this->input->post('university_name'));
          $course           =  strtoupper($this->input->post('course')); 
          $grades           =  $this->input->post('grades');
          $grades_type      =  $this->input->post('grades_type'); 
          $graduation_year  =  $this->input->post('graduation_year');
          
          
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
                        'graduation_year'   => $graduation_year
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_qualification");
        
        if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Qualification added successfully.');
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
        }
    }
    
    public function Tutor_delete_Qualification()
    {
       $tut_qual_id = $this->uri->segment(3);
       $wher        = array('tut_qual_id' => $tut_qual_id);
       $this->General_Model->delete_record('tutor_qualification', $wher);
       $this->session->set_flashdata('msg2', 'Qualification Record Deleted Successfully.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
            
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
              $data['town_list'] = $this->WebAdmin_Model->Town_List();
                            
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tut_add_experience_form.php',$data);
              $this->load->view('template/footer.php');
              
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
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
        }    
    }
    
    
    public function Tutor_delete_Experience()
    {
       $tut_experience_id = $this->uri->segment(3);
       $wher        = array('tut_experience_id' => $tut_experience_id);
       $this->General_Model->delete_record('tutor_experience', $wher);
       $this->session->set_flashdata('msg2', 'Experience Record Deleted Successfully.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
              
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
              $data['town_list'] = $this->WebAdmin_Model->Town_List();

              
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tut_add_reference_form.php',$data);
              $this->load->view('template/footer.php');
              
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
                        'ref_relation'      => $ref_relation
                        );
        
        $insert = $this->General_Model->create_record($data, "tutor_references");
        
        if($insert == TRUE)
        {  
        $this->session->set_flashdata('msg', 'Reference added successfully.');
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
        }    
    }
    
    
    public function Tutor_delete_Reference()
    {
       $tut_reference_id = $this->uri->segment(3);
       $wher        = array('tut_reference_id' => $tut_reference_id);
       $this->General_Model->delete_record('tutor_references', $wher);
       $this->session->set_flashdata('msg2', 'Reference Record Deleted Successfully.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
              
              $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
              $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
              $data['town_list'] = $this->WebAdmin_Model->Town_List();
              
              
              $this->load->view('template/header_main.php',$data);
              $this->load->view('tutors/tutor_edit_profile.php',$data);
              $this->load->view('template/footer.php');
              
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
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
        
        } else {
        
                    $extension = pathinfo($prof_pic);
                    $ext = $extension['extension'];    
        
                    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG')
                    {
                   
                    /** UPLOAD PROFILE IMAGE **/
                    
                    $config = array ('upload_path' => './images/tutors/',
                                     'allowed_types' => "jpeg|jpg|png",
                                     'overwrite' => TRUE,
                                     'file_name' => $tutor_id."-".$fname."-".$lname
                                    );

                    $this->upload->initialize($config);
                    $this->upload->do_upload('profile_img');
                    $image = $config['file_name'].".".$ext;     
                    
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
                        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');  
                        } else {

                        $this->session->set_flashdata('msg2', 'Profile image cannot be updated. Please use a valid image format.');
                        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
       
       } else {
           
       $this->session->set_flashdata('msg2', 'Password cannot be changed. Old password does not match our record.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Panel');   
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
                             'file_name' => $tutor_id."-".$login_account_type."-".$tut_fname."-".$tut_lname
                            );

        $this->upload->initialize($new_config);
        $this->upload->do_upload('tut_ver_docs');
        $image2 = $new_config['file_name'].".".$ext2;
                
        
        $data  =  array('tut_ver_docs' => $image2);
        $wher = array('tutor_id' => $tutor_id);
        $this->General_Model->update_record($data, "tutor_main", $wher);
        $this->session->set_flashdata('msg', 'You have successfully uploaded a new verification document.');
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel');
        
        
        } else {
        $this->session->set_flashdata('msg2', 'Verification document must be in a valid image format.');
        redirect(base_url() . 'Tutor_Controller/Tutor_Panel'); 
        } 
    }    
    
    
    /** TUTOT SEARCH FORM RESULT **/
   
    public function Tutor_Search_Result()
    {
        $subs_id  =  $_SESSION['subs_id'];   //$this->session->userdata('subs_id');
        $town_id  =  $_SESSION['town_id'];   //$this->session->userdata('town_id');
        $postcode =  $_SESSION['postcode'];  //$this->session->userdata('postcode');

          
          $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
          $data['sub_subjs']  = $this->WebAdmin_Model->SubCourse_List();
          $data['town_list']  = $this->WebAdmin_Model->Town_List();
          
          $result['search_subj'] = $this->WebAdmin_Model->Get_SubSubject_Name($subs_id);
          
           if($postcode != '')
           {
           $result['tut_search'] = $this->Tutors_Model->Search_Tutor_With_PostCode($postcode,$subs_id); 
           $result['tut_search_count'] = $this->Tutors_Model->Search_Tutor_With_PostCode_Count($postcode,$subs_id); 
           } else {
           $result['tut_search'] = $this->Tutors_Model->Search_Tutor_With_Town($town_id,$subs_id);
           $result['tut_search_count'] = $this->Tutors_Model->Search_Tutor_With_Town_Count($town_id,$subs_id); 
           }
           
            $this->load->view('template/header_main.php',$data);
            $this->load->view('tutors/tutor_search.php',$result);
            $this->load->view('template/sidebar.php');
            $this->load->view('template/footer.php');
            
    }
    
    
    /** Tutor Profile for Public. This is how public will see tutor's profile. **/

    
    public function Tutor_Profile()
    {
    $tutor_id = $this->uri->segment(3); 
    
    
    $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
    $data['sub_subjs']  = $this->WebAdmin_Model->SubCourse_List();
    $data['town_list']  = $this->WebAdmin_Model->Town_List();
          
          
    $tut_details['tut_details']       = $this->Tutors_Model->View_Tutor_Profile($tutor_id);
    $tut_details['tut_qualification'] = $this->Tutors_Model->GetTutor_Qualification($tutor_id);
    $tut_details['tut_experience']    = $this->Tutors_Model->GetTutor_Experience($tutor_id);
    $tut_details['tut_reference']     = $this->Tutors_Model->GetTutor_Reference($tutor_id);
    
    $tut_details['tut_subjects']      = $this->Tutors_Model->GetTutorsSubjects2($tutor_id);
    $tut_details['subj_levels']       = $this->WebAdmin_Model->SubjectLevel_List();
            
    $tut_details['Cont'] = $this; // Call Controller
	    		
	
      $this->load->view('template/header_main.php',$data);
      $this->load->view('tutors/tutor_profile.php',$tut_details);
      $this->load->view('template/footer.php');
    }
     
    
    
    public function get_rates($tutor_id,$sub_id,$level_id) {
    	
    $get_r = $this->General_Model->fetch_CoustomQuery("SELECT ts. * , st.subs_title 
                                                        FROM  `tutor_subjects` AS ts, sub_subjects AS st 
                                                        WHERE ts.subs_id = st.subs_id 
                                                        AND ts.tutor_id =$tutor_id 
                                                        AND ts.subs_id =$sub_id 
                                                        AND ts.sub_level_id = $level_id");

                 $res = "";
                 foreach( $get_r as $gr ) {
		 $res = $gr->rate_per_hour;
		 }
		
		 return $res;
		
   } 
	
	
}