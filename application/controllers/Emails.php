<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emails extends CI_Controller {
    
    
        public function __construct() {
        parent::__construct();
        $this->load->model('General_Model');
        $this->load->model('Main_User_Model');
        $this->load->model('Student_Model');
        $this->load->model('Tutors_Model');
        $this->load->model('WebAdmin_Model');
        
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
        
        
       /** FORGET PASSWORD **/
        
       public function forget_password_query()
       {
           
        $user_email = $this->input->post('user_email');
        
        /** First check if the email if exists **/
        
        $check = $this->Main_User_Model->check_login_email($user_email);
        
        foreach($check as $check) { $check_tot = $check->tot; }
        
        if($check_tot > 0)
        {    
        
        $reset_pass_link = base_url() . 'MainController/reset_password_link/'.$user_email;
        
        @$msgg .= "<html> <body class='' style='font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;'>";
        @$msgg .= "<table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;' width='100%' bgcolor='#f6f6f6'>
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hello there,</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>We are contacting you from <a href='http://coursesandtutors.co.uk' target='_blank'>Courses And Tutors</a> because you recently requested for a Password reset link. <br> <br> Please Click on the link below to reset your password.</p>
                        
<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;' valign='top' bgcolor='#3498db' align='center'> 
                                      <a href='$reset_pass_link' target='_blank' style='display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>RESET PASSWORD</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        
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
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Do not reply to this email.</span>
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
    @$msgg .= "</body></html>";
        
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from("faridshuja1@gmail.com");
        $this->email->to("$user_email");
        $this->email->subject("Reset Password - Courses and Tutors");
        $this->email->message($msgg);

        if($this->email->send())
        {
        $this->session->set_flashdata('msg', 'A Password reset link has been sent to ' . $user_email .'. Please use the link to reset your password.');
        redirect(base_url() . 'MainController/reset_password_confirmation/'.$user_email);
        } else {
        show_error($this->email->print_debugger());
        }
        
        } else {
        $this->session->set_flashdata('msg2', 'The email id ' . $user_email .' does not exist in our record. Please enter a valid Email.');
        redirect(base_url() . 'MainController/reset_password_confirmation/'.$user_email);   
        }
        

       }
        
        
        
        /* SENT CONFIRMATION EMAILS */
        
        public function Sent_Confirmation_Email()
        {
        $emailid  = $this->uri->segment(3);
        $account_type = $this->uri->segment(4);
        
                $verificationLink = base_url() . 'MainController/Confirm_Activation/'.$emailid;


        if($account_type  == 'STUDENT')
        {
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Welcome To <a href='www.coursesandtutors.co.uk' target='_blank'>Courses And Tutors</a></p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Thank you for registering with us as $account_type. <br> <br>Click on the link below to verify your email.</p>
                        
<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;' valign='top' bgcolor='#3498db' align='center'> 
                                      <a href='$verificationLink' target='_blank' style='display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>VERIFY EMAIL</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Once you verify your email, you will be able to :
                        <ul><li> See a list of tutors close to you. </li>
                            <li> View tutor's complete profile and read feedbacks from past students. </li>
                            <li> Sent unlimited messages to tutors and discuss lesson scheduling.</li>
                            <li> Purchase the contact details of tutor you wish to learn from.</li>
                            </ul>
                            </p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>We wish you all the best, <br> Team Courses And Tutors </a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <div class='footer' style='clear: both; padding-top: 10px; text-align: center; width: 100%;'>
              <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                <tr>
                  <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;' valign='top' align='center'>
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Do not reply to this email.</span>
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
    
    } else {
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Welcome To <a href='www.coursesandtutors.co.uk' target='_blank'>Courses And Tutors</a></p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Thank you for registering with us as $account_type. <br> <br>Click on the link below to verify your email.</p>
                        
<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;' valign='top' bgcolor='#3498db' align='center'> 
                                      <a href='$verificationLink' target='_blank' style='display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>VERIFY EMAIL</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Once you verify your email, you will be able to :
                        <ul><li> Add subjects to your profile you wish to teach. </li>
                            <li> See a list of students close to you. </li>
                            <li> View student's complete profile and see the subjects they wish to study. </li>
                            <li> Sent unlimited messages to students and discuss lesson scheduling and rate.</li>
                            </ul>
                            </p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>We wish you all the best, <br> Team Courses And Tutors </a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <div class='footer' style='clear: both; padding-top: 10px; text-align: center; width: 100%;'>
              <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                <tr>
                  <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;' valign='top' align='center'>
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Do not reply to this email.</span>
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
    }



        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from("faridshuja1@gmail.com");
        $this->email->to("$emailid");
        $this->email->subject("Email Confirmation - Courses and Tutors");
        $this->email->message($msg);

        if($this->email->send())
        {
        $this->session->set_flashdata('msg', 'A confirmation email has been sent to ' . $emailid .'. Please activate your account using the link provided.');
        redirect(base_url() . 'MainController/EConfirmationPage/'.$emailid);
        } else {
        show_error($this->email->print_debugger());
        }
        }
        
        
        /** Sent notification to tutor when recieve new msg **/
        
        public function sent_email_to_tutor()
        {
            
         $tutor_id  = $this->uri->segment(3);  
         $student_id  = $this->uri->segment(4); 

         
         $tut_info = $this->Tutors_Model->get_tutor_email_fname($tutor_id);
         
         $std_info = $this->Student_Model->get_student_fname($student_id);
         
         foreach ($tut_info as $tut_info) { $emailid = $tut_info->login_email; $tut_fname = $tut_info->tut_fname; }
         
         foreach ($std_info as $std_info) { $std_fname = $std_info->std_fname; }
         
         @$msgg .= "<html> <body class='' style='font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;'>";
         @$msgg .= "<table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;' width='100%' bgcolor='#f6f6f6'>
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hello $tut_fname,</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>You have received a new message from $std_fname (student) at <a href='http://coursesandtutors.co.uk/' target='_blank'>Courses And Tutors</a>. 
                                <br> <br> Please Login into your account with Email ID $emailid and click on the Messages Tab to view the message.</p>
                        
<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;' valign='top' bgcolor='#3498db' align='center'> 
                                      <a href='http://coursesandtutors.co.uk/MainController/LoginForm' target='_blank' style='display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>VIEW MESSAGE</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        
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
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Do not reply to this email.</span>
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
    @$msgg .= "</body></html>";
    
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from("faridshuja1@gmail.com");
        $this->email->to("$emailid");
        $this->email->subject("New Message From $std_fname (Student) - Courses and Tutors");
        $this->email->message($msgg);

        if($this->email->send())
        {
            
       $this->session->set_flashdata('msg', 'Message Successfully sent to tutor.');
       redirect(base_url() . 'Tutor_Controller/Tutor_Profile/'.$tutor_id); 
        } else {
        show_error($this->email->print_debugger());
        }
         
        }
        
        
}