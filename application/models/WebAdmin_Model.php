<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class WebAdmin_Model extends CI_Model {
    
    public function LoginAuth($email, $password)
    {
        
        $query = $this->db->query("SELECT `admin_email`, `admin_password`,`admin_id`,`admin_fname`,`admin_lname`,`is_active`  
                                   FROM `admin_login` 
                                   WHERE `admin_email` = '$email' AND `admin_password` = '$password' AND `is_active` = 1");

        return $query->first_row('array');
    }
    
    
    public function Check_Email($email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM `admin_login` WHERE `admin_email` = '$email'");
        
        return $query->result();
    }
    
    
    public function UsersList() {
        
        $query = $this->db->query("SELECT * FROM `admin_login` WHERE `is_sup_admin` = 0");
        return $query->result();
    }
    
    public function Deactivate_User($admin_id)
    {
        $query = $this->db->query("UPDATE `admin_login` SET `is_active` = 0 WHERE `admin_id` = $admin_id");
        
    }
    
    
    public function Activate_User($admin_id)
    {
        $query = $this->db->query("UPDATE `admin_login` SET `is_active` = 1 WHERE `admin_id` = $admin_id");
    }
    
    
    public function get_user_first_name($admin_id)
    {
    $query = $this->db->query("SELECT `admin_fname` FROM `admin_login` WHERE `admin_id` =$admin_id");
    return $query->result();
    }

    public function reset_user_password_query($admin_id,$fname)
    {
        $query = $this->db->query("UPDATE `admin_login` SET `admin_password` = MD5('$fname') WHERE `admin_id`=$admin_id");
    }
    
    
    public function check_main_course($mname)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `main_subjects` WHERE `mains_title` = '$mname'");
    return $query->result();
    }
    
    public function MainCourse_List()
    {
        $query = $this->db->query("SELECT ms.`mains_id`,ms.`mains_title`,ms.`mains_visibility`,
                                  (SELECT COUNT(1) FROM `sub_subjects` AS ss WHERE ss.`mains_id`=ms.`mains_id`) AS tot 
                                  FROM `main_subjects` AS ms");
        return $query->result();
    }
    
    public function Hide_Main_Subject($mains_id)
    {
        $this->db->query("UPDATE `main_subjects` SET `mains_visibility` = 'HIDDEN' WHERE `mains_id` = $mains_id");
    }
    
    public function Show_Main_Subject($mains_id)
    {
        $this->db->query("UPDATE `main_subjects` SET `mains_visibility` = 'VISIBLE' WHERE `mains_id` = $mains_id");
    }
    
    
    public function Get_MainCourse_Title($mains_id)
    {
        $query = $this->db->query("SELECT `mains_title` FROM `main_subjects` WHERE `mains_id` =  $mains_id");
        return $query->result();
    }
    
    public function edit_mains_query($mains_id,$mains_title)
    {
    $this->db->query("UPDATE `main_subjects` SET `mains_title` = '$mains_title' WHERE `mains_id` = $mains_id");
    }
    
    
    public function MainCourse_List2()
    {
        $query = $this->db->query("SELECT `mains_id`,`mains_title` FROM `main_subjects` WHERE `mains_visibility` = 'VISIBLE'");
        return $query->result();
    }
    
    public function SubCourse_List()
    {
      $query = $this->db->query("SELECT mc.`mains_title`, sc.`subs_title`,sc.`subs_id` FROM `main_subjects` AS mc, `sub_subjects` AS sc WHERE mc.`mains_id` = sc.`mains_id` ORDER BY sc.`subs_title` ASC");
      return $query->result();
    }
    
    public function Delete_SubSubject($subs_id)
    {
        $query = $this->db->query("DELETE FROM `sub_subjects` WHERE `subs_id` = $subs_id");
    }
    
    public function Get_SubC_Details($subs_id)
    {
        $query = $this->db->query("SELECT mc.`mains_title`, sc.`subs_title`,sc.`subs_id` , mc.`mains_id` FROM `main_subjects` AS mc, `sub_subjects` AS sc WHERE mc.`mains_id` = sc.`mains_id` AND sc.`subs_id` = $subs_id");
        return $query->result();
        
    }
    
    
    public function edit_subs_query($subs_title,$mains_id,$subs_id )
    {
        $query = $this->db->query("UPDATE `sub_subjects` SET `mains_id` = $mains_id,`subs_title` = '$subs_title' WHERE `subs_id` = $subs_id");
    }
    
    
    public function Countries_List()
    {
        $query = $this->db->query("SELECT `country_id`, `country_name` FROM `country`");
        return $query->result();
    }
    
    
    public function Town_List()
    {
        $query = $this->db->query("SELECT tt.`country_id`,tt.`town_id`,tt.`town_name`,cc.`country_id`,cc.`country_name` 
                                   FROM `town` AS tt, `country` AS cc
                                   WHERE tt.`country_id`=cc.`country_id`");
        return $query->result();
    }
    
    
    public function check_country($country_name)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `country` WHERE `country_name` = '$country_name'");
    return $query->result();
    }
    
    
    public function check_town_name($country_id,$town_name)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `town` WHERE `town_name` = '$town_name' AND `country_id` = $country_id");
    return $query->result();
    }
    
    
    public function Get_Town_Name($town_id)
    {
    $query = $this->db->query("SELECT `town_name`,`town_id` FROM `town` WHERE `town_id` = $town_id");
    return $query->result();
    }

        public function Get_Country_Name($country_id)
    {
        $query = $this->db->query("SELECT `country_name` FROM `country` WHERE `country_id` =  $country_id");
        return $query->result();
    }
    
    //public function edit_country_query($country_id,$country_name)
    //{
    //$this->db->query("UPDATE `country` SET `country_name` = '$country_name' WHERE `country_id` = $country_id");
    //}
    
        
    public function Delete_Country($country_id)
    {
        $query = $this->db->query("DELETE FROM `country` WHERE `country_id` = $country_id");
    }
    
    
    public function Get_User_Details($adid)
    {
        $query = $this->db->query("SELECT `admin_password`,`admin_fname`,`admin_lname` FROM `admin_login` WHERE `admin_id` = $adid");
        return $query->result();
    }
    
    public function edit_profile_query($admin_id,$admin_fname,$admin_lname)
    {
        $this->db->query("UPDATE `admin_login` SET `admin_fname` = '$admin_fname', `admin_lname` = '$admin_lname' WHERE `admin_id` = $admin_id");
    }
    
    public function Change_Password($admin_id,$new_pass)
    {
        $this->db->query("UPDATE `admin_login` SET `admin_password` = '$new_pass' WHERE `admin_id` = $admin_id");
    }
    
     
    public function SubjectLevel_List()
    {
        $query = $this->db->query("SELECT `sub_level_id`, `sub_level_title` FROM `subject_level`");
        return $query->result();
    }
    
            
    public function Get_Level_Name($sub_level_id)
    {
        $query = $this->db->query("SELECT `sub_level_title` FROM `subject_level` WHERE `sub_level_id` =  $sub_level_id");
        return $query->result();
    }
    
    public function Get_Qual_Level_Name($qual_level_id)
    {
    $query = $this->db->query("SELECT `qual_level_title` FROM `qualification_level` WHERE `qual_level_id` =  $qual_level_id");
    return $query->result();  
    }
    
    public function List_of_all_Students()
    {
  $query = $this->db->query("SELECT s.`student_id`, 
                                    s.`country_id`, 
                                    s.`login_email`, 
                                    s.`std_fname`, 
                                    s.`std_lname`, 
                                    s.`std_phone_mobile`, 
                                    s.`std_address_line1`, 
                                    s.`std_address_line2`,
                                    s.`std_distance_travel`, 
                                    s.`std_dob`, 
                                    s.`std_personal_stat`, 
                                    s.`std_phone_home`, 
                                    s.`std_postcode`, 
                                    s.`std_profile_pic`, 
                                    DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )AS stddate,
                                    s.`std_title`, 
                                    s.`town_id`,
                                    s.`student_gender`,
                                    c.`country_name`,
                                    c.`country_id`,
                                    l.`login_account_status`,
                                    l.`login_account_type`,
                                    l.`login_email`,
                                    t.`town_id`,
                                    t.`town_name`

    FROM `student_main` AS s, `country` AS c, `login` AS l, `town` AS t
    WHERE s.`country_id` = c.`country_id` AND s.`login_email` = l.`login_email`
    AND s.`town_id` = t.`town_id`");
        return $query->result();  
    }
    
    
    public function Student_Details($student_id)
    {
    $query = $this->db->query("SELECT s.`student_id`, 
                                    s.`country_id`, 
                                    s.`login_email`, 
                                    s.`std_fname`, 
                                    s.`std_lname`, 
                                    s.`std_phone_mobile`, 
                                    s.`std_address_line1`, 
                                    s.`std_address_line2`,
                                    s.`std_distance_travel`, 
                                    DATE_FORMAT(s.`std_dob` , '%a - %d/%m/%Y' )as std_dob, 
                                    s.`std_personal_stat`, 
                                    s.`std_phone_home`, 
                                    s.`std_postcode`, 
                                    s.`std_profile_pic`,  
                                    s.`std_title`, 
                                    s.`town_id`,
                                    s.`student_gender`,
                                    c.`country_name`,
                                    c.`country_id`,
                                    l.`login_account_status`,
                                    l.`login_account_type`,
                                    l.`login_email`,
                                    t.`town_id`,
                                    t.`town_name`

    FROM `student_main` AS s, `country` AS c, `login` AS l, `town` AS t
    WHERE s.`country_id` = c.`country_id` AND s.`login_email` = l.`login_email` 
    AND s.`town_id` = t.`town_id` AND s.`student_id` = $student_id");
        return $query->result();  
    }
    
    
    public function Get_student_email_id($student_id)
    {
        $query = $this->db->query("SELECT `login_email` FROM `student_main` WHERE `student_id` = $student_id");
        return $query->result(); 
    }

    public function Student_Deactivate($std_email)
    {
        $this->db->query("UPDATE `login` SET `login_account_status` = 'INACTIVE' WHERE `login_email` = '$std_email'");
    }
    
    public function Student_Activate($std_email)
    {
        $this->db->query("UPDATE `login` SET `login_account_status` = 'ACTIVE' WHERE `login_email` = '$std_email'");
    }
    
    public function Unverified_Tutor_Error_Message()
    {
    //$query = $this->db->query("SELECT `unver_acc_id`,`error_msg` FROM `unverified_account_error_msg`");
    $query = $this->db->query("SELECT `warning_msg_detail` FROM `warning_msgs` WHERE `warning_msg_type` = 'unverified_account'"); 
    return $query->result(); 
    }
    
    
    public function Get_SubSubject_Name($subs_id)
    {
    $query = $this->db->query("SELECT `subs_title` FROM `sub_subjects` WHERE `subs_id` = $subs_id"); 
    return $query->result();
    }
    
    
    public function sending_msgs_error_msg()
    {
    $query = $this->db->query("SELECT `error_msg_id`,`msgs_error_msg` FROM `sending_msgs_error_msg`");
    return $query->result();     
    }
    
    public function warning_msg_paypal_payment()
    {
     $query = $this->db->query("SELECT `warning_msg_detail` FROM `warning_msgs` WHERE `warning_msg_type` = 'payment'");  
     return $query->result();
    }

        public function restricted_words()
    {
    $query = $this->db->query("SELECT `rest_word_id`,`rest_word` FROM `restricted_words`");
    return $query->result();     
    }
    
    
    public function check_rest_word($rest_word)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `restricted_words` WHERE `rest_word` = '$rest_word'");
    return $query->result();    
    }
    
    
    
    public function view_all_msgs()
    {
     $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` ORDER BY mm.`date_time`");   
     return $query->result(); 
    }
    
    public function view_message_details($msg_id)
    {
     $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,ss.`std_profile_pic`, tm.`tut_profile_pic`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` WHERE mm.`msg_id` = $msg_id");   
     return $query->result();    
    }
    
    public function view_message_reply_details($msg_id)
    {
    $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,ss.`std_profile_pic`, tm.`tut_profile_pic`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` WHERE mm.`parent_id` = $msg_id");   
     return $query->result();     
    }
    
    
    /* VIEW MESSAGES SENT BY STUDENTS */
    
   public function view_all_msgs_sent_by_students()
   {
    $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'YES' AND mm.`sent_by_tutor` = 'NO'  ORDER BY mm.`date_time`");   
     return $query->result();     
   }


   /* VIEW MESSAGES SENT BY TUTORS */
    
   public function view_all_msgs_sent_by_tutors()
   {
    $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                      mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'NO' AND mm.`sent_by_tutor` = 'YES'  ORDER BY mm.`date_time`");   
     return $query->result();     
   }
   
   
   /* Content of Front Pages */
   
   public function view_home_page_content()
   {
    $query = $this->db->query("SELECT `page_id`,`page_name`,`page_content` FROM `pages` WHERE `page_name`='home'");   
    return $query->result(); 
   }
   
   public function view_faqs_page_content()
   {
    $query = $this->db->query("SELECT `page_id`,`page_name`,`page_content` FROM `pages` WHERE `page_name`='faqs'");   
    return $query->result(); 
   }
   
      
   public function view_contact_page_content()
   {
    $query = $this->db->query("SELECT `page_id`,`page_name`,`page_content` FROM `pages` WHERE `page_name`='contact_us'");   
    return $query->result(); 
   }
   
   
   /** VIEW ALL PAYMENTS **/
   
   public function view_all_payments()
   {
     $query = $this->db->query("SELECT p.`amount_paid`,DATE_FORMAT(p.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,p.`payment_id`,p.`payment_status`,p.`student_id`,p.`transaction_id`,p.`tutor_id`,
                                sm.`std_fname`,sm.`std_lname`,tm.`tut_fname`,tm.`tut_lname`
                                FROM `payment` p JOIN `student_main` sm ON sm.`student_id` = p.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = p.`tutor_id`");     
    return $query->result(); 
   }
   
   
   public function paypal_settings()
   {
       $query = $this->db->query("SELECT * FROM `paypal_settings` WHERE `pay_id`=1");   
       return $query->result(); 
   }
   
   public function get_all_ads()
   {
   $query = $this->db->query("SELECT `ad_id`,`ad_title`,`ad_pic`,`ad_link`,`ad_description`,
                             `ad_publish_date`,`ad_expire_date`,
                              DATE_FORMAT(`ad_publish_date`, '%a - %d-%m-%Y' )AS `new_ad_publish_date`,
                              DATE_FORMAT(`ad_expire_date`, '%a - %d-%m-%Y' )AS `new_ad_expire_date` 
                              FROM `advertisements`");    
   return $query->result(); 
   }
   
   
   public function get_ad_details($id)
   {
   $query = $this->db->query("SELECT `ad_id`,`ad_title`,`ad_pic`,`ad_link`,`ad_description`,`ad_expire_date`,
                                DATE_FORMAT(`ad_publish_date`, '%a - %d-%m-%Y' )AS `ad_publish_date`,
                                DATE_FORMAT(`ad_expire_date`, '%a - %d-%m-%Y' )AS `new_ad_expire_date` 
                        FROM `advertisements` WHERE `ad_id` = $id");    
   return $query->result(); 
   }
   
   public function view_blogs()
   {
       $query = $this->db->query("SELECT `blog_id`,`blog_title`,`blog_link`,`blog_image` FROM `blogs` ORDER BY `blog_id` DESC LIMIT 8"); 
        return $query->result(); 
   }
   
    public function view_all_blogs()
   {
       $query = $this->db->query("SELECT `blog_id`,`blog_title`,`blog_link`,`blog_image` FROM `blogs` ORDER BY `blog_id`"); 
        return $query->result(); 
   }
   
       public function view_resources_page_content()
   {
    $query = $this->db->query("SELECT `resource_id`,`resource_title`,`resource_link`,`resource_details` FROM `resources` ORDER BY `resource_id` DESC");   
    return $query->result(); 
   }
   
   public function resource_details($resource_id)
   {
        $query = $this->db->query("SELECT `resource_id`,`resource_title`,`resource_link`,`resource_details` FROM `resources` WHERE `resource_id` = $resource_id");   
    return $query->result();    
   }
   
   
   
}