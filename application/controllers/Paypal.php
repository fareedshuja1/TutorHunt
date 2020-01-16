<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller 
{
     function  __construct() {
        parent::__construct();
        $this->load->model('General_Model');
        $this->load->model('WebAdmin_Model');
        $this->load->model('Main_User_Model');
        $this->load->model('Student_Model');
        $this->load->model('Tutors_Model');
        $this->load->library('paypal_lib');
        
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
     
     
     public function purchase_contact_details()
     {
         
         /* Get PayPal ID and Amount */
         
         $pay_settings = $this->WebAdmin_Model->paypal_settings();
         foreach ($pay_settings as $ps) { $paypalID = $ps->paypal_account; 
                                          $price_amount = $ps->purchase_amount; 
                                        }
         
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
            
        $tutor_id   =  $this->uri->segment(3); 
        $student_id =  $this->session->userdata('student_id'); 
        //$price_amount = $purchase_amount;
        
        $tut_details =  $this->Tutors_Model->View_Tutor_Profile($tutor_id);
        
        foreach ($tut_details as $details) {
        $item_desc    = $details->tut_fname." ".$details->tut_lname." Contact Details.";
        }
		
        //Set variables for paypal form
        $returnURL = base_url().'Paypal/success'; //payment success url
        $cancelURL = base_url().'Paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'Paypal/ipn'; //ipn url
		
	//$paypalID = 'fareedshuja-facilitator@gmail.com';
        
        $this->paypal_lib->add_field('business', $paypalID);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $item_desc);
        $this->paypal_lib->add_field('custom', $student_id);
        $this->paypal_lib->add_field('item_number', $tutor_id);
        $this->paypal_lib->add_field('amount',  $price_amount);        
        
        $this->paypal_lib->paypal_auto_form();   
     }
   }

     public function success(){
        if($this->session->userdata('student_id') && $this->session->userdata('login_email'))
        {
        //get the transaction data
        $paypalInfo = $this->input->get();
         
        $tutor_id              = $paypalInfo['item_number']; 
        $data['txn_id']        = $paypalInfo["tx"];
        $data['payment_amt']   = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status']        = $paypalInfo["st"];
        
        $tut_details =  $this->Tutors_Model->View_Tutor_Profile($tutor_id);
        
        foreach ($tut_details as $details) {
        $data['item_name']    = "Contact Details for ".$details->tut_fname." ".$details->tut_lname;
        $data['tutor_id']     = $details->tutor_id;
        
        $tt_fullname = $details->tut_fname." ".$details->tut_lname;
        
        $tt_email = $details->login_email;
        
        }
        
        $data['student_id']    = $this->session->userdata('student_id');
        
        /* INSERT RECORD INTO DATABASE */
        
        if( ! ini_get('date.timezone') )
        {
        date_default_timezone_set('GMT');
        }
        
        $maxid = $this->General_Model->find_maxid("payment_id", "payment");
        foreach ($maxid as $maxid) {
        $Maxtype = $maxid->payment_id;
        }
          
        // Check if the transaction ID exists
        
        $txnid = $paypalInfo["tx"];
        $price = $paypalInfo["amt"];
        
        $check_txn = $this->General_Model->fetch_CoustomQuery("SELECT COUNT(*) AS tot FROM `payment` WHERE `transaction_id` = '$txnid'");
        foreach ($check_txn as $check_txn) { $chkk = $check_txn->tot; }
        
        if($chkk == 0) {
        $data2  =  array('payment_id'     => $Maxtype,
                         'tutor_id'       => $tutor_id,
                         'student_id'     => $this->session->userdata('student_id'),
                         'transaction_id' => $txnid,
                         'amount_paid'    => $price,
                         'payment_status' => $paypalInfo["st"],
                         'date_time'      => date("Y-m-d")
                        );
        
        $this->General_Model->create_record($data2, "payment");
        
        $std_email = $this->session->userdata('login_email');
        $std_id    = $this->session->userdata('student_id');
        
        // Email to student
        $this->email_to_std($std_id,$std_email,$tutor_id,$tt_fullname,$txnid,$price);
        // Email to Tutor
        $this->email_to_tut($std_id,$tt_email,$txnid,$price,$tt_fullname);
        
                $title = "Payment Successful - Courses And Tutors London Find best tutors courses Science Technology Academics.";

        
        $this->header($title);
	$this->load->view('paypal/success.php',$data);
        $this->footer();
        
        }
     }
  }
          
     public function cancel(){

         $title = "Payment cancel - Courses And Tutors London 3dsMax Autocad Animation Games Academics ASP JAVA.";

                $this->header($title);
		$this->load->view('paypal/cancel.php');
                $this->footer();
     }
     
     
     
     public function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();

        $data['user_id']         = $paypalInfo['custom'];
        $data['product_id']      = $paypalInfo["item_number"];
        $data['txn_id']          = $paypalInfo["txn_id"];
        $data['payment_gross']   = $paypalInfo["payment_gross"];
        $data['currency_code']   = $paypalInfo["mc_currency"];
        $data['payer_email']     = $paypalInfo["payer_email"];
        $data['payment_status']  = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        
        //check whether the payment is verified
        //if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
         //   $this->product->insertTransaction($data);
        //}
    }
    
    
        /** Sent Email to Student when purchase is made **/
        
        public function email_to_std($std_id,$std_email,$tutor_id,$tt_fullname,$txnid,$price)
        {
        
        $tutor_profile = base_url().'Tutor_Controller/Tutor_Profile/'.$tutor_id;
        
        $std_info = $this->Student_Model->get_student_fname($std_id);
        foreach ($std_info as $std_info) { $std_fname = $std_info->std_fname; }
             
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hello $std_fname,</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Thank you for your recent purchase from <a href='http://coursesandtutors.co.uk/' target='_blank'>Courses And Tutors.</a>
                                <br><br>
                                 This email is the confirmation that you have successfully purchased contacts details for $tt_fullname. You can now view tutor's contact details in tutor's profile page under the 'Contact Details' tab.
                                </p>
                        
<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;' valign='top' bgcolor='#3498db' align='center'> 
                                     <a href='$tutor_profile' target='_blank' style='display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>VIEW TUTOR PROFILE</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Payment Details:
                            <ul><li> Transaction ID : $txnid </li><li> Amount Paid : $price GBP</li></ul>
                            </p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Good Luck, <br> Team Courses And Tutors </a></p>
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
        $this->email->to("$std_email");
        $this->email->subject("Payment Confirmation - Courses and Tutors");
        $this->email->message($msg);

        if(!$this->email->send())
        {
        show_error($this->email->print_debugger());
        } 
  }
  
  
       /** Sent Email to Tutor when purchase is made **/
  
        public function email_to_tut($std_id,$tt_email,$txnid,$price,$tt_fullname)
        {
        
        $student_profile = base_url().'Student_Controller/view_student_profile/'.$std_id;
        
        $std_info = $this->Student_Model->get_student_fname($std_id);
        foreach ($std_info as $std_info) { $std_fullname = $std_info->std_fname." ".$std_info->std_lname; } 
                
        @$msgg .= "<html> <body class='' style='font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;'>
                  <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;' width='100%' bgcolor='#f6f6f6'>
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
                               <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hello $tt_fullname,</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>
                                   This email is the confirmation that <a href='$student_profile' target='_blank'>$std_fullname (student)</a> has recently purchased your contact details from <a href='http://coursesandtutors.co.uk/' target='_blank'>Courses And Tutors.</a>
                                   
                                </p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Good Luck!, <br> Team Courses And Tutors </a></p>
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
    </table></body></html>";
    
        
                
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from("faridshuja1@gmail.com");
        $this->email->to("$tt_email");
        $this->email->subject("New Purchase Confirmation - Courses and Tutors");
        $this->email->message($msgg);

        if(!$this->email->send())
        {
        show_error($this->email->print_debugger());
        } 
        
        
        
        }
        

        
        
        
}