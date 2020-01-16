<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_User_Model extends CI_Model {
    
    
    public function Check_User_Email($email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM `login` WHERE `login_email` = '$email'");
        return $query->result();
    }
    
    
    public function Check_User($user_email, $user_password)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM `login` 
                                   WHERE `login_email` = '$user_email' 
                                   AND `login_password`= '$user_password' AND `login_account_status` = 'ACTIVE'");
        
        return $query->result();
    }
    
    
    public function Chk_Tutor_Or_Student($user_email)
    {
        $query = $this->db->query("SELECT `login_account_type` FROM `login` WHERE `login_email` = '$user_email'");
        return $query->result();
    }
    
    
    public function Confirm_User_Activation($emailid)
    {
        $this->db->query("UPDATE `login` SET `login_account_status` = 'ACTIVE' WHERE `login_email` = '$emailid'");
    }
    
    
    public function Total_Active_Students()
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot_std FROM `login` WHERE `login_account_type` = 'STUDENT' AND `login_account_status` = 'ACTIVE'");
    return $query->result();
    }
    
    public function Total_Active_Tutors()
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot_tut FROM `login` WHERE `login_account_type` = 'TUTOR' AND `login_account_status` = 'ACTIVE'");
    return $query->result();  
    }
    
    public function GetMainSubjects()
    {
       $query = $this->db->query("SELECT ms.* FROM `main_subjects` ms WHERE EXISTS(SELECT 1 FROM `sub_subjects` AS ss WHERE ss.`mains_id` = ms.`mains_id` HAVING COUNT(*)=COUNT(ss.`mains_id`) AND COUNT(*)>0) AND ms.`mains_visibility` = 'VISIBLE' ORDER BY ms.`mains_title` ASC"); 
       return $query->result(); 
    }
    
    public function get_subsubjects($idd)
    {
    $query = $this->db->query("SELECT ss.`subs_id`,ss.`subs_title` FROM `sub_subjects` AS ss WHERE ss.`mains_id` = $idd ORDER BY ss.`subs_title`");
    return $query->result(); 
    }
    
    public function Get_Qualification_Level()
    {
    $query = $this->db->query("SELECT `qual_level_title`,`qual_level_id` FROM `qualification_level`");
    return $query->result();  
    }
    
    
    //** Message Details Sent By Student To Tutor **//
    
    public function get_message_details_for_tutor($msg_id,$student_id,$tutor_id)
    {
         $query = $this->db->query("SELECT sm.`std_fname`,sm.`std_lname`,sm.`std_profile_pic`,sm.`std_title`,sm.`student_id`,
                                           msg.`date_time`,msg.`msg_description`,msg.`msg_id`,msg.`msg_subject`,DATE_FORMAT(msg.`date_time` , '%a - %d-%m-%Y' )AS newDate
                                    FROM `messages_main` AS msg, `student_main` AS sm, `tutor_main` AS tm
                                    WHERE sm.`student_id` = msg.`student_id`
                                    AND tm.`tutor_id`=msg.`tutor_id`
                                    AND msg.`sent_by_student` = 'YES'
                                    AND msg.`sent_by_tutor` = 'NO'
                                    AND msg.`tutor_id`=$tutor_id
                                    AND msg.`msg_id`=$msg_id
                                    AND msg.`student_id`=$student_id");
        
        return $query->result(); 
    }
    
    
    //** Message Details Sent By Tutor To Student **//
    
    public function get_sent_message_details_for_tutor($msg_id,$student_id,$tutor_id)
    {
         $query = $this->db->query("SELECT sm.`student_id`,sm.`std_fname`,sm.`std_lname`,sm.`std_profile_pic`,sm.`std_title`,msg.`is_read`,
                                           msg.`date_time`,msg.`msg_description`,msg.`msg_id`,msg.`msg_subject`,DATE_FORMAT(msg.`date_time` , '%a - %d-%m-%Y' )AS newDate
                                    FROM `messages_main` AS msg, `student_main` AS sm, `tutor_main` AS tm
                                    WHERE sm.`student_id` = msg.`student_id`
                                    AND tm.`tutor_id`=msg.`tutor_id`
                                    AND msg.`sent_by_student` = 'NO'
                                    AND msg.`sent_by_tutor` = 'YES'
                                    AND msg.`tutor_id`=$tutor_id
                                    AND msg.`msg_id`=$msg_id
                                    AND msg.`student_id`=$student_id");
        
        return $query->result(); 
    }
    
    // ** Message Reply Details ** //
    
    public function get_message_reply_details($msg_id)
    {
     $query = $this->db->query("SELECT msg.`date_time`,msg.`msg_description`,msg.`msg_id`,msg.`msg_subject`,msg.`is_read`,msg.`parent_id`,
                                DATE_FORMAT(msg.`date_time` , '%a - %d-%m-%Y' )AS newDate2
                                FROM `messages_main` AS msg
                                WHERE msg.`parent_id`=$msg_id"); 
    return $query->result(); 
    }
    
    
    
    
    public function check_msg_reply($msg_id)
    {
         $query = $this->db->query("SELECT COUNT(*) AS tot
                                    FROM `messages_main` AS msg
                                    WHERE msg.`parent_id`=$msg_id");
        return $query->result(); 
    }
    
        public function check_login_email($user_email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM `login` WHERE `login_email` = '$user_email'");
        return $query->result();
    }
    
    
}