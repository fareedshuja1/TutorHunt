
		<div class="header-page-title">
			<div class="container">
				<h1>Reset Password</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-8 page-content">
    
			            
             <!-- PANEL 1 STARTS -->
            <div class="title-lines"> <h3 class="mt0">Forget Password</h3> </div>
                                     
            <div class="latest-jobs-section white-container">
                
            <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                                        
                <form class="form-inline cmxform" id="signupForm" method="post" role="form" action="<?=base_url();?>MainController/reset_password_query">
   
                         <div class="row">
                             
                             
                             
                         <div class="form-group singup-form">
                             
                         <label for="email">Enter New Password:</label> <span class="required_star">  *</span><br>
                         <input id="password" class="form-control" name="password" style="width:80%" type="password">
                         <input value="<?php echo $user_email;  ?>" class="form-control" name="login_email" type="hidden" readonly="readonly">

                         </div>
                             
                         <div class="form-group singup-form">
                             
                         <label for="email">Confirm New Password:</label> <span class="required_star">  *</span><br>
                         <input id="confirm_password" class="form-control" name="confirm_password" style="width:80%" type="password" autofocus>
                         </div>
                         </div>
                          
                         <div class="row">
                         <div class="form-group singup-form">
                    <button type="submit" class="btn btn-info" name="">Submit</button> 
                         </div>
                         </div>
                    
                         </form>
    
                                        
	    </div> 
       <!-- PANEL 1 ENDS -->
                                    
 </div> 
<!-- PAGE MIDDLE CONTENT END -->
                                
                                
                                
                        
                                
   	    
            </div>
	</div> <!-- end .container -->
    </div> <!-- end #page-content -->

	