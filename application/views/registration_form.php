
		<div class="header-page-title">
			<div class="container">
				<h1>Sign Up</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-8 page-content">
    
			            
             <!-- PANEL 1 STARTS -->
            <div class="title-lines"> <h3 class="mt0"> Please Register to Continue</h3> </div>
                                     
            <div class="latest-jobs-section white-container">
                
            <?php if($this->session->flashdata('msg')) { ?>      
                    <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                                        
                         <form class="form-inline cmxform" id="signupForm" method="post" role="form" action="<?=base_url();?>MainController/SignUp_User_Query">
   
                         <div class="row">
                         <div class="form-group singup-form">
                             
                         <label for="email">Enter Email:</label> <span class="required_star">  *</span><br>
			 <input id="email" class="form-control" name="email" style="width:80%" type="email">

                        
                         </div>
                         </div>
                                            
                         <div class="row">
                         <div class="form-group singup-form">
                         <label for="password">Enter Password:</label> <span class="required_star">  *</span><br>
                         <input type="password" id="password" class="form-control" name="password" style="width:80%">
                         </div>
                         </div>
                                            
                                            
                                            
                         <div class="row">
                         <div class="form-group singup-form">
                         <label for="confirm_password">Confirm Password:</label>  <span class="required_star">  *</span><br>
                         <input type="password" id="confirm_password" class="form-control" name="confirm_password" style="width:80%">
                         </div>
                         </div>
                                            
                                            
                         <div class="row">
                         <div class="form-group singup-form">
                         <label for="email">Account Type:</label>  <span class="required_star">  *</span><br>
                         <select class="form-control" style="width:80%" name="account_type">
                         <option value="STUDENT">Student</option>
                         <option value="TUTOR">Tutor</option>
                         </select>
                         </div>
                         </div>
                        
                         <div class="row">
                         <div class="form-group singup-form">
                         <button type="submit" class="btn btn-info" name="user_submit">Register</button>
                         </div>
                         </div>
                    
                         </form>
    
                                        
	    </div> 
       <!-- PANEL 1 ENDS -->
                                    
 </div> 
<!-- PAGE MIDDLE CONTENT END -->
                                
                                
                                
                        <!-- PAGE SIDE BAR CONTENT START -->
                        
			<!--	<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container social-widget">
							<h5 class="widget-title">Share Us</h5>

							<div class="widget-content">
								<div class="row row-p5">
									<div class="col-xs-6 col-md-3 share-box facebook">
										<div class="count">86</div>
										<a href="#">Facebook</a>
									</div>

									<div class="col-xs-6 col-md-3 share-box twitter">
										<div class="count">2.2k</div>
										<a href="#">Twitter</a>
									</div>

									<div class="col-xs-6 col-md-3 share-box google">
										<div class="count">324</div>
										<a href="#">Google +</a>
									</div>

									<div class="col-xs-6 col-md-3 share-box linkedin">
										<div class="count">1.5k</div>
										<a href="#">LinkedIn</a>
									</div>
								</div>
							</div>
						</div>

						<div class="widget sidebar-widget text-center">
							<a href="#"><img src="<?=base_url();?>assets/img/content/sidebar-ad.png" alt=""></a>
						</div>

					</aside>
				</div> 
                        
                        <!-- PAGE SIDE BAR CONTENT END -->
                                
                                
                                
   	    
           <!-- </div>
	</div> 
   <!-- </div> 

	