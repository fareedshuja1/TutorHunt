<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tutors_Model extends CI_Model {
    
    
    public function List_of_all_Tutors()
    {
      $query = $this->db->query("SELECT t.`country_id`,t.`login_email`,
                                        t.`tutor_id`,t.`tut_address_line1`,
                                        t.`tut_address_line2`,t.`tut_availability`,
                                        t.`tut_distance_travel`,t.`tut_dob`,
                                        t.`tut_fname`,t.`tut_gender`,
                                        t.`tut_lname`,t.`tut_personal_stat`,
                                        t.`tut_phone_home`,t.`tut_phone_mobile`,
                                        t.`tut_postcode`,t.`tut_profile_pic`,t.`is_verified`,
                                        DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )as recdate,
                                        t.`tut_skype`,t.`tut_title`,t.`town_id`,
                                        l.`login_account_status`, l.`login_account_type`,
                                        l.`login_email`, c.`country_id`,c.`country_name`,
                                        tt.`town_id`, tt.`town_name`
                                        FROM `tutor_main` AS t, `login` AS l, `country` AS c, `town` AS tt
                                        WHERE l.`login_email`=t.`login_email`
                                        AND t.`town_id` = tt.`town_id`
                                        AND c.`country_id` = t.`country_id`
                                        ORDER BY t.`tutor_id` DESC");
    return $query->result();  
    }
    
    
    public function Tutor_Details($tutor_id)
    {
           $query = $this->db->query("SELECT t.`country_id`,t.`login_email`,
                                        t.`tutor_id`,t.`tut_address_line1`,
                                        t.`tut_address_line2`,t.`tut_availability`,
                                        t.`tut_distance_travel`,t.`tut_dob`,
                                        t.`tut_fname`,t.`tut_gender`,
                                        t.`tut_lname`,t.`tut_personal_stat`,
                                        t.`tut_phone_home`,t.`tut_phone_mobile`,
                                        t.`tut_postcode`,t.`tut_profile_pic`,t.`is_verified`,t.`tut_ver_docs`,
                                        DATE_FORMAT( l.`account_created_date` , '%a - %d/%m/%Y' )as recdate,
                                        t.`tut_skype`,t.`tut_title`,t.`town_id`,
                                        l.`login_account_status`, l.`login_account_type`,
                                        l.`login_email`, c.`country_id`,c.`country_name`,
                                        tt.`town_id`, tt.`town_name`
                                        FROM `tutor_main` AS t, `login` AS l, `country` AS c, `town` AS tt
                                        WHERE l.`login_email`=t.`login_email`
                                        AND c.`country_id` = t.`country_id`
                                        AND t.`town_id` = tt.`town_id`
                                        AND t.`tutor_id` = $tutor_id");
    return $query->result();    
    }
    
    
    public function Get_tutor_email_id($tutor_id)
    {
        $query = $this->db->query("SELECT `login_email` FROM `tutor_main` WHERE `tutor_id` = $tutor_id");
        return $query->result();
    }

    
    public function Tutor_Deactivate($tut_email)
    {
    $this->db->query("UPDATE `login` SET `login_account_status` = 'INACTIVE' WHERE `login_email` = '$tut_email'");
    }
    
    
    public function Tutor_Activate($tut_email)
    {
    $this->db->query("UPDATE `login` SET `login_account_status` = 'ACTIVE' WHERE `login_email` = '$tut_email'");
    }
    
    
    public function Check_Tutors_Profile_Exists($user_email)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `tutor_main` WHERE `login_email` = '$user_email'");
    return $query->result();
    }
    
    
    public function Get_Tutor_Details_Login($login_email)
    {
      $query = $this->db->query("SELECT DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )AS account_created_date, 
                                                    l.`login_account_status`, 
                                                    l.`login_account_type`, 
                                                    l.`login_email`,
                                                    l.`login_password`, 
                                                    c.`country_id`, c.`country_name`, 
                                                    t.`town_id`, t.`town_name`,
                                                    tt.`tutor_id`, 
                                                    tt.`tut_address_line1`,
                                                    tt.`tut_address_line2`, 
                                                    tt.`tut_availability`, 
                                                    tt.`tut_distance_travel`,
                                                    tt.`tut_dob`, 
                                                    tt.`tut_fname`, 
                                                    tt.`tut_gender`, 
                                                    tt.`tut_lname`, 
                                                    tt.`tut_personal_stat`,
                                                    tt.`tut_phone_home`, 
                                                    tt.`tut_phone_mobile`, 
                                                    tt.`tut_postcode`, 
                                                    tt.`tut_profile_pic`,
                                                    tt.`tut_skype`, 
                                                    tt.`tut_title`, 
                                                    tt.`tut_ver_docs`

                    FROM `tutor_main` tt, `login` AS l, `country` AS c, `town` AS t

                    WHERE tt.`login_email` = l.`login_email`
                    AND tt.`country_id` = c.`country_id`
                    AND tt.`town_id`=t.`town_id`
                    AND l.`login_account_type` = 'TUTOR'
                    AND l.`login_email` = '$login_email'");
    
    return $query->first_row('array');
    }
    
    
    public function Get_Tutor_Email($user_email)
    {
        $query = $this->db->query("SELECT `login_email`, `login_account_status`, `login_account_type` FROM `login` WHERE `login_email` = '$user_email'");
        return $query->first_row('array');
    }
    
    
        public function get_tutor_email_fname($tutor_id)
    {
    $query = $this->db->query("SELECT `login_email`,tut_fname FROM `tutor_main` WHERE `tutor_id` = $tutor_id");
    return $query->result();     
    }
    
    
    public function GetTutorDetails($tutor_id,$login_email)
    {
    $query = $this->db->query("SELECT DATE_FORMAT(l.`account_created_date` , '%a - %d/%m/%Y' )AS account_created_date, 
                                                  l.`login_account_status`, l.`login_account_type`, l.`login_email`,
                                                  l.`login_password`, c.`country_id`, c.`country_name`, 
                                                  t.`town_id`, t.`town_name`,
                                                  tt.`tutor_id`,tt.`login_email`,tt.`tut_title`, tt.`tut_fname`,
                                                  tt.`tut_lname`,tt.`tut_gender`,tt.`tut_address_line1`,tt.`tut_address_line2`,
                                                  tt.`town_id`,tt.`tut_postcode`,tt.`country_id`, tt.`tut_phone_home`,
                                                  tt.`tut_phone_mobile`, tt.`tut_skype`,tt.`tut_ver_docs`,tt.`tut_profile_pic`,
                                                  tt.`tut_dob`,tt.`tut_distance_travel`,tt.`tut_personal_stat`,tt.`tut_availability`,
                                                  tt.`is_verified`
                    FROM `tutor_main` tt, `login` AS l, `country` AS c, `town` AS t

                    WHERE tt.`login_email` = l.`login_email`
                    AND tt.`country_id` = c.`country_id`
                    AND tt.`town_id`=t.`town_id`
                    AND l.`login_account_type` = 'TUTOR'
                    AND l.`login_email` = '$login_email'
                    AND tt.`tutor_id` = $tutor_id");
    
    return $query->result();
    }
    
    
    public function GetTutorsSubjects($tutor_id)
    {
      $query = $this->db->query("SELECT ts.`tut_sub_id`,
                                        ts.`subs_id`,
                                        ts.`sub_level_id`,
                                        ts.`tutor_id`,
                                        ts.`tut_sub_notes`,
                                        ts.`rate_per_hour`,
                                        sl.`sub_level_id`,
                                        sl.`sub_level_title`,
                                        subs.`subs_id`,
                                        subs.`subs_title`,
                                        tm.`tutor_id`
                                        FROM `subject_level` AS sl, `sub_subjects` AS subs, `tutor_subjects` AS ts, `tutor_main` AS tm
                                        WHERE ts.`tutor_id`=tm.`tutor_id`
                                        AND ts.`subs_id`=subs.`subs_id`
                                        AND ts.`sub_level_id` = sl.`sub_level_id`
                                        AND ts.`tutor_id` = $tutor_id ORDER BY ts.`subs_id`");
       return $query->result();   
    }
    
    public function GetTutorsSubjects2($tutor_id)
    {
      $query = $this->db->query("SELECT ss.`subs_title`,ss.`subs_id`,ts.`subs_id`
                                FROM `tutor_main` AS tm, `sub_subjects` AS ss, `tutor_subjects` AS ts
                                WHERE tm.`tutor_id`=ts.`tutor_id`
                                AND ts.`subs_id`=ss.`subs_id`
                                AND ts.`tutor_id`= $tutor_id GROUP BY ts.`subs_id`");
       return $query->result();   
    }
    
     public function count_tutor_subject($tutor_id)
    {
     $query = $this->db->query("SELECT COUNT(*) AS subj_count
                                FROM `tutor_main` AS tm, `sub_subjects` AS ss, `tutor_subjects` AS ts
                                WHERE tm.`tutor_id`=ts.`tutor_id`
                                AND ts.`subs_id`=ss.`subs_id`
                                AND ts.`tutor_id`= $tutor_id");
     return $query->result();
    }
    
    
    public function GetTutor_Qualification($tutor_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`, 
        tq.`tutor_id`,tq.`tut_qual_id`,tq.`qual_level_id`,
        tq.`course`,tq.`grades`,tq.`graduation_year`,tq.`grades_type`,
        tq.`university_name`,ql.`qual_level_id`,ql.`qual_level_title`
        FROM `tutor_main` AS tm, `tutor_qualification` AS tq, `qualification_level` AS ql
        WHERE tm.`tutor_id`=tq.`tutor_id`
        AND ql.`qual_level_id`=tq.`qual_level_id`
        AND tq.`tutor_id` = $tutor_id");  
     return $query->result(); 
    }
    
    
    public function GetTutor_Experience($tutor_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,te.`tutor_id`,te.`employer_name`,te.`job_description`,
                                       te.`job_level`,te.`job_title`,te.`still_doing_job`,te.`tut_experience_id`,te.`years_experience` 
                                FROM  `tutor_main` AS tm, `tutor_experience` AS te
                                WHERE tm.`tutor_id`=te.`tutor_id`
                                AND te.`tutor_id`=$tutor_id");  
     return $query->result(); 
    }
    
    
    
    public function GetTutor_Reference($tutor_id)
    {
        $query = $this->db->query("SELECT tm.`tutor_id`,
        tr.`ref_email`,
        tr.`ref_fname`,
        tr.`ref_lname`,
        tr.`ref_phone`,
        tr.`tutor_id`,
        tr.`tut_reference_id`,
        tr.`ref_relation`,
        tr.`ref_title`,
        tr.`ref_organization`
        FROM `tutor_references` AS tr, `tutor_main` AS tm
        WHERE tm.`tutor_id`=tr.`tutor_id`
        AND tr.`tutor_id`=$tutor_id"); 
    
    return $query->result(); 
    }
    
        
    public function Change_Password($login_email,$old_pass)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot FROM `login` WHERE `login_email` = '$login_email' AND `login_password` = '$old_pass' AND `login_account_type` = 'TUTOR'");
    return $query->result();
    }
    
    /** TUTOT SEARCH FUNCTIONS BEGINS HERE **/
    
    // Function if both postcode and subject are selected.
    
    public function search_tutor_with_postcode($postcode,$subs_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,tm.`tut_availability`,tm.`tut_distance_travel`,tm.`tut_personal_stat`,
                                ts.`tut_sub_notes`,tm.`tut_postcode`,ss.`subs_title`,tm.`tut_postcode`
                                FROM `tutor_main` AS tm, `tutor_subjects` AS ts, `sub_subjects` AS ss
                                WHERE tm.`tutor_id`=ts.`tutor_id`
                                AND ts.`subs_id`=ss.`subs_id`
                                AND ts.`subs_id` = $subs_id
                                AND tm.`tut_postcode` LIKE '%$postcode%' AND tm.`is_verified` = 'YES' GROUP BY ts.`tutor_id`"); 
    return $query->result();
    }
    
   public function  search_tutor_with_postcode_count($postcode,$subs_id)
   {
    $query = $this->db->query("SELECT COUNT(DISTINCT tm.`tutor_id`) AS tot_tut
                               FROM `tutor_main` AS tm, `tutor_subjects` AS ts, `sub_subjects` AS ss
                               WHERE tm.`tutor_id`=ts.`tutor_id`
                               AND ts.`subs_id`=ss.`subs_id`
                               AND ts.`subs_id` = $subs_id
                               AND tm.`tut_postcode` LIKE '%$postcode%' AND tm.`is_verified` = 'YES'");    
    return $query->result();
   }
    
    
    // If Subject is Not Selected
    
    public function search_tutor_with_town($town_id,$subs_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,tm.`tut_availability`,tm.`tut_distance_travel`,tm.`tut_personal_stat`,
                                ts.`tut_sub_notes`,tm.`tut_postcode`, tt.`town_name`,ss.`subs_title`,tm.`tut_postcode`
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                JOIN `subject_level` sl ON sl.`sub_level_id` = ts.`sub_level_id`
                                WHERE ts.`subs_id` = $subs_id
                                AND tm.`town_id` = $town_id
                                AND tm.`is_verified` = 'YES'
                                GROUP BY ts.`tutor_id`");
     return $query->result();
    }
    
    public function search_tutor_with_town_count($town_id,$subs_id)
    {
     $query = $this->db->query("SELECT COUNT(DISTINCT tm.`tutor_id`) as tot_tut
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                JOIN `subject_level` sl ON sl.`sub_level_id` = ts.`sub_level_id`
                                WHERE ts.`subs_id` = $subs_id
                                AND tm.`town_id` = $town_id
                                AND tm.`is_verified` = 'YES'");
     return $query->result();
    }
    
    
    /** Tutor Profile for Public **/
    
    public function View_Tutor_Profile($tutor_id)
    {
     $query = $this->db->query("SELECT tm.`is_verified`,tm.`town_id`,tm.`tut_availability`,tm.`tut_distance_travel`,tm.`tut_fname`,
                                tm.`login_email`, tm.`tut_address_line1`,tm.`tut_address_line2`,tm.`tut_phone_home`,tm.`tut_phone_mobile`,tm.`tut_skype`,
                                tm.`tut_gender`,tm.`tut_lname`,tm.`tut_personal_stat`,tm.`tut_postcode`,tm.`tut_profile_pic`,
                                tm.`tut_title`, t.`town_name`,tm.`tutor_id`
                                FROM `tutor_main` AS tm, `town` AS t
                                WHERE tm.`town_id`=t.`town_id`
                                AND tm.`tutor_id` = $tutor_id");   
    return $query->result();
    }
    
    
    //** Tutor Messages **//
    
    public function get_tutor_messages($tutor_id)
    {
     $query = $this->db->query("SELECT msg.`msg_id`, msg.`date_time`,msg.`msg_description`,msg.`student_id`,msg.`tutor_id`,msg.`msg_subject`,       
                                       msg.`is_read`,msg.`parent_id`,msg.`sent_by_student`,msg.`sent_by_tutor`,
                                       sm.`student_id`, sm.`std_fname`, sm.`std_lname`,sm.`std_title`,
                                       DATE_FORMAT(msg.`date_time`, '%a - %d-%m-%Y' )AS newdate_time
                                FROM `messages_main` AS msg, `student_main` AS sm, `tutor_main` AS tm
                                WHERE sm.`student_id` = msg.`student_id`
                                AND tm.`tutor_id` = msg.`tutor_id`
                                AND msg.`sent_by_student` = 'YES'
                                AND msg.`sent_by_tutor` = 'NO'
                                AND msg.`tutor_id`=$tutor_id ORDER BY msg.`msg_id` DESC");
     return $query->result();
    }
    
    
    //** Count Unread Messages **//
    
    public function count_unread_msgs_for_tutor($tutor_id)
    {
     $query = $this->db->query("SELECT COUNT(*) totunread 
                                FROM `messages_main` AS mm 
                                WHERE mm.`is_read` = 'UNREAD' 
                                AND mm.`tutor_id` = $tutor_id 
                                AND mm.`sent_by_student` = 'YES'
                                AND mm.`sent_by_tutor` = 'NO'");  
     return $query->result();
    }

    
    
    /**  TUTOR INBOX MESSAGES**/
    
    public function get_tutor_inbox_msgs($tutor_id)
    {
     $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                       mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                       ss.`student_id`,ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tutor_id`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'YES' AND mm.`sent_by_tutor` = 'NO' AND mm.`tutor_id` = $tutor_id ORDER BY mm.`date_time` DESC");   
     return $query->result();      
    }
    
    public function get_tutor_send_msgs($tutor_id)
    {
      $query = $this->db->query("SELECT mm.`date_time`,mm.`is_read`,mm.`msg_id`,mm.`msg_description`,mm.`msg_subject`,mm.`parent_id`,
                                        mm.`sent_by_student`,mm.`sent_by_tutor`,mm.`student_id`,mm.`tutor_id`,DATE_FORMAT(mm.`date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                        ss.`student_id`,ss.`std_title`,ss.`std_fname`,ss.`std_lname`,tm.`tut_title`,tm.`tut_fname`,tm.`tut_lname`,tm.`tutor_id`
                                FROM `messages_main` AS mm 
                                JOIN `student_main` ss ON ss.`student_id` = mm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = mm.`tutor_id` 
                                WHERE mm.`sent_by_student` = 'NO' AND mm.`sent_by_tutor` = 'YES' AND mm.`tutor_id` = $tutor_id ORDER BY mm.`date_time` DESC");   
     return $query->result();    
    }
    
    
    /* Check if Tutor is Verified */
    
    public function check_is_tutor_verified($tutor_id)
    {
         $query = $this->db->query("SELECT `is_verified` FROM `tutor_main` WHERE `tutor_id`=$tutor_id"); 
         return $query->result();
    }
    
    /* Check if Tutor has accepted the student */
    
    public function chk_std_buy_contactdetails($tutor_id, $student_id)
    {
        $query = $this->db->query("SELECT COUNT(*) AS tot, DATE_FORMAT(`date_time`, '%a - %d-%m-%Y' )AS newdate_time,`amount_paid` FROM `payment` WHERE `tutor_id` = $tutor_id AND `student_id` = $student_id AND `payment_status` = 'Completed'");
        return $query->result();
    }
    
    
    /* Tutor's Payment Details */
    
    public function get_tutor_payment_details($tutor_id)
    {
    $query = $this->db->query("SELECT sm.`std_fname`,sm.`std_lname`,tm.`tut_fname`,tm.`tut_lname`, p.`amount_paid`,DATE_FORMAT(p.`date_time`, '%a - %d-%m-%Y' )AS newdate_time, p.`student_id`,p.`transaction_id`,p.`tutor_id` 
                               FROM `payment` p JOIN `student_main` sm ON p.`student_id` = sm.`student_id`
                               JOIN `tutor_main` tm ON tm.`tutor_id` = p.`tutor_id`
                               WHERE p.`tutor_id` = $tutor_id");   
    return $query->result();       
    }
    
    
    public function get_tutor_payment_count($tutor_id)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot_payment FROM `payment` AS p WHERE p.`tutor_id` = $tutor_id AND p.`payment_status` = 'Completed'");  
    return $query->result();
    }




    /* Tutor's Feedback Details */
    
    public function get_tutor_feedbacks($tutor_id)
    {
     $query = $this->db->query("SELECT tf.`tut_feedback_id`,sm.`student_id`,sm.`std_fname`,sm.`std_lname`,sm.`std_profile_pic`,DATE_FORMAT(tf.`feedback_date_time`, '%a - %d-%m-%Y' )AS newdate_time,
                                      tf.`feedback_description`,tf.`tutor_id`,tf.`tutor_rating`
                                FROM `tutor_feedbacks` tf JOIN `student_main` sm ON tf.`student_id` = sm.`student_id`
                                WHERE tf.`tutor_id` = $tutor_id ORDER BY tf.`tut_feedback_id` DESC");  
    return $query->result(); 
    }
    
    public function get_tutor_feedbacks_count($tutor_id)
    {
     $query = $this->db->query("SELECT COUNT(*) as tot_feedbacks
                                FROM `tutor_feedbacks` tf JOIN `student_main` sm ON tf.`student_id` = sm.`student_id`
                                WHERE tf.`tutor_id` = $tutor_id");  
    return $query->result(); 
    }
    
    
    public function get_the_feedback($tut_feedback_id,$tutor_id,$student_id)
    {
       $query = $this->db->query("SELECT tf.`tut_feedback_id`, tf.`feedback_description`,tf.`feedback_date_time`,tf.`tutor_rating`, sm.`student_id`,sm.`std_profile_pic`,sm.`std_fname`,sm.`std_lname`
        FROM `tutor_feedbacks` tf JOIN `student_main` sm ON tf.`student_id` = sm.`student_id`
        JOIN `tutor_main` tm ON tm.`tutor_id` = tf.`tutor_id`
        WHERE tf.`tut_feedback_id` = $tut_feedback_id
        AND tf.`tutor_id` = $tutor_id
        AND tf.`student_id` = $student_id"); 
        return $query->result(); 

    }
    
    
    public function view_feedback_details($tut_feedback_id)
    {
     $query = $this->db->query("SELECT tf.`tut_feedback_id`, tf.`feedback_description`,tf.`feedback_date_time`,tf.`tutor_rating`, 
                                      sm.`student_id`,sm.`std_profile_pic`,sm.`std_fname`,sm.`std_lname`
                                FROM `tutor_feedbacks` tf JOIN `student_main` sm ON tf.`student_id` = sm.`student_id`
                                JOIN `tutor_main` tm ON tm.`tutor_id` = tf.`tutor_id`
                                WHERE tf.`tut_feedback_id` = $tut_feedback_id"); 

     return $query->result(); 
    }
    
    public function view_feedback_reply_details($tut_feedback_id)
    {
     $query = $this->db->query("SELECT fr.`response_date_time`,fr.`response_description` 
                                FROM `tut_feedback_response` fr 
                                JOIN `tutor_feedbacks` tf ON tf.`tut_feedback_id` = fr.`tut_feedback_id`
                                WHERE fr.`tut_feedback_id` =$tut_feedback_id");  
     return $query->result();
    }
    
    public function view_feedback_reply_details_count($tut_feedback_id)
    {
    $query = $this->db->query("SELECT COUNT(*) AS tot
                               FROM `tut_feedback_response` fr 
                               JOIN `tutor_feedbacks` tf ON tf.`tut_feedback_id` = fr.`tut_feedback_id`
                               WHERE fr.`tut_feedback_id` =$tut_feedback_id");  
     return $query->result();    
    }
    
    public function get_subject_rate($id,$tutor_id)
    {
    $query = $this->db->query("SELECT `rate_per_hour`,`tut_sub_id` FROM `tutor_subjects` WHERE `tut_sub_id` = $id AND `tutor_id` = $tutor_id"); 
    return $query->result();
    }
    
        ////////////////////////////////////////////

     public function edit_tut_qual($qual_id,$tutor_id) {
    $query = $this->db->query("SELECT tq.*,ql.`qual_level_title`,ql.`qual_level_id`
                               FROM `tutor_qualification` AS tq, `qualification_level` AS ql
                               WHERE tq.`qual_level_id` = ql.`qual_level_id`
                               AND tq.`tutor_id` = $tutor_id AND tq.`tut_qual_id` = $qual_id"); 
    return $query->result();
    }
    
    public function edit_tut_experience($exp_id,$tutor_id)
    {
    $query = $this->db->query("SELECT te.* FROM `tutor_experience` AS te WHERE te.`tut_experience_id` = $exp_id AND te.`tutor_id` = $tutor_id");
    return $query->result();    
    }
    
    
     public function edit_tut_reference($ref_id,$tutor_id)
    {
    $query = $this->db->query("SELECT tr.* FROM `tutor_references` AS tr WHERE tr.`tut_reference_id` = $ref_id AND tr.`tutor_id` = $tutor_id");
    return $query->result();     
    }
    
    
     ///**** ****///
    
    public function browse_all_tutors_by_subj($sub_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,tm.`tut_availability`,tm.`tut_distance_travel`,tm.`tut_personal_stat`,tt.`town_name`,ss.`subs_title`,tm.`tut_postcode`
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                WHERE ts.`subs_id` = $sub_id
                                AND tm.`is_verified` = 'YES'
                                GROUP BY ts.`tutor_id`");
     return $query->result();    
    }
    
    
    public function browse_all_tutors_by_subj_count($sub_id)
    {
     $query = $this->db->query("SELECT COUNT(DISTINCT tm.`tutor_id`) AS tot_tut
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                WHERE ts.`subs_id` = $sub_id
                                AND tm.`is_verified` = 'YES'"); 
       return $query->result(); 
    }
    
    public function browse_all_tutors_by_town($town_id)
    {
     $query = $this->db->query("SELECT tm.`tutor_id`,tm.`tut_fname`,tm.`tut_lname`,tm.`tut_profile_pic`,tm.`tut_availability`,tm.`tut_distance_travel`,tm.`tut_personal_stat`,tt.`town_name`,ss.`subs_title`,tm.`tut_postcode`
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                WHERE tm.`town_id` = $town_id
                                AND tm.`is_verified` = 'YES'
                                GROUP BY ts.`tutor_id`");
     return $query->result();   
    }
    
     public function browse_all_tutors_by_town_count($town_id)
    {
     $query = $this->db->query("SELECT COUNT(DISTINCT tm.`tutor_id`) AS tot_tut
                                FROM `tutor_main` tm JOIN `tutor_subjects` ts ON tm.`tutor_id` = ts.`tutor_id`
                                JOIN `sub_subjects` ss ON ss.`subs_id` = ts.`subs_id`
                                JOIN `town` tt ON tm.`town_id` = tt.`town_id`
                                WHERE tm.`town_id` = $town_id
                                AND tm.`is_verified` = 'YES'"); 
       return $query->result(); 
    }
    
    public function get_town_name($town_id)
    {
    $query = $this->db->query("SELECT tt.`town_name` FROM town AS tt WHERE tt.`town_id` = $town_id");   
     return $query->result(); 
    }
    
    
}