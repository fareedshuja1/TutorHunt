<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_Model extends CI_Model {
    

        public function find_maxid($col, $tbl) 
        {
        $query = $this->db->query("SELECT ifnull(max($col),'0')+1 as $col FROM `$tbl`");
        return $query->result(); 
        }
        
        
        public function fetch_CoustomQuery($sql){
        $query = $this->db->query($sql);
        return $query->result(); 
        
        }

        
        public function create_record($data, $tbl) 
        {
        $this->db->set($data);
        $this->db->insert($tbl);
        return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
        }
        
        
                
        public function update_record($data, $tbl, $wher) 
        {
        $this->db->where($wher);
        $this->db->set($data);
        $this->db->update($tbl);
        }
        
                
        public function delete_record($tbl, $wher) 
        {
        $this->db->where($wher);
        $this->db->delete($tbl);         
        }  
                        
        
        public function select_record($tbl, $select) 
        {
        $this->db->select($select); /* or $this->db->select('qual_level_title','qual_level_id');*/
        $query = $this->db->get($tbl);  
        $result = $query->result_array();
        return $result;     
        } 
        
        
        /* Count Total Number of Students */
       
        //public function Count_Total_Students()
        //{
        //     $query = $this->db->query("SELECT COUNT(*) AS stdtotal FROM `login` WHERE `login_account_type` = 'STUDENT'");
        //     return $query->result();
        //}
        
        
        /* Total number of students who have created an account and their account status is Active. */
        public function Count_Total_Students()
        {
             $query = $this->db->query("SELECT COUNT(*) AS stdtotal 
                                        FROM `student_main` AS sm, `login` AS l 
                                        WHERE l.`login_email`=sm.`login_email`
                                        AND l.`login_account_type`='STUDENT'
                                        AND l.`login_account_status`='ACTIVE'");
             return $query->result();
        }
        
        
        public function Count_Total_Students_Today()
        {
             $query = $this->db->query("SELECT COUNT(*) AS stdtotal_today FROM `login` WHERE `login_account_type` = 'STUDENT' AND `account_created_date` = CURDATE()");
             return $query->result();
        }
     
        public function Count_Total_Students_This_Month()
        {
            $query = $this->db->query("SELECT COUNT(*) AS stdtotal_this_month FROM `login` WHERE `login_account_type` = 'STUDENT'  
                                       AND `account_created_date` >= DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY)");
        
            return $query->result();
        }
        
        
        public function Count_Total_Students_Last_Month()
        {
         $query = $this->db->query("SELECT COUNT(*) AS stdtotal_month FROM `login` WHERE `login_account_type` = 'STUDENT' 
                                    AND `account_created_date` >= DATE_SUB(DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY), INTERVAL 1 MONTH) 
                                    AND `account_created_date` < DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY)");
        return $query->result();
        }
        
        
        /* Tutors Records */   
        
        //public function Count_Total_Tutor()
        //{
        //     $query = $this->db->query("SELECT COUNT(*) AS tuttotal FROM `login` WHERE `login_account_type` = 'TUTOR'");
        //     return $query->result();
        //}
        
        
        public function Count_Total_Tutor()
        {
         $query = $this->db->query("SELECT COUNT(*) AS tuttotal FROM  `tutor_main` AS sm, `login` AS l
                                    WHERE l.`login_email`=sm.`login_email`
                                    AND l.`login_account_type`='TUTOR'
                                    AND l.`login_account_status`='ACTIVE'");
        return $query->result();
        }
        
        
        public function Count_Total_Tutor_Today()
        {
             $query = $this->db->query("SELECT COUNT(*) AS tuttotal_today FROM `login` WHERE `login_account_type` = 'TUTOR' AND `account_created_date` = CURDATE()");
             return $query->result();
        }
        
        public function Count_Total_Tutors_This_Month()
        {
          $query = $this->db->query("SELECT COUNT(*) AS tuttotal_this_month FROM `login` WHERE `login_account_type` = 'TUTOR'  AND `account_created_date` >= DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY)");
          return $query->result();  
        }
        
                public function Count_Total_Tutors_Last_Month()
        {
        $query = $this->db->query("SELECT COUNT(*) AS tuttotal_last_month FROM `login` WHERE `login_account_type` = 'TUTOR' 
AND `account_created_date` >= DATE_SUB(DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY), INTERVAL 1 MONTH) 
AND `account_created_date` < DATE_SUB(CURDATE(), INTERVAL DAY(CURDATE()) - 1 DAY)");
        return $query->result();
        }
        
    
}