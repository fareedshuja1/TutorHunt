

		<div class="header-page-title">
			<div class="container">
				<h1>Payment Successful</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-12 page-content">
    
			            
             <!-- PANEL 1 STARTS -->
                                     
            <div class="latest-jobs-section white-container">
                
                <h4 style="color: #5bc0de">Congratulations! </h4> <h5 style="color: #5bc0de"><strong>Your payment was successful, thank you for purchase.</strong></h5>
                
                <table class="responsive">
                    <tr>
                        <th>Item Name :</th>
                        <td><?php echo $item_name; ?>  &nbsp; (<a href="<?=base_url();?>Tutor_Controller/Tutor_Profile/<?php echo $tutor_id; ?>">View Tutor's Profile</a>)</td> 
                    </tr>
                    <tr>
                        <th>Transaction (TXN) ID :</th>
                        <td><?php echo $txn_id; ?></td>
                    </tr>
                    <tr>
                        <th>Amount Paid :</th>
                        <td>£<?php echo $payment_amt.' '.$currency_code; ?></td>
                    </tr>
                    <tr>
                        <th>Payment Status :</th>
                        <td><?php echo $status; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Date :</th>
                        <td><?php echo date("d/m/Y") ?></td>
                    </tr>
                    
                    
                </table>
                
      <p><strong>Please make a note of the Transaction ID for future references.</strong></p><p><strong> You can now view the contact details on tutor's profile under the Contact Details tab. <a href="<?=base_url();?>Tutor_Controller/Tutor_Profile/<?php echo $tutor_id; ?>">Click Here</a> to view tutor's profile page. </strong></p>                


            
                          
	    </div> 
       <!-- PANEL 1 ENDS -->
                                    
 </div> 

                                
                                
                                
                        
                                
   	    
            </div>
	</div> <!-- end .container -->
    </div> <!-- end #page-content -->
