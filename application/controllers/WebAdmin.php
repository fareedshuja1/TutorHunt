<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WebAdmin extends CI_Controller {
    
    
      public function __construct() {
        parent::__construct();
        $this->load->model('WebAdmin_Model');
        $this->load->model('General_Model');
        $this->load->model('Tutors_Model');
        $this->load->model('Student_Model');
        $this->load->model('Main_User_Model');
    }

    public function admin_login()
        {
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            $login = $this->WebAdmin_Model->LoginAuth($email, $password);
               
            
            if($login)
            {
                
               $newdata = array('admin_id'     => $login['admin_id'],
                                'admin_email'  => $login['admin_email'],
                                'admin_fname'  => $login['admin_fname'],
                                'admin_lname'  => $login['admin_lname']
               );
                
               $this->session->set_userdata($newdata);
            
               $this->session->userdata('admin_id');
               $this->session->userdata('admin_fname');
               $this->session->userdata('admin_lname');
               $this->session->userdata('admin_email');
               
               redirect(base_url() . 'WebAdmin/webadministrator');
            
            } else {
            
            $this->session->set_flashdata('msg', 'Username & Password is Invalid');
	    //redirect(base_url() . 'WebAdmin/webadmin_login_form');
            redirect(base_url() . 'WebAdmin/index');
            }
               
        }
        
        
        public function admin_logout()
        {
            $this->session->unset_userdata(array("admin_id"=>"",
                                                 "admin_fname"=>"",
                                                 "admin_lname"=>"",
                                                 "admin_email"=>"")
                                          );
            $this->session->sess_destroy();
            redirect(base_url() . 'WebAdmin/index');
            
            
        }
        
        
        public function webadministrator()
	{         
                /* Total number of students who have created an account and their account status is Active. */
                $data['tot_students'] = $this->General_Model->Count_Total_Students();
                
                /* Total number of students who have registered today and not necessarily created an account. */
                $data['tot_students_today'] = $this->General_Model->Count_Total_Students_Today();
                
                /* Total number of students who have registered this month and not necessarily created an account. */
                $data['tot_students_this_month'] = $this->General_Model->Count_Total_Students_This_Month();
                
                /* Total number of students who have registered last month and not necessarily created an account. */
                $data['tot_students_last_month'] = $this->General_Model->Count_Total_Students_Last_Month();
                
                
                $data['tot_tutors'] = $this->General_Model->Count_Total_Tutor();
                $data['tot_tutors_today'] = $this->General_Model->Count_Total_Tutor_Today();
                $data['tot_tutors_this_month'] = $this->General_Model->Count_Total_Tutors_This_Month();
                $data['tot_tutors_last_month'] = $this->General_Model->Count_Total_Tutors_Last_Month();
               
                $this->load->view('admin/template/header.php');
                $this->load->view('admin/template/header_bar.php');
                $this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/index.php',$data);
                $this->load->view('admin/template/footer.php');
	}
        

        public function index()
        {
             $this->load->view('admin/template/header.php');
    	     $this->load->view('admin/login.php');
             $this->load->view('admin/template/footer.php');
	}
        
        
        /* ADD / VIEW / DEACTIVATE USERS */
        
        public function add_user_form()
        {
            
                $data['result'] = $this->WebAdmin_Model->UsersList();
            
                $this->load->view('admin/template/header.php');
                $this->load->view('admin/template/header_bar.php');
                $this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/user/add_user_form', $data);
                $this->load->view('admin/template/footer.php');
        }
        
        public function create_user() {
            
            $fname    = ucwords($this->input->post('fname'));
            $lname    = ucwords($this->input->post('lname'));
            $email    = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $cpass    = md5($this->input->post('cpass'));
           
            $maxid = $this->General_Model->find_maxid("admin_id", "admin_login");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->admin_id;
            }
            
            $data = array('admin_email'    => $email, 
                          'admin_password' => $password, 
                          'admin_id'       => $Maxtype,
                          'admin_fname'    => $fname,
                          'admin_lname'    => $lname,
                          'is_active'      => 1,
                          'is_sup_admin'   => 0,
                    );
        
            $check_email = $this->WebAdmin_Model->Check_Email($email);
             
            foreach ($check_email as $record) {
            $tot_record = $record->tot;
            }
            
            if($tot_record > 0)
            {   
                
                $this->session->set_flashdata('msg', 'This Email Address already exists. Please use a new Email ID.');
                redirect(base_url() . 'WebAdmin/add_user_form');    
                
            } else {
             
                        if($password == $cpass)
                        {
                        $this->General_Model->create_record($data, "admin_login");
                        $this->session->set_flashdata('msg', 1);
                        redirect(base_url() . 'WebAdmin/add_user_form');
            
                        } else {
                        $this->session->set_flashdata('msg', 2);
                        redirect(base_url() . 'WebAdmin/add_user_form');  
                        } 
            }
       }
       
       public function DeactivateUser() {
           $admin_id = $this->uri->segment(3);
           
           $query = $this->WebAdmin_Model->Deactivate_User($admin_id);
                           
           $this->session->set_flashdata('msg', 'User Deactivated Successfully.');
           redirect(base_url() . 'WebAdmin/add_user_form');
       }
       
       public function ActivateUser() {
           $admin_id = $this->uri->segment(3);
           
           $query = $this->WebAdmin_Model->Activate_User($admin_id);
                           
           $this->session->set_flashdata('msg', 'User Activated Successfully.');
           redirect(base_url() . 'WebAdmin/add_user_form');
       }
       
       
       public function Reset_User_Password()
       {
           $data['admin_id']=$this->input->post('id');
           $this->load->view('admin/user/reset_user_password', $data);
       }
       
       public function reset_user_password_query()
       {
           $admin_id = $this->input->post('admin_id');
           
            $query1 =  $this->WebAdmin_Model->get_user_first_name($admin_id);
           
            foreach($query1 as $record) {
            $fname = $record->admin_fname;
            }
           
           $query = $this->WebAdmin_Model->reset_user_password_query($admin_id,$fname);
           
           $this->session->set_flashdata('msg', 'User Password Change Successfully. Password is set to user first name.');
           redirect(base_url() . 'WebAdmin/add_user_form');
       }

       
       
       
       /* ADD / VIEW / EDIT COURSES */
       
       public function add_main_course_form()
       {
           
         $data['result'] = $this->WebAdmin_Model->MainCourse_List();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/courses/add_main_course_form',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function create_main_course()
       {
            $mname    = strtoupper($this->input->post('mname'));
           
            $maxid = $this->General_Model->find_maxid("mains_id", "main_subjects");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->mains_id;
            }
            
            $data = array('mains_id' => $Maxtype, 'mains_title' => $mname, 'mains_visibility' => 'VISIBLE');
                      
            $check_main_course = $this->WebAdmin_Model->check_main_course($mname);
             
            foreach ($check_main_course as $record) {
            $tot_record = $record->tot;
            }
           
            if($tot_record > 0)
            {   
                
                $this->session->set_flashdata('msg', 1);
                redirect(base_url() . 'WebAdmin/add_main_course_form');    
                
            } else {
             
                $this->General_Model->create_record($data, "main_subjects");
                $this->session->set_flashdata('msg', 2);
                redirect(base_url() . 'WebAdmin/add_main_course_form');
            }
       }
       
       
       public function Hide_Main_Subject()
       {
            $mains_id = $this->uri->segment(3);
            $this->WebAdmin_Model->Hide_Main_Subject($mains_id);
            $this->session->set_flashdata('msg', 'Record is now Hidden.');
            redirect(base_url() . 'WebAdmin/add_main_course_form');
       }
       
       
       public function Show_Main_Subject()
       {
            $mains_id = $this->uri->segment(3);
            $this->WebAdmin_Model->Show_Main_Subject($mains_id);
            $this->session->set_flashdata('msg', 'Record is now Visible.');
            redirect(base_url() . 'WebAdmin/add_main_course_form');
       }
       
       
       public function Edit_Main_Course()
       {
        $mains_id =$this->input->post('id');
        
        $record = $this->WebAdmin_Model->Get_MainCourse_Title($mains_id);
        
        foreach ($record as $record) {
        $mains_title = $record->mains_title;
        }
        
        $data['title'] = $mains_title;
        $data['mains_id'] = $mains_id;
            
        $this->load->view('admin/courses/edit_main_course', $data);
       }
       
       public function edit_mains_query()
       {
            $mains_title = strtoupper($this->input->post('mains_title'));
            $mains_id = $this->input->post('mains_id');
            
            $this->WebAdmin_Model->edit_mains_query($mains_id,$mains_title);
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_main_course_form');
       }
       
       public function add_sub_course_form()
       {
           
         $data['result'] = $this->WebAdmin_Model->MainCourse_List2();
         
         $data['subc'] = $this->WebAdmin_Model->SubCourse_List();
         
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/courses/add_sub_course_form',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       
       public function create_sub_course()
       {
           extract($_POST);
            //$subs_title = ucwords($this->input->post('subs_title'));
            $mains_id   = $this->input->post('mains_id');
            $countt =  $this->input->post('countt');
            
            for($i=0;$i<$countt;$i++)
            {
                
              $maxid = $this->General_Model->find_maxid("subs_id", "sub_subjects");
              foreach ($maxid as $maxid) {
              $Maxtype = $maxid->subs_id;
              } 
              
              $data = array('subs_id' => $Maxtype,
                            'mains_id' => $mains_id,
                            'subs_title' => ucwords($subs_title[$i])
                             );
              
              $this->General_Model->create_record($data, "sub_subjects");
              
            }
            
            
            //$maxid = $this->General_Model->find_maxid("subs_id", "sub_subjects");
            //foreach ($maxid as $maxid) {
            //$Maxtype = $maxid->subs_id;
            //}
            
            //$data = array('subs_id' => $Maxtype,
            //               'mains_id' => $mains_id,
            //               'subs_title' => $subs_title
            //               );
             
            //$this->General_Model->create_record($data, "sub_subjects");
                          
             
             $this->session->set_flashdata('msg', 1);
             redirect(base_url() . 'WebAdmin/add_sub_course_form');
            
       }
       
       public function Delete_SubSubject()
       {
           $subs_id = $this->uri->segment(3);
           $this->WebAdmin_Model->Delete_SubSubject($subs_id);
           
           $this->session->set_flashdata('msg', 2);
           redirect(base_url() . 'WebAdmin/add_sub_course_form');
       }
       
       public function Edit_Sub_Course()
       {
        $subs_id =$this->input->post('id');
        
        $record = $this->WebAdmin_Model->Get_SubC_Details($subs_id);
        
        foreach ($record as $record) {
        $mains_title = $record->mains_title;
        $subs_title = $record->subs_title;
        $mains_id = $record->mains_id;
        $subs_id = $record->subs_id;
        }
        
        $data['mains_title'] = $mains_title;
        $data['subs_title'] = $subs_title;
        $data['mains_id'] = $mains_id;
        $data['subs_id'] = $subs_id;
        
        $data['mainc_list'] = $this->WebAdmin_Model->MainCourse_List2();
            
        $this->load->view('admin/courses/edit_sub_course', $data);
       }
       
       
       public function edit_subs_query()
       {
            $subs_title = ucwords($this->input->post('subs_title'));
            $subs_id = $this->input->post('subs_id');
            $mains_id   = $this->input->post('mains_id');
            
            $this->WebAdmin_Model->edit_subs_query($subs_title,$mains_id,$subs_id );
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_sub_course_form');
       }
       
       
       public function add_country()
       {
         $data['result'] = $this->WebAdmin_Model->Countries_List();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/add_country',$data);
         $this->load->view('admin/template/footer.php');
       }
           
       public function create_country()
       {
            $country_name    = strtoupper($this->input->post('country_name'));
           
            $maxid = $this->General_Model->find_maxid("country_id", "country");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->country_id;
            }
            
            $data = array('country_id' => $Maxtype, 'country_name' => $country_name);
                      
            $check_country = $this->WebAdmin_Model->check_country($country_name);
             
            foreach ($check_country as $record) {
            $tot_record = $record->tot;
            }
           
            if($tot_record > 0)
            {   
                
                $this->session->set_flashdata('msg', 1);
                redirect(base_url() . 'WebAdmin/add_country');    
                
            } else {
             
                $this->General_Model->create_record($data, "country");
                $this->session->set_flashdata('msg', 2);
                redirect(base_url() . 'WebAdmin/add_country');
            }
       }
       
       
       public function Edit_Country()
       {
          
        $country_id =$this->input->post('id');
               
        $record = $this->WebAdmin_Model->Get_Country_Name($country_id);
        
        foreach ($record as $record) {
        $country_name = $record->country_name;
        }
        
        $data['country_name'] = $country_name;
        $data['country_id'] = $country_id;
            
        $this->load->view('admin/general/edit_country', $data);
       }
       
              
       public function edit_country_query()
       {
            $country_name = strtoupper($this->input->post('country_name'));
            $country_id = $this->input->post('country_id');
                                    
            $data = array('country_name' => $country_name);
            $wher = array('country_id' => $country_id);

            $this->General_Model->update_record($data, "country", $wher);
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_country');
       }
       
              
       public function Delete_Country()
       {
           $country_id = $this->uri->segment(3);
           $this->WebAdmin_Model->Delete_Country($country_id);
           
           $this->session->set_flashdata('msg', 2);
           redirect(base_url() . 'WebAdmin/add_country');
       }
       
       
       public function edit_profile()
       {
             $data['admin_id']    =  $this->session->userdata('admin_id');
             //$data['admin_fname'] =  $this->session->userdata('admin_fname');
             //$data['admin_lname'] =  $this->session->userdata('admin_lname');
             
             $adid = $this->session->userdata('admin_id');
             $get_pass = $this->WebAdmin_Model->Get_User_Details($adid);
             foreach($get_pass as $pass)
             {
                 $data['admin_password'] = $pass->admin_password;
                 $data['admin_fname'] = $pass->admin_fname;
                 $data['admin_lname'] = $pass->admin_lname;
             }
             $this->load->view('admin/template/header.php');
             $this->load->view('admin/template/header_bar.php');
             $this->load->view('admin/template/sidebar.php');
             $this->load->view('admin/general/edit_profle', $data);
             $this->load->view('admin/template/footer.php');
       }
       
       
       public function edit_profile_query()
       {
            $admin_fname    = ucwords($this->input->post('admin_fname'));
            $admin_lname    = ucwords($this->input->post('admin_lname'));
            $admin_id = $this->input->post('admin_id');
            
            $this->WebAdmin_Model->edit_profile_query($admin_id,$admin_fname,$admin_lname);
            $this->session->set_flashdata('msg', 1);
            redirect(base_url() . 'WebAdmin/edit_profile');
       }
       
       
       public function change_password()
       {
        $old_pass = md5($this->input->post('old_pass'));
        $new_pass = md5($this->input->post('new_pass'));
        $admin_id = $this->input->post('admin_id');
        
        $query = $this->WebAdmin_Model->Get_User_Details($admin_id);
        foreach ($query as $rec)
        {
            $pass = $rec->admin_password;
        }
        
        if($pass == $old_pass)
        {
         $this->WebAdmin_Model->Change_Password($admin_id,$new_pass);
         $this->session->set_flashdata('msg', 2);
         redirect(base_url() . 'WebAdmin/edit_profile');
            
        } else {
         $this->session->set_flashdata('msg', 'Password cannot be changed. Please enter the valid old password.');
         redirect(base_url() . 'WebAdmin/edit_profile');
        }
        
       }
       
       
       /*  ADD / VIEW / EDIT / DELETE SUBJECT LEVELS */
       
       public function add_subject_level()
       {
         $data['result'] = $this->WebAdmin_Model->SubjectLevel_List();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/add_subject_level',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       
       public function create_subject_level()
       {
            $sub_level_title    = strtoupper($this->input->post('sub_level_title'));
           
            $maxid = $this->General_Model->find_maxid("sub_level_id", "subject_level");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->sub_level_id;
            }
            
            $data = array('sub_level_id' => $Maxtype, 'sub_level_title' => $sub_level_title);

            $this->General_Model->create_record($data, "subject_level");
            $this->session->set_flashdata('msg', 1);
            redirect(base_url() . 'WebAdmin/add_subject_level');
            
       }
       
       
        public function Edit_Level()
        {
                     
        $sub_level_id =$this->input->post('id');

         $record = $this->WebAdmin_Model->Get_Level_Name($sub_level_id);
        
        foreach ($record as $record) {
        $sub_level_title = $record->sub_level_title;
        }
        
        $data['sub_level_title'] = $sub_level_title;
        $data['sub_level_id'] = $sub_level_id;
            
        $this->load->view('admin/general/edit_subject_level', $data);
        }
       
       
       public function edit_subject_level_query()
       {
            $sub_level_title = strtoupper($this->input->post('sub_level_title'));
            $sub_level_id = $this->input->post('sub_level_id');
                        
            $data = array('sub_level_title' => $sub_level_title);
            $wher = array('sub_level_id' => $sub_level_id);

            $this->General_Model->update_record($data, "subject_level", $wher);
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_subject_level');
       }
       
       public function Delete_Level()
       {
           $sub_level_id = $this->uri->segment(3);
           
           $wher = array('sub_level_id' => $sub_level_id);

           $this->General_Model->delete_record("subject_level", $wher);
           
           $this->session->set_flashdata('msg', 2);
           redirect(base_url() . 'WebAdmin/add_subject_level');
       }
       
       
       /*  ADD / VIEW / EDIT / DELETE QUALIFICATION LEVEL */
       
       public function add_qual_level()
       {
           
         $select = array('qual_level_title','qual_level_id'); 
           
         $data['result'] = $this->General_Model->select_record("qualification_level", $select);
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/add_qual_level',$data);
         $this->load->view('admin/template/footer.php');   
       }
       
       public function create_qual_level()
       {
            $qual_level_title    = strtoupper($this->input->post('qual_level_title'));
           
            $maxid = $this->General_Model->find_maxid("qual_level_id", "qualification_level");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->qual_level_id;
            }
            
            $data = array('qual_level_id' => $Maxtype, 'qual_level_title' => $qual_level_title);

            $this->General_Model->create_record($data, "qualification_level");
            $this->session->set_flashdata('msg', 1);
            redirect(base_url() . 'WebAdmin/add_qual_level');
       }
       
       
       public function Edit_Qual_Level()
       {
        
        $qual_level_id =$this->input->post('id');

        $record = $this->WebAdmin_Model->Get_Qual_Level_Name($qual_level_id);
        
        foreach ($record as $record) {
        $qual_level_title = $record->qual_level_title;
        }
        
        $data['qual_level_title'] = $qual_level_title;
        $data['qual_level_id'] = $qual_level_id;
            
        $this->load->view('admin/general/edit_qual_level', $data);
       }
       
       
       
       public function edit_qual_level_query()
       {
            $qual_level_title = strtoupper($this->input->post('qual_level_title'));
            $qual_level_id = $this->input->post('qual_level_id');
                        
            $data = array('qual_level_title' => $qual_level_title);
            $wher = array('qual_level_id' => $qual_level_id);

            $this->General_Model->update_record($data, "qualification_level", $wher);
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_qual_level');
       }
       
       
       public function Delete_Qual_Level()
       {
           $qual_level_id = $this->uri->segment(3);
           
           $wher = array('qual_level_id' => $qual_level_id);

           $this->General_Model->delete_record("qualification_level", $wher);
           
           $this->session->set_flashdata('msg', 2);
           redirect(base_url() . 'WebAdmin/add_qual_level'); 
       }
       
       
       /*  STUDENT DETAILS  */
       
    
       public function view_all_students()
	{
                $data['students'] = $this->WebAdmin_Model->List_of_all_Students();

                $this->load->view('admin/template/header.php');
                $this->load->view('admin/template/header_bar.php');
                $this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/students/view_all_students.php',$data);
                $this->load->view('admin/template/footer.php');
	}
       
       
       public function Student_Detail()
       {
         $student_id = $this->uri->segment(3);
         
         $data['record']            = $this->WebAdmin_Model->Student_Details($student_id);
         $data['std_subjects']      = $this->Student_Model->GetStudentSubjects($student_id);
         $data['inbox']             = $this->Student_Model->get_student_inbox_msgs($student_id);
         $data['send_msgs']         = $this->Student_Model->get_student_send_msgs($student_id);
         
         $data['std_payment'] = $this->Student_Model->get_student_payment_details($student_id);
           
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
         $this->load->view('admin/students/student_details', $data);
         $this->load->view('admin/template/footer.php');   

       }
       
       public function DeactivateStudent()
       {
       $student_id = $this->uri->segment(3);
       
       $stdid = $this->WebAdmin_Model->Get_student_email_id($student_id);
       
       foreach($stdid as $sid) 
       {
           $std_email = $sid->login_email;
       }
       
       $this->WebAdmin_Model->Student_Deactivate($std_email);
                  
       $this->session->set_flashdata('msg', 2);
       redirect(base_url() . 'WebAdmin/Student_Detail/'.$student_id); 
       }
       
       public function Activate_Student_Account()
       {
       $student_id = $this->uri->segment(3);
       
       $stdid = $this->WebAdmin_Model->Get_student_email_id($student_id);
              
       foreach($stdid as $sid) 
       {
           $std_email = $sid->login_email;
       }
       
              
       $this->WebAdmin_Model->Student_Activate($std_email);
                  
       $this->session->set_flashdata('msg', 1);
       redirect(base_url() . 'WebAdmin/Student_Detail/'.$student_id); 
       
       }
       
       
       /* TUTOR ACCOUNT DETAILS */
       
           
       public function view_all_tutors()
	{
         $data['tutors'] = $this->Tutors_Model->List_of_all_Tutors();

                $this->load->view('admin/template/header.php');
                $this->load->view('admin/template/header_bar.php');
                $this->load->view('admin/template/sidebar.php');
		$this->load->view('admin/tutors/view_all_tutors',$data);
                $this->load->view('admin/template/footer.php');
	}
              
       public function Tutor_Detail()
       {
         $tutor_id = $this->uri->segment(3);
         
         $data['record']            = $this->Tutors_Model->Tutor_Details($tutor_id);
         $data['tut_subjects']      = $this->Tutors_Model->GetTutorsSubjects($tutor_id);
         $data['tut_qualification'] = $this->Tutors_Model->GetTutor_Qualification($tutor_id);
         $data['tut_experience']    = $this->Tutors_Model->GetTutor_Experience($tutor_id);
         $data['tut_reference']     = $this->Tutors_Model->GetTutor_Reference($tutor_id);
         
        /* Tutor Feedbacks */
        $data['tut_feedback']       = $this->Tutors_Model->get_tutor_feedbacks($tutor_id);
        $data['tut_feedback_count'] = $this->Tutors_Model->get_tutor_feedbacks_count($tutor_id);
              
        $data['tut_payment']        = $this->Tutors_Model->get_tutor_payment_details($tutor_id);
        $data['tut_payment_count']  = $this->Tutors_Model->get_tutor_payment_count($tutor_id);
 
         $data['inbox']             = $this->Tutors_Model->get_tutor_inbox_msgs($tutor_id);
         $data['send_msgs']         = $this->Tutors_Model->get_tutor_send_msgs($tutor_id);

         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
         $this->load->view('admin/tutors/tutor_details', $data);
         $this->load->view('admin/template/footer.php');   
       }
       
       
       public function Deactivate_Tutor_Account()
       {
        
       $tutor_id = $this->uri->segment(3);
       $tutid = $this->Tutors_Model->Get_tutor_email_id($tutor_id);
       
       foreach($tutid as $tid) 
       {
           $tut_email = $tid->login_email;
       }
       
       $this->Tutors_Model->Tutor_Deactivate($tut_email);
                  
       $this->session->set_flashdata('msg', 2);
       redirect(base_url() . 'WebAdmin/Tutor_Detail/'.$tutor_id); 
       }
       
       public function Activate_Tutor_Account()
       {
       
       $tutor_id = $this->uri->segment(3);
       
       $tutid = $this->Tutors_Model->Get_tutor_email_id($tutor_id);
              
       foreach($tutid as $tid) 
       {
           $tut_email = $tid->login_email;
       }
       
              
       $this->Tutors_Model->Tutor_Activate($tut_email);
                  
       $this->session->set_flashdata('msg', 1);
       redirect(base_url() . 'WebAdmin/Tutor_Detail/'.$tutor_id); 
       }
       
           

       /** VERIFY TUTOR ACCOUNT **/
       
       public function Verify_Tutor_Account()
       {
       $tutor_id = $this->uri->segment(3);
      
       $data  =  array('is_verified' => 'YES');
       $wher = array('tutor_id' => $tutor_id);
       $this->General_Model->update_record($data, "tutor_main", $wher);
       
       $this->session->set_flashdata('msg', 'Tutor Account has been verified.');
       redirect(base_url() . 'WebAdmin/Tutor_Detail/'.$tutor_id); 
       }
       
       
       
       
       /*  ADD / VIEW / EDIT / DELETE TOWNS  */
       
      public function add_town()
       {
         $data['result'] = $this->WebAdmin_Model->Town_List();
         $data['countries'] = $this->WebAdmin_Model->Countries_List();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/add_town',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       
       public function create_town_query()
       {
            $town_name = ucwords($this->input->post('town_name'));
            $country_id = $this->input->post('country_id');
           
            $maxid = $this->General_Model->find_maxid("town_id", "town");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->town_id;
            }
            
            $data = array('town_id' => $Maxtype,'country_id' => $country_id, 'town_name' => $town_name);
                      
            $check_town = $this->WebAdmin_Model->check_town_name($country_id,$town_name);
             
            foreach ($check_town as $record) {
            $tot_record = $record->tot;
            }
           
            if($tot_record > 0)
            {   
                $this->session->set_flashdata('msg', 2);
                redirect(base_url() . 'WebAdmin/add_town');    
                
            } else {
             
                $this->General_Model->create_record($data, "town");
                $this->session->set_flashdata('msg', 1);
                redirect(base_url() . 'WebAdmin/add_town');
            }
       }
       
       
       public function Edit_Town()
       {
               
        $town_id =$this->input->post('id');

        $record = $this->WebAdmin_Model->Get_Town_Name($town_id);
        
        foreach ($record as $record) {
        $town_title = $record->town_name;
        }
        
        $data['town_name'] = $town_title;
        $data['town_id'] = $town_id;
            
        $this->load->view('admin/general/edit_town', $data);
       }
       
       public function edit_town_query()
       {
            $town_name = ucwords($this->input->post('town_name'));
            $town_id = $this->input->post('town_id');
                                    
            $data = array('town_name' => $town_name);
            $wher = array('town_id' => $town_id);

            $this->General_Model->update_record($data, "town", $wher);
            
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');
            redirect(base_url() . 'WebAdmin/add_town');
       }
       
       
       /* Error Message shown to unverified tutors */
       
       public function unverified_tutor_error_msg()
       { 
         $data['result'] = $this->WebAdmin_Model->Unverified_Tutor_Error_Message();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/unverified_tutor_error_msg_form',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       
      public function Unverified_Account_Error_Msg_Query()
       {
       
       $editor1 =$this->input->post('editor1');
        
       $data = array('warning_msg_detail' => $editor1);
       $wher = array('warning_msg_type' => 'unverified_account');

       $this->General_Model->update_record($data, "warning_msgs", $wher);
       
       $this->session->set_flashdata('msg', 'Message Updated Successfully.');
       redirect(base_url() . 'WebAdmin/unverified_tutor_error_msg');
       }
       
       
       //** Warning Msg shown while sending msgs **//
       
       public function sending_msgs_error_msg()
       {
         $data['result'] = $this->WebAdmin_Model->sending_msgs_error_msg();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/sending_msgs_error_msg',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function sending_msgs_error_msg_query()
       {
       $editor1 =$this->input->post('editor1');
        
       $data = array('msgs_error_msg' => $editor1);
       $wher = array('error_msg_id' => 1);

       $this->General_Model->update_record($data, "sending_msgs_error_msg", $wher);
       
       $this->session->set_flashdata('msg', 'Message Updated Successfully.');
       redirect(base_url() . 'WebAdmin/sending_msgs_error_msg');    
       }
       
       
       //** Warning Msg shown while making paypal payment **//
       
       public function warning_msg_paypal_payment()
       {
         $data['result'] = $this->WebAdmin_Model->warning_msg_paypal_payment();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/warning_msg_paypal_payment',$data);
         $this->load->view('admin/template/footer.php');    
       }
       
       
       public function warning_msg_paypal_payment_query()
       {
       $editor1 =$this->input->post('editor1');
        
       $data = array('warning_msg_detail' => $editor1);
       $wher = array('warning_msg_type' => 'payment');

       $this->General_Model->update_record($data, "warning_msgs", $wher);
       
       $this->session->set_flashdata('msg', 'Message Updated Successfully.');
       redirect(base_url() . 'WebAdmin/warning_msg_paypal_payment');        
       }

       



       /** Restricted Words **/
       
       public function restricted_words_form()
       {
         $data['result'] = $this->WebAdmin_Model->restricted_words();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/restricted_words_form',$data);
         $this->load->view('admin/template/footer.php');    
       }
       
       public function restricted_words_query()
       {
            $rest_word = $this->input->post('rest_word');
           
            $maxid = $this->General_Model->find_maxid("rest_word_id", "restricted_words");
            foreach ($maxid as $maxid) {
            $Maxtype = $maxid->rest_word_id;
            }
            
            $data = array('rest_word_id' => $Maxtype, 'rest_word' => $rest_word);
                      
            $check_word = $this->WebAdmin_Model->check_rest_word($rest_word);
             
            foreach ($check_word as $record) {
            $tot_record = $record->tot;
            }
           
            if($tot_record > 0)
            {   
                $this->session->set_flashdata('msg', 1);
                redirect(base_url() . 'WebAdmin/restricted_words_form');    
            } else {
                $this->General_Model->create_record($data, "restricted_words");
                $this->session->set_flashdata('msg', 2);
                redirect(base_url() . 'WebAdmin/restricted_words_form');
            }    
       }
       
       
       public function delete_rest_word()
       {
       $rest_word_id = $this->uri->segment(3);
       $wher = array('rest_word_id' => $rest_word_id);
       $this->General_Model->delete_record('restricted_words', $wher);
       $this->session->set_flashdata('msg', 'Record deleted successfully.');
       redirect(base_url() . 'WebAdmin/restricted_words_form');
       }
       
       
       //** VIEW ALL MESSAGES BY ADMIN **//
       
       public function view_all_msgs()
       {
         $data['result'] = $this->WebAdmin_Model->view_all_msgs();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/messages/view_all_msgs',$data);
         $this->load->view('admin/template/footer.php');      
       }
       
       
       public function view_message_details()
       {
         $msg_id = $this->uri->segment(3);
                 
         $data['result'] = $this->WebAdmin_Model->view_message_details($msg_id);
         $data['reply']  = $this->WebAdmin_Model->view_message_reply_details($msg_id);
         $data['check_reply']  = $this->Main_User_Model->check_msg_reply($msg_id);
        
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/messages/view_msg_details',$data);
         $this->load->view('admin/template/footer.php');      
       }
       
       public function view_all_msgs_sent_by_students()
       {
        $data['result'] = $this->WebAdmin_Model->view_all_msgs_sent_by_students();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/messages/view_all_msgs',$data);
         $this->load->view('admin/template/footer.php');          
       }
       
       
       public function view_all_msgs_sent_by_tutors()
       {
         $data['result'] = $this->WebAdmin_Model->view_all_msgs_sent_by_tutors();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/messages/view_all_msgs',$data);
         $this->load->view('admin/template/footer.php');          
       }
       
       
       
       /* View Feedback Details */
       
       public function view_feedback_details()
       {
         $tut_feedback_id = $this->uri->segment(3);
                 
         $data['result']       = $this->Tutors_Model->view_feedback_details($tut_feedback_id);
         $data['reply']        = $this->Tutors_Model->view_feedback_reply_details($tut_feedback_id);
         $data['check_reply']  = $this->Tutors_Model->view_feedback_reply_details_count($tut_feedback_id);
        
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/tutors/view_feedback_details',$data);
         $this->load->view('admin/template/footer.php');      
       }
       
       
       
       /** VIEW ALL PAYMENTS **/
       
       public function view_all_payments()
       {
         $data['result'] = $this->WebAdmin_Model->view_all_payments();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/payment/view_all_payments',$data);
         $this->load->view('admin/template/footer.php');       
       }
       
       
       public function show_subs_form()
       {
           $idd = $this->input->post('id');
           
           for($i=1;$i<=$idd;$i++) {

            echo "<tr>";
            echo "<td> $i </td>";
            echo "<td style='padding-left:10px'> <input type='text' class='form-control' name='subs_title[]' style='width: 100%'> </td>";
            echo "</tr>";
            }
       }
       
       /** PAYPAL SETTINGS **/
       
       public function paypal_settings_form()
       {
           
         $data['result'] = $this->WebAdmin_Model->paypal_settings();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/paypal_settings_form',$data);
         $this->load->view('admin/template/footer.php');    
       }
       
       
       public function paypal_settings_query()
       {
       $paypal_account = $this->input->post('paypal_account');
       $purchase_amount = $this->input->post('purchase_amount');
       
       $new_purchase_amount = str_replace(' ', '', $purchase_amount);
       $new_paypal_account  = str_replace(' ', '', $paypal_account);
       
       $data = array('paypal_account' => $new_paypal_account,'purchase_amount' => $new_purchase_amount);
       $wher = array('pay_id' => 1);

       $this->General_Model->update_record($data, "paypal_settings", $wher);
       
       $this->session->set_flashdata('msg', 'Paypal Settings Updated Successfully.');
       redirect(base_url() . 'WebAdmin/paypal_settings_form');            
       }
       
       
       /** ADVERTISEMENTS **/
       
       public function advertisements_form()
       {
         
         $data['result'] = $this->WebAdmin_Model->get_all_ads();
                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/advertisements',$data);
         $this->load->view('admin/template/footer.php');    
       }
       
       public function advertisements_add_query()
       {
        $this->load->library('upload');
        
        if( ! ini_get('date.timezone') ) { date_default_timezone_set('GMT'); }
        
        $ad_title        = $this->input->post('ad_title');   
        $ad_publish_date = $this->input->post('ad_publish_date');   
        $ad_expire_date  = $this->input->post('ad_expire_date');   
        $ad_description  = $this->input->post('ad_description');   
        $ad_link         = $this->input->post('ad_link');  
        
        $new_publish_date = date("Y-m-d", strtotime($ad_publish_date));
        $new_expire_date  = date("Y-m-d", strtotime($ad_expire_date));
        
        $maxid = $this->General_Model->find_maxid("ad_id", "advertisements");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->ad_id;
        }
        
        /** UPLOAD ADD IMAGE **/
        
        $ad_pic = $_FILES['ad_pic']['name'];
                
        $config = array ('upload_path' => './ads/',
                         'allowed_types' => "jpeg|jpg|png",
                         'overwrite' => TRUE,
                         'file_name' => $Maxtype."-".$ad_title
                         );
        
        $extension2 = pathinfo($ad_pic);
        $ext2 = $extension2['extension'];
        
        $this->upload->initialize($config);
        $this->upload->do_upload('ad_pic');
        $image = str_replace(' ','_',$config['file_name'].".".$ext2);

            
        $data = array('ad_id' => $Maxtype,
                      'ad_title' => ucwords($ad_title),
                      'ad_expire_date' => $new_expire_date, 
                      'ad_publish_date'=> $new_publish_date, 
                      'ad_description' => $ad_description, 
                      'ad_link' => $ad_link, 
                      'ad_pic' => $image);

            $this->General_Model->create_record($data, "advertisements");
            $this->session->set_flashdata('msg', 'Record successfully added.');
            redirect(base_url() . 'WebAdmin/advertisements_form'); 
        
       }
       
       
       public function advertise_details()
       {
           
        $addid  = $this->uri->segment(3);   
        $data['record'] = $this->WebAdmin_Model->get_ad_details($addid);   
        
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
         $this->load->view('admin/general/advertisement_details', $data);
         $this->load->view('admin/template/footer.php');   
        
       }
       
       public function delete_ad()
       {
       $addid  = $this->uri->segment(3);
       
       $wher = array('ad_id' => $addid);

       $this->General_Model->delete_record("advertisements", $wher);
           
       $this->session->set_flashdata('msg', 'Record Deleted');
       redirect(base_url() . 'WebAdmin/advertisements_form');
       }
       
       
       public function edit_ad_form()
       {
        $addid  = $this->uri->segment(3);
        $data['record'] = $this->WebAdmin_Model->get_ad_details($addid); 
        
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	 $this->load->view('admin/general/edit_advertisement_form',$data);
         $this->load->view('admin/template/footer.php');   
        
       }
       
       
       public function edit_ad_query()
       {
           
        $ad_title        = $this->input->post('ad_title');   
        $ad_expire_date  = $this->input->post('ad_expire_date');   
        $ad_description  = $this->input->post('ad_description');   
        $ad_link         = $this->input->post('ad_link'); 
        $ad_id           = $this->input->post('ad_id'); 
        
        
                   
        $data = array('ad_title' => ucwords($ad_title),
                      'ad_expire_date' => $ad_expire_date, 
                      'ad_description' => $ad_description, 
                      'ad_link' => $ad_link
                      );
        
        
       $wher = array('ad_id' => $ad_id);

       $this->General_Model->update_record($data, "advertisements", $wher);
       
       $this->session->set_flashdata('msg', 'Record has been modified.');
       redirect(base_url() . 'WebAdmin/advertisements_form');
       
       }
       
       //** BLOGS **//
       
       public function add_blog_form()
       {
           
        $data['result'] = $this->WebAdmin_Model->view_all_blogs();

                 
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	     $this->load->view('admin/general/add_blog_form',$data);
         $this->load->view('admin/template/footer.php');       
       }
       
       public function add_blog_query()
       {
        $this->load->library('upload');
        
        if(!ini_get('date.timezone') ) { date_default_timezone_set('GMT'); }
        
        $blog_title        = $this->input->post('blog_title');   
        $blog_link         = $this->input->post('blog_link');
        
        $maxid = $this->General_Model->find_maxid("blog_id", "blogs");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->blog_id;
        }
        
        /** UPLOAD ADD IMAGE **/
        
        $blog_image = $_FILES['blog_image']['name'];
                
        $config = array ('upload_path' => './blogs/',
                         'allowed_types' => "jpeg|jpg|png",
                         'overwrite' => TRUE,
                         'file_name' => $Maxtype."-Blog-".$Maxtype
                         );
        
        $extension2 = pathinfo($blog_image);
        $ext2 = $extension2['extension'];
        
        $this->upload->initialize($config);
        $this->upload->do_upload('blog_image');
        $image = $config['file_name'].".".$ext2;

       if($ext2 == 'jpg' || $ext2 == 'jpeg' || $ext2 == 'png' || $ext2 == 'JPG' || $ext2 == 'JPEG' || $ext2 == 'PNG')
        {   
        $data = array('blog_id' => $Maxtype,
                      'blog_title' => $blog_title,
                      'blog_link' => $blog_link,
                      'blog_image' => str_replace(' ','_',$image)
                      );

            $this->General_Model->create_record($data, "blogs");
            $this->session->set_flashdata('msg', 'Blog successfully added.');
            redirect(base_url() . 'WebAdmin/add_blog_form'); 
            
        } else {
         $this->session->set_flashdata('msg2', 'Invalid Image Format. Please use images with jpg, jpeg, png, JPG, JPEG and PNG formats only.');
         redirect(base_url() . 'WebAdmin/add_blog_form');     
        }
        
        
       }
       
       public function delete_blog()
       {
       $blog_id  = $this->uri->segment(3);
       
       $query = $this->General_Model->fetch_CoustomQuery("SELECT `blog_image` FROM `blogs` WHERE `blog_id` = $blog_id"); 
       foreach ($query as $fr) { $name = $fr->blog_image; }
               
       
       $wher = array('blog_id' => $blog_id);

       $this->General_Model->delete_record("blogs", $wher);
           
       $this->session->set_flashdata('msg2', 'Record Deleted.');
       
       unlink(FCPATH.'blogs/'.$name);
       
       redirect(base_url() . 'WebAdmin/add_blog_form');    
       }

}


