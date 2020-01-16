<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_Model extends CI_Model {
    
    
    public function Check_Student_Profile_Exists($user_email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot FROM `student_main` WHERE `login_email` = '$user_email'");
        return $query->result();
    }

    
    public function Get_Student_Email($user_email)
    {
        $query = $this->db->query("SELECT `login_email`, `login_account_status`, `login_account_type` FROM `login` WHERE `login_email` = '$user_email'");
        return $query->first_row('array');
    }
    

    public function Get_Student_Details_Login($user_email)
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
                                    DATE_FORMAT(s.`std_dob` , '%a - %d/%m/%Y' )AS std_dob, 
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
                                    DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )AS account_created_date, 
                                    t.`town_id`,
                                    t.`town_name`

    FROM `student_main` AS s, `country` AS c, `login` AS l, `town` AS t
    WHERE s.`country_id` = c.`country_id` 
    AND s.`login_email` = l.`login_email` 
    AND s.`town_id` = t.`town_id` 
    AND s.`login_email` = '$user_email'
    AND l.`login_account_type` = 'STUDENT'"); 

  
    return $query->first_row('array');
    //return $query->result();

    }
    
    
    public function GetStudentDetails($student_id,$login_email)
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
                                    DATE_FORMAT(s.`std_dob` , '%a - %d/%m/%Y' )AS std_dob, 
                                    s.`std_personal_stat`, 
                                    s.`std_phone_home`, 
                                    s.`std_postcode`, 
                                    s.`std_profile_pic`,  
                                    s.`std_title`, 
                                    s.`town_id`,
                                    s.`student_gender`,
                                    s.`std_availability`,
                                    c.`country_name`,
                                    c.`country_id`,
                                    l.`login_account_status`,
                                    l.`login_account_type`,
                                    l.`login_email`,
                                    DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )AS account_created_date, 
                                    t.`town_id`,
                                    t.`town_name`
                                    FROM `student_main` AS s, `country` AS c, `login` AS l, `town` AS t
                                    WHERE s.`country_id` = c.`country_id` 
                                    AND s.`login_email` = l.`login_email` 
                                    AND s.`town_id` = t.`town_id` 
                                    AND s.`login_email` = '$login_email'
                                    AND s.`student_id` = $student_id
                                    AND l.`login_account_type` = 'STUDENT'");
    return $query->result();
    }
    
    
    public function GetStudentSubjects($student_id)
    {
     $query = $this->db->query("SELECT ss.`std_sub_id`,ss.`std_sub_notes`,ss.`std_rate_per_hour`,ss.`student_id`,ss.`subs_id`,ss.`sub_level_id`,
                                       sl.`sub_level_id`,sl.`sub_level_title`,subs.`subs_id`,subs.`subs_title`,sm.`student_id`
                                FROM `student_subjects` AS ss, `student_main` AS sm, `subject_level` AS sl, `sub_subjects` AS subs
                                WHERE ss.`student_id`=sm.`student_id`
                                AND ss.`subs_id`=subs.`subs_id`
                                AND ss.`sub_level_id` = sl.`sub_level_id`
                                AND ss.`student_id` = $student_id ORDER BY ss.`std_sub_id` DESC");
       return $query->result();
    }
    
    
    
    public function Change_Password($login_email,$old_pass)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `login` WHERE `login_email` = '$login_email' AND `login_password` = '$old_pass' AND `login_account_type` = 'STUDENT'");
    return $query->result();
    }
    
    public function view_student_profile($student_id)
    {
    $query = $this->db->query("SELECT sm.*,tm.`town_name` FROM `student_main` AS sm,`town` AS tm WHERE sm.`student_id`=$student_id AND tm.`town_id`=sm.`town_id`");
    return $query->result();
    }
    
    
    
    /* Check if tutor has accepted the student or not. */
    
    public function check_if_student_accepted($student_id,$tutor_id)
    {
     $query = $this->db->query("SELECT tas.`accepted_date`,tas.`status`,tas.`student_id`,tas.`tutor_id`,COUNT(tas.`accept_id`) AS tott
                                FROM `tutor_accept_students` AS tas, `student_main` AS sm, `tutor_main` AS tm
                                WHERE tas.`tutor_id`=$tutor_id
                                AND tas.`student_id`=$student_id
                                AND tas.`student_id`=sm.`student_id`
                                AND tas.`tutor_id`=tm.`tutor_id` AND tas.`status` = 'ACCEPTED'");   
     return $query->result();
    }
    
    
    /* get student messages */
    
    public function get_student_messages($student_id)
    {
     $query = $this->db->query("SELECT msg.`msg_id`, msg.`date_time`,msg.`msg_description`,msg.`student_id`,msg.`tutor_id`,msg.`msg_subject`,msg.`is_read`,
                                       tm.`tutor_id`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_title`,tm.`tut_profile_pic`,DATE_FORMAT(msg.`date_time`, '%a - %d-%m-%Y' )AS newdate_time
                                FROM `messages_main` AS msg, 
                                     `student_main` AS sm, 
                                     `tutor_main` AS tm
                                WHERE sm.`student_id` = msg.`student_id`
                                AND tm.`tutor_id`=msg.`tutor_id`
                                AND msg.`student_id`=$student_id
                                AND msg.`sent_by_student` = 'NO'
                                AND msg.`sent_by_tutor` = 'YES' ORDER BY msg.`msg_id` DESC");   
     return $query->result();
    }
    
    
    //** Search Student By PostCode **//
    
    public function search_student_with_postcode($postcode,$subs_id)
    {
      $query = $this->db->query("SELECT sm.`std_title`,sm.`std_fname`,sm.`std_lname`,sm.`std_profile_pic`,sm.`std_availability`,sm.`std_personal_stat`,
                                 sm.`std_distance_travel`,sm.`student_id`, ss.`subs_title` 
                                 FROM `student_main` sm 
                                 JOIN `student_subjects` stds ON stds.`student_id` = sm.`student_id` 
                                 JOIN `sub_subjects` ss ON stds.`subs_id` = ss.`subs_id`  
                                 WHERE stds.`subs_id` = $subs_id  AND sm.`std_postcode` LIKE '%$postcode%'
                                 GROUP BY stds.`student_id`"); 
    return $query->result();    
    }
    
    public function search_tutor_with_postcode_count($postcode,$subs_id)
    {
     $query = $this->db->query("SELECT COUNT(DISTINCT sm.`student_id`) AS tot_std 
                                FROM `student_main` sm 
                                JOIN `student_subjects` stds ON stds.`student_id` = sm.`student_id` 
                                JOIN `sub_subjects` ss ON stds.`subs_id` = ss.`subs_id`  
                                WHERE stds.`subs_id` = $subs_id  AND sm.`std_postcode` LIKE '%$postcode%'"); 
     return $query->result(); 
    }
    
    
    
    //** Search Student By Town **//
    
    public function search_tutor_with_town($town_id,$subs_id)
    {
    $query = $this->db->query("SELECT sm.`std_title`,sm.`std_fname`,sm.`std_lname`,sm.`std_profile_pic`,sm.`std_availability`,sm.`std_personal_stat`,
                                      sm.`std_distance_travel`,sm.`student_id`, ss.`subs_title`
                                FROM `student_main` sm 
                                JOIN `town` tt ON sm.`town_id` = tt.`town_id`
                                JOIN `student_subjects` stds ON sm.`student_id` = stds.`student_id` 
                                JOIN `sub_subjects` ss ON ss.`subs_id` = stds.`subs_id`
                                WHERE sm.`town_id` = $town_id
                                AND stds.`subs_id` = $subs_id
                                GROUP BY sm.`student_id`"); 
    return $query->result();
    }
    
    
    public function search_tutor_with_town_count($town_id,$subs_id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT sm.`student_id`) AS tot_std
                                   FROM `student_main` sm 
                                   JOIN `town` tt ON sm.`town_id` = tt.`town_id`
                                   JOIN `student_subjects` stds ON sm.`student_id` = stds.`student_id` 
                                   JOIN `sub_subjects` ss ON ss.`subs_id` = stds.`subs_id`
                                   WHERE sm.`town_id` = $town_id
                                   AND stds.`subs_id` = $subs_id"); 
    return $query->result();
    }
    
    
    public function count_unread_msgs_for_student($student_id)
    {
          $query = $this->db->query("SELECT COUNT(*) totunread 
                                     FROM `messages_main` AS mm 
                                     WHERE mm.`is_read` = 'UNREAD' 
                                     AND mm.`student_id` = $student_id 
                                     AND mm.`sent_by_student` = 'NO'
                                     AND mm.`sent_by_tutor` = 'YES'");  
     return $query->result();   
    }
    
    
    public function get_message_details_for_student($msg_id,$student_id,$tutor_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,msg.`is_read`,
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
    
    
        public function get_sent_message_details_for_student($msg_id,$student_id,$tutor_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,msg.`is_read`,
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
    
    
    
    public function get_student_inbox_msgs($student_id)
    {
    $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                      mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                      ss.`student_id`,ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tutor_id`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'NO' AND mm.`sent_by_tutor` = 'YES' AND mm.`student_id` = $student_id ORDER BY mm.`date_time` DESC");   
     return $query->result();         
    }
    
    
    public function get_student_send_msgs($student_id)
    {
     $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`student_id`,ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tutor_id`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'YES' AND mm.`sent_by_tutor` = 'NO' AND mm.`student_id` = $student_id ORDER BY mm.`date_time` DESC");   
     return $query->result();            
    }
    
    public function get_student_payment_details($student_id)
    {
        $query = $this->db->query("SELECT sm.`std_fname`,sm.`std_lname`,tm.`tut_fname`,tm.`tut_lname`, p.`amount_paid`,DATE_FORMAT(p.`date_time`, '%a - %d-%m-%Y' )AS newdate_time, p.`student_id`,p.`transaction_id`,p.`tutor_id` 
FROM `payment` p JOIN `student_main` sm ON p.`student_id` = sm.`student_id`
JOIN `tutor_main` tm ON tm.`tutor_id` = p.`tutor_id`
WHERE p.`student_id` = $student_id");   
        return $query->result();   
    }
    
    public function get_student_feedbacks($student_id)
    {
     $query = $this->db->query("SELECT DATE_FORMAT(tf.`feedback_date_time`, '%a - %d-%m-%Y' )AS newdate_time,tf.`feedback_description`,tf.`tutor_id`,tf.`tutor_rating`,tf.`tut_feedback_id`,
                                tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`
                                FROM `tutor_feedbacks` tf JOIN `tutor_main` tm ON tm.`tutor_id` = tf.`tutor_id`
                                JOIN `student_main` sm ON sm.`student_id` = tf.`student_id`
                                WHERE tf.`student_id` = $student_id");  
     return $query->result();
    }
    
    
        public function get_student_fname($student_id)
    {
     $query = $this->db->query("SELECT sm.`std_fname`,sm.`std_lname`, sm.`student_id` FROM `student_main` AS sm WHERE sm.`student_id` = $student_id");
     return $query->result();
    }
    


    
}